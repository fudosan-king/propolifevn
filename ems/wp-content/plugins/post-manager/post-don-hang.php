<?php
add_action('init', 'create_dathang_post_type');
function create_dathang_post_type(){
register_post_type('dathang',
array(
'labels'  =>  array(
'name'  =>  __('Orders'),
'singular_name' =>  __('Orders'),
'add_new' =>  __('Add new'),
'add_new_item'  =>  __('Add new Orders'),
'edit'  =>  __('Edit'),
'edit_item' =>  __('Edit Orders'),
'new_item'  =>  __('Orders'),
'view'  =>  __('View Orders'),
'view_item' =>  __('View Orders'),
'search_items' =>  __('Search Orders'),
'not_found' =>  __('No item'),
'not_found_in_trash'  =>  __('No item')
),
'public'  =>  true,
'show_ui' =>  true,
'publicy_queryable' =>  true,
'exclude_from_search' =>true,
'menu_position' => 20,
'hierarchical'  => false,
'query_var' =>  true,
'supports'  =>  array('title','author'),
'rewrite' =>  array('slug'  =>  'dathang', 'with_front' =>  false),
'can_export'  =>  true,
'description' =>  __('Orders.'),
'menu_icon'   => 'dashicons-cart',
)
);
}

$custom_order_info = array(
'id' => 'custom-order-info',
'title' => 'Custom information',
'page' => 'page',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Full name','id' => $prefix . 'custom_name','type' => 'text','std' => ''),					  
array('name' => 'Mobile','id' => $prefix . 'custom_mobile','type' => 'text','std' => ''),
array('name' => 'Mail','id' => $prefix . 'custom_mail','type' => 'text','std' => ''),
array('name' => 'Address','id' => $prefix . 'custom_address','type' => 'textarea','std' => ''),
array('name' => 'Message','id' => $prefix . 'custom_message','type' => 'textarea','std' => '')
)
);

$orders_register = array(
'id' => 'orders-info',
'title' => 'Orders Information',
'page' => 'page',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Status','id' => $prefix . 'drop-orders-info','type' => 'statusOrder'),					  
array('name' => 'Delivery man','id' => $prefix . 'deliveryman','type' => 'select','options' =>array('Delivery man')),
array('name' => 'Order ID','id' => $prefix . 'order-id','type' => 'label','std' => '00000000000000'),
array('name' => '&nbsp;','id' => $prefix . 'order-info-products','type' => 'customerListOrder')
)
);

add_action('admin_menu', 'orders_add_box');
function orders_add_box() {
$post = get_post_type(get_post($_GET['post']));
if($post=='dathang' || $post=='dat-hang'){
global $orders_register,$custom_order_info;
add_meta_box($custom_order_info['id'], $custom_order_info['title'], 'custom_show_box', 'dathang', $custom_order_info['context'], $custom_order_info['priority']);
add_meta_box($orders_register['id'], $orders_register['title'], 'orders_show_box', 'dathang', $orders_register['context'], $orders_register['priority']);
}
}

function orders_show_box() {
global $orders_register, $post;
// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="table">';
foreach ($orders_register['fields'] as $field) {
$meta = get_post_meta($post->ID, $field['id'], true);
$color = get_post_meta($post->ID,'status-color', true);
$sOrder = get_post_meta($post->ID,'status-order', true);
if($color=='')
$color='c70031';	
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/content-controls.php');
}
echo '</table>';
}

function custom_show_box() {
global $custom_order_info, $post;
// Use nonce for verification
echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
echo '<table class="table">';
foreach ($custom_order_info['fields'] as $field) {
$meta = get_post_meta($post->ID, $field['id'], true);
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/content-controls.php');
}
echo '</table>';
}

/*-----------------------------------------------------------------------*/
function order_manage_columns( $column, $post_id ) {
	global $post;
	$status = get_post_meta($post->ID,'status-order',true);
	$orderName = get_post_meta($post->ID,'custom_name',true);
	$statusColor = get_post_meta($post->ID,'status-color',true);
	$staffName = get_post_meta($post->ID,'delivery-man',true);
	if($status==''){$status='New orders';$statusColor="c70031";}
	if($staffName=='')
		$staffName='Select delivery man';	
				
	switch( $column ) {
		case 'man-name-order' :
			echo $orderName;
		break;		
		case 'status-order' :
			echo '<label class="ostatus">'.$status.'</label><label style="background-color:#'.$statusColor.';" class="colorStatus"></label>';
		break;			
		case 'delivery-man' :
			echo $staffName;			
		break;	
	}
}

function custom_update_orders_status(){
	$color = $_REQUEST['cl'];
	$sOrder = $_REQUEST['sOrder'];
	$postID = $_REQUEST['post_id'];
	update_post_meta($postID,'status-color',$color);
	update_post_meta($postID,'status-order',$sOrder);
	die();	
}

add_action( 'wp_ajax_update_orders_status', 'custom_update_orders_status');
add_action( 'wp_ajax_nopriv_update_orders_status', 'custom_update_orders_status');
/*-----------------------------------------------------------------------*/
function order_edit_columns( $columns ) {
	$_columns = array();    
	foreach($columns as $key=>$value){
		$_columns[$key] = $value;
		if($key=='title'){
			$_columns['man-name-order'] = 'Name order';			
            $_columns['status-order'] = 'Status order';			
			$_columns['delivery-man'] = 'Delivery man';
		}
	}	
	return $_columns;
}
/*-----------------------------------------------------------------------*/
add_filter( 'manage_edit-dathang_columns', 'order_edit_columns' ) ;
add_action( 'manage_dathang_posts_custom_column', 'order_manage_columns', 10, 2 );	 
?>