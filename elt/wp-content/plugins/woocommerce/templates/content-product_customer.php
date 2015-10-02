<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
    return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
    $classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
    $classes[] = 'last';
}
?>

<div class="container">
<div class="row thumbcats">
    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
    <?php
        $href = get_permalink();
        if (strpos($href, 'sản phẩm')){
            $href = str_replace('sản phẩm', 'product', $href);
        }
    ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
            <div class="thumbnail">
            <a href="<?php echo $href; ?>" class="lazy-item">

                <?php
                    /**
                     * woocommerce_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_template_loop_product_title - 10
                     */
                    do_action( 'woocommerce_shop_loop_item_title' );


                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );


                ?>
            </a>
                <p><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></p>
                <a class="btn btn-default" href="<?php echo $href; ?>"><span>Read more</span></a>

            </div>
        </div>
    <?php

        /**
         * woocommerce_after_shop_loop_item hook
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );

    ?>
