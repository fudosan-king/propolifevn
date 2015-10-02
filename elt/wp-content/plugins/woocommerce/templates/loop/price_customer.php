<?php
/**
 * Loop Price
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
    <p class="price">
    <?php _e('[:en]Price: [:ja]価格: [:vi]Giá: [:kr]가격: [:]', 'qtranslate' ); ?>
    <label><?php echo $price_html; ?></label></p>
<?php endif; ?>
