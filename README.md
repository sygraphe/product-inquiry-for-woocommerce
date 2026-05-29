# Sygraphe Product Inquiry for WooCommerce

A WordPress/WooCommerce plugin that hides product prices and replaces the "Add to Cart" button with a customizable **"Ask for Product"** inquiry button and built-in contact form modal.

![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue?logo=wordpress)
![WooCommerce](https://img.shields.io/badge/WooCommerce-8.0%2B-96588a?logo=woocommerce)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php)
![License](https://img.shields.io/badge/License-GPLv2_or_later-green)

---

## Features (Free Version)

- **Hide Categories:** Selectively hide prices for product categories.
- **Ask for Product Button:** Hide prices from everyone and show a professional AJAX-powered modal contact form.
- **Button Customization:** Customize button text for product pages and archive pages.
- **Built-in contact form modal** â€” no external form plugins needed.
- **Theme-compatible** â€” inherits your theme's button and form styling.
- **Fully translatable** â€” Greek translation included out of the box.

ðŸš€ **[Need more power? Upgrade to the Pro Version!](https://sygraphe.com/hide-price-ask-button-for-woocommerce)**  
Unlock unlimited hide rules, global overrides, product exclusions, role-based visibility, advanced design customizations (HTML tags, CSS classes, Dashicons), and custom email recipients.

## Installation

1. Download or clone this repository into `wp-content/plugins/`:
   ```bash
   cd wp-content/plugins/
   git clone https://github.com/sygraphe/hide-price-ask-button-for-woocommerce.git
   ```
2. Activate the plugin via **Plugins â†’ Installed Plugins** in WordPress admin.
3. Navigate to **Hide Price** in the admin sidebar to configure.

## Configuration

### Hide Category Prices
Search for product categories by **name** or **ID** and add them to the hidden price list.


### Button Settings
- **Text:** Customize text for Product Pages and Category/Archive Pages.
- **Theme Integration:** Enable/disable button replacement on product pages or archives independently.

## How It Works

1. Prices are hidden via the `woocommerce_get_price_html` filter
2. Add to Cart buttons are replaced on both archive (`woocommerce_loop_add_to_cart_link`) and single product pages (`woocommerce_single_product_summary`)
3. Clicking the replacement button opens a modal with a contact form
4. Form submissions are sent via AJAX and delivered to the WordPress admin email via `wp_mail()`

## Requirements

- WordPress 5.8+
- WooCommerce 5.0+
- PHP 7.4+

## License

This project is licensed under the [GNU General Public License v2.0 or later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
