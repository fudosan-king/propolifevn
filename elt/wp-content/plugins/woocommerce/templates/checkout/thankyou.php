<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>
<div class="bg-default" style="padding: 50px 0 15px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb2">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active"><a><?php _e('Thank you for your order', 'woocommerce'); ?></a>
                    </li>
                </ol>
            </div>
        </div>

	<?php if ( $order->has_status( 'failed' ) ) : ?>
		<div class="row mb100 thanks_page">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></h4>
				<div class="box_thanks">
					<p><?php
						if ( is_user_logged_in() )
							_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
						else
							_e( 'Please attempt your purchase again.', 'woocommerce' );
					?></p>

					<p>
						<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
						<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div>

	<?php else : ?>
		<div class="row mb100 thanks_page">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></h4>
		<div class="box_thanks">
			<ul class="order_details">
				<li class="order">
					<?php _e( 'Order Number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>
				<li class="date">
					<?php _e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
				</li>
				<li class="total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>
				<?php if ( $order->payment_method_title ) : ?>
				<li class="method">
					<?php _e( 'Payment Method:', 'woocommerce' ); ?>
					<strong><?php echo $order->payment_method_title; ?></strong>
				</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="clear"></div>
		</div>
		</div>
	<?php endif; ?>

	<?php //do_action( 'woocommerce_thankyou', $order->id ); ?>

	<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>
	</div>
</div>
