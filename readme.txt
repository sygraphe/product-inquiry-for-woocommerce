=== Sygraphe Product Inquiry Mode for WooCommerce ===
Contributors: Sygraphe
Tags: woocommerce, hide price, ask for product, contact form, inquiry
Requires at least: 6.0
Tested up to: 7.0
Stable tag: 1.0.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Hide WooCommerce product prices and replace Add to Cart with a customizable "Ask for Product" button and built-in contact modal.

== Description ==

Sygraphe Product Inquiry Mode for WooCommerce allows you to selectively hide product prices and replace the WooCommerce "Add to Cart" button with a customizable inquiry button. When a customer clicks this button, a contact form modal opens where they can send you an inquiry about the product.

**Key Features:**

* Hide prices selectively for unlimited product categories.
* Customize button text for product pages and archive pages.
* Built-in contact form modal — no extra plugins needed.
* AJAX-powered category search in the admin panel.
* Inherits your theme styling for seamless visual integration.
* Full internationalization (i18n) support with Greek translation included.

== Installation ==

1. Upload the `wc-hide-price-ask-button` folder to `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Hide Price** in the admin menu to configure the plugin.

== Frequently Asked Questions ==

= Does this plugin require WooCommerce? =

Yes, WooCommerce must be installed and active for this plugin to work.

= Where do inquiry emails get sent? =

Inquiry emails are sent to the WordPress admin email address configured in Settings → General.

= Can I customize the button text? =

Yes, go to **Hide Price → Button Settings** to set custom button text for product pages and category archives.

== Screenshots ==

1. The "Hide Category Prices" admin page where you can search and select categories.
2. The "Button Settings" page for customizing the appearance and behavior of the inquiry button.
3. Example of a hidden price and modified "Ask for Product" button on a single product page.
4. The inquiry modal that appears when a customer clicks the button.

== Changelog ==

= 1.0.1 =
* Rebranded to Sygraphe Product Inquiry Mode for WooCommerce.
* Changed text domain to sygraphe-product-inquiry-mode-for-woocommerce.
* Added Required Plugins dependency header.
* Fixed hardcoded CSS style tags in administrative screens by enqueuing using wp_add_inline_style.
* Updated WordPress and WooCommerce compatibility headers.

= 1.0.0 =
* Initial release of the free version on WordPress.org.
