<?php
/*-----------------------------------------------------------------------*/
function my_mail_manage_columns( $column, $post_id ) {
	global $post;
	switch($column) {
		case 'col_excerpt' :		
		echo $post->post_excerpt;
		break;	
	}
}
/*-----------------------------------------------------------------------*/
function my_mail_edit_columns( $columns ){
	$_columns = array();    
	foreach($columns as $key=>$value){
		$_columns[$key] = $value;
		if($key=='title'){
            $_columns['col_excerpt'] = 'Excerpt';
		}
	}	
	return $_columns;
}
/*-----------------------------------------------------------------------*/
add_filter( 'manage_edit-mail-inbox_columns', 'my_mail_edit_columns' ) ;
add_action( 'manage_mail-inbox_posts_custom_column', 'my_mail_manage_columns', 10, 2 );	
?>