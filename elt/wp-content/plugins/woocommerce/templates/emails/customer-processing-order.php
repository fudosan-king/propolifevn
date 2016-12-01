<?php
/**
 * Customer processing order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<div>
    <?php

        _e( "Your order has been received and is now being processed. Your order details are shown below for your reference:", 'woocommerce' );
        //Cast any text of product to en_US text
        //Writer: kns
        if(get_locale()!='en_US'){
            ?>
                <div style="font-style:italic;font-size:11px;">(Your order has been received and is now being processed. Your order details are shown below for your reference:)</div>
            <?php
        }
    ?>

</div><br>

<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>

<h2>
	<?php
		printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() );

		if(get_locale()!='en_US'){
			?>
				<div style="font-style:italic;font-size:15px;">(<?php printf('Order #%s', $order->get_order_number()); ?>)</div>
			<?php
		}
	?>
</h2>

<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
	<thead>
		<tr>
			<th class="td" scope="col" style="text-align:left;">
				<?php
					//Cast any text of product to en_US text
    				//Writer: kns
					_e( 'Product', 'woocommerce' );
					if(get_locale()!='en_US'){
						?>
							<div style="font-style:italic;font-size:11px;">(Product)</div>
						<?php
					}
				?>
			</th>
			<th class="td" scope="col" style="text-align:left;">
				<?php
					//Cast any text of product to en_US text
    				//Writer: kns
					_e( 'Quantity', 'woocommerce' );
					if(get_locale()!='en_US'){
						?>
							<div style="font-style:italic;font-size:11px;">(Quantity)</div>
						<?php
					}
				?>
			</th>
			<th class="td" scope="col" style="text-align:left;">
				<?php
					//Cast any text of product to en_US text
    				//Writer: kns
					_e( 'Price', 'woocommerce' );
					if(get_locale()!='en_US'){
						?>
							<div style="font-style:italic;font-size:11px;">(Price)</div>
						<?php
					}
				?>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true, $order->has_status( 'processing' ) ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th class="td" scope="row" colspan="2" style="text-align:left; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>">
							<?php
								echo $total['label'];
								//Cast any text of product to en_US text
    							//Writer: kns
								if(get_locale()!='en_US' && $total['raw_label']!=''){
									?>
										<div style="font-style:italic;font-size:11px;">(<?php echo $total['raw_label']; ?>:)</div>
									<?php
								}
							?>
						</th>
						<td class="td" style="text-align:left; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
