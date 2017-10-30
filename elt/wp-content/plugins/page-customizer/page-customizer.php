<?php

/**
 * @package Page Customizer
 * @version 1.0
 */
/*
Plugin Name: Page Customizer
Description: A custom plugin for modifying/override Wordpress Core/Plugins. You can put your modifications in this plugin.
Author: Nhan Nguyen
Version: 1.0
 */

// WooCommerce Custom Query
include ('wc-exclude-product-category-from-shop-page.php');
// WooCommerce Custom Submenu
include ('wc-specified-product-category-submenu.php');
// WooCommerce Drag & Drop Products
include ('wc-sortable-products.php');
?>
