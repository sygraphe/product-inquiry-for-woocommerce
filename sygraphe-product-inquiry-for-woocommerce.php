<?php
/**
 * Plugin Name:       Sygraphe Product Inquiry for WooCommerce
 * Plugin URI:        https://sygraphe.com/product-inquiry-for-woocommerce
 * Description:       Hide WooCommerce product prices and replace the Add to Cart button with a customizable "Ask for Product" button that opens a contact modal.
 * Version:           1.0.3
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Sygraphe
 * Author URI:        https://github.com/sygraphe
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:       sygraphe-product-inquiry-for-woocommerce
 * Domain Path:       /languages
 * Requires Plugins:  woocommerce
 * WC requires at least: 8.0
 * WC tested up to:   10.8
 *
 * @package WCHPAB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if the Pro version (or another instance) is currently active.
 * If so, display an inline notice and go dormant.
 */
if ( defined( 'WCHPAB_VERSION' ) || function_exists( 'wchpab_check_woocommerce' ) ) {
	add_action( 'after_plugin_row_' . plugin_basename( __FILE__ ), 'wchpab_free_inline_conflict_notice', 10, 3 );
	function wchpab_free_inline_conflict_notice( $plugin_file, $plugin_data, $status ) {
		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );
		$col_count     = $wp_list_table->get_column_count();
		?>
		<tr class="plugin-update-tr active" id="<?php echo esc_attr( $plugin_file ); ?>-error" data-slug="<?php echo esc_attr( $plugin_file ); ?>" data-plugin="<?php echo esc_attr( $plugin_file ); ?>">
			<td colspan="<?php echo esc_attr( $col_count ); ?>" class="plugin-update colspanchange">
				<div class="update-message notice inline notice-error notice-alt" style="margin-top: 0; margin-bottom: 0;">
					<p style="margin: 0.5em 0;">

						<strong><?php esc_html_e( 'Conflict Prevented:', 'sygraphe-product-inquiry-for-woocommerce' ); ?></strong> 
						<?php esc_html_e( 'The Pro version is currently controlling your settings. This free version has paused itself automatically. Please deactivate this free version.', 'sygraphe-product-inquiry-for-woocommerce' ); ?>
					</p>
				</div>
			</td>
		</tr>
		<?php
	}
	// Stop execution to prevent fatal errors with Pro version.
	return;
}

/**
 * Plugin constants.
 */
if ( ! defined( 'WCHPAB_VERSION' ) ) {
	define( 'WCHPAB_VERSION', '1.0.3' );
}
if ( ! defined( 'WCHPAB_PLUGIN_DIR' ) ) {
	define( 'WCHPAB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'WCHPAB_PLUGIN_URL' ) ) {
	define( 'WCHPAB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'WCHPAB_PLUGIN_BASENAME' ) ) {
	define( 'WCHPAB_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * Check if WooCommerce is active before initializing.
 */
if ( ! function_exists( 'wchpab_check_woocommerce' ) ) {
	function wchpab_check_woocommerce() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', 'wchpab_woocommerce_missing_notice' );
			return;
		}
		wchpab_init();
	}
}
add_action( 'plugins_loaded', 'wchpab_check_woocommerce' );

/**
 * Display admin notice if WooCommerce is not active.
 *
 * @return void
 */
if ( ! function_exists( 'wchpab_woocommerce_missing_notice' ) ) {
	function wchpab_woocommerce_missing_notice() {
		?>
		<div class="notice notice-error">
			<p>
				<?php
				printf(
					/* translators: %s: WooCommerce plugin name. */
					esc_html__( '%s requires WooCommerce to be installed and active.', 'sygraphe-product-inquiry-for-woocommerce' ),
					'<strong>Sygraphe Product Inquiry for WooCommerce</strong>'
				);
				?>
			</p>
		</div>
		<?php
	}
}



/**
 * Initialize plugin components.
 *
 * @return void
 */
if ( ! function_exists( 'wchpab_init' ) ) {
	function wchpab_init() {
		require_once WCHPAB_PLUGIN_DIR . 'includes/class-ajax.php';
		require_once WCHPAB_PLUGIN_DIR . 'includes/class-admin.php';
		require_once WCHPAB_PLUGIN_DIR . 'includes/class-frontend.php';

		new WCHPAB\Ajax();
		new WCHPAB\Admin();
		new WCHPAB\Frontend();
	}
}

/**
 * Plugin activation hook.
 * Sets default options on first activation.
 *
 * @return void
 */
if ( ! function_exists( 'wchpab_activate' ) ) {
	function wchpab_activate() {
		if ( false === get_option( 'wchpab_hidden_categories' ) ) {
			update_option( 'wchpab_hidden_categories', array() );
		}
		if ( false === get_option( 'wchpab_button_settings' ) ) {
			update_option( 'wchpab_button_settings', array(
				'product_text_mode'  => 'default',
				'product_text'       => '',
				'category_text_mode' => 'default',
				'category_text'      => '',
				'target_product'     => true,
				'target_archive'     => true,
				'archive_action'     => 'link',
			) );
		}
	}
}
register_activation_hook( __FILE__, 'wchpab_activate' );

/**
 * Get a plugin option with default fallback.
 *
 * @param string $key     Option key.
 * @param mixed  $default Default value.
 * @return mixed
 */
if ( ! function_exists( 'wchpab_get_option' ) ) {
	function wchpab_get_option( $key, $default = false ) {
		return get_option( $key, $default );
	}
}
