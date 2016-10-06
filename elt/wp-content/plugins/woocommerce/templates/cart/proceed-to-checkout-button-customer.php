<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
echo '<div align="right"><a href="http://www.eltvn.com/?page_id=430" class="btn btn-default btn_none_effect" style="margin-right:10px;margin-bottom:0px">' . __( 'Continue Shopping', 'woocommerce' ) . '</a><a href="' . esc_url( WC()->cart->get_checkout_url() ) . '" class="checkout-button button alt wc-forward btn btn-primary" style="margin-bottom:0px">' . __( 'Proceed to Checkout', 'woocommerce' ) . '</a></div>';
