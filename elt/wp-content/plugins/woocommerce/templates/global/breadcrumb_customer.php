<?php
/**
 * Shop breadcrumb
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $breadcrumb ) {

    echo $wrap_before;

    foreach ( $breadcrumb as $key => $crumb ) {

        echo $before;
        $href = esc_url( $crumb[1] );
        if (strpos($href, 'danh-muc-san-pham')){
            $href = str_replace('danh-muc-san-pham', 'product-category', $href);
        }

        if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
            echo '<li><a href="' . $href . '">' . esc_html( $crumb[0] ) . '</a>';
        } else {
            echo esc_html( $crumb[0] );
        }

        echo $after;

        if ( sizeof( $breadcrumb ) !== $key + 1 ) {
            echo $delimiter;
        }

    }
    echo '<li class="pull-right">';
    if (!is_product()) {
        global $wp_query;

        $paged    = max( 1, $wp_query->get( 'paged' ) );
        $per_page = $wp_query->get( 'posts_per_page' );
        $total    = $wp_query->found_posts;
        $first    = ( $per_page * $paged ) - $per_page + 1;
        $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

        if ( 1 == $total ) {
            _e( 'Showing the single result', 'woocommerce' );
        } elseif ( $total <= $per_page || -1 == $per_page ) {
            printf( __( 'Showing all %d results', 'woocommerce' ), $total );
        } else {
            printf( _x( 'Showing %1$d&ndash;%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
        }
    }
    echo '</li>';

    echo $wrap_after;

}