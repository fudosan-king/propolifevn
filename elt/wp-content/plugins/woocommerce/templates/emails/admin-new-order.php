<?php
/**
 * Admin new order email
 *
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<div>
    <?php

        printf( __( 'You have received an order from %s. The order is as follows:', 'woocommerce' ), $order->get_formatted_billing_full_name() );
        //Cast any text of product to en_US text
        //Writer: kns
        if(get_locale()!='en_US'){
            ?>
                <div style="font-style:italic;font-size:11px;">(You have received an order from <?php echo $order->get_formatted_billing_full_name(); ?>. The order is as follows:)</div>
            <?php
        }
    ?>

</div><br>

<?php do_action( 'woocommerce_email_before_order_table', $order, true, false ); ?>

<h2><a class="link" href="<?php echo admin_url( 'post.php?post=' . $order->id . '&action=edit' ); ?>"><?php printf( __( 'Order #%s', 'woocommerce'), $order->get_order_number() ); ?></a> (
	<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( wc_date_format(), strtotime( $order->order_date ) ) ); ?>)

	<?php

		if(get_locale()!='en_US'){
			?>
				<div style="font-style:italic;font-size:15px;">

					<a class="link" href="<?php echo esc_url( admin_url( 'post.php?post=' . $order->id . '&action=edit' ) ); ?>">(<?php printf('Order #%s', $order->get_order_number()); ?>)</a>
				</div>
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
		<?php echo $order->email_order_items_table( false, true ); ?>
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
						<td class="td" scope="col" style="text-align:left; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, true, false ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, true, false ); ?>

<?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
