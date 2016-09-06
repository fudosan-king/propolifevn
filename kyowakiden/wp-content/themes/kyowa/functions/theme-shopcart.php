<?php
function get_total_price(){
global $post;
$tonggia=0;
$san_pham_chon="";
$dem=0;
$temp = $wp_query;
$wp_query= null; 
$wp_query = new WP_Query(array ('post_type' => 'menu','posts_per_page'=>'-1'));   

if ($wp_query->have_posts()){ 
   while ($wp_query->have_posts()){
		$wp_query->the_post();		
		$gia=0;
		$postmeta=get_post_custom($post->ID);
		$images_sp_thumbnail=wp_get_attachment_url( get_post_thumbnail_id($post->ID),'featured_preview');
		$images_sp_medium=wp_get_attachment_url( get_post_thumbnail_id($post->ID),'featured_preview');
		
		$gia=get_post_meta($post->ID,'gia-sp');
		$pattern="/[0-9]*/";
		preg_match($pattern, $gia[0], $gia1);
		if($gia[0] != ''){$gia_str=number_format($gia1[0]);}
		else{$gia_str=__('Liên hệ','ems');}
		$id_san_pham="id_sp_".$post->ID;
		$so_luong_sp="so_luong_sp_".$post->ID;
		
		if(isset($_SESSION[$id_san_pham])){		         
		$san_pham_chon[$dem]["id"]=$post->ID;
		$san_pham_chon[$dem]["title"]=$post->post_title;
		$san_pham_chon[$dem]["images"]=$images_sp_thumbnail;
		$san_pham_chon[$dem]["images_medium"]=$images_sp_medium;
		$san_pham_chon[$dem]["gia-sp"]=$gia_str;
		$san_pham_chon[$dem]["soluong"]=$_SESSION[$so_luong_sp];
		$tonggia=$tonggia+$gia[0]*$_SESSION[$so_luong_sp];
		$dem++;
		}											   
   }
}
$wp_query = null;
$wp_query = $temp; 
$_SESSION["tong"]=$tonggia;
$_SESSION["tongsp"]=$dem;
return  $san_pham_chon;	
}
function set_session_price($id){
   $id_san_pham="id_sp_".$id;
   $so_luong_sp="so_luong_sp_".$id;
   $_SESSION[$id_san_pham] =$id;
   if(isset( $_SESSION[$so_luong_sp])){$_SESSION[$so_luong_sp] =$_SESSION[$so_luong_sp]+1;}
   else{$_SESSION[$so_luong_sp] =1;}  
}
function set_session_number_price($id,$number){
   $so_luong_sp="so_luong_sp_".$id;
   if(isset( $_SESSION[$so_luong_sp])){$_SESSION[$so_luong_sp] =$number;}
   else{$_SESSION[$so_luong_sp] =1;}
  
}
function remove_session_cart($id){
    $id_san_pham="id_sp_".$id;
    $so_luong_sp="so_luong_sp_".$id;
    $_SESSION["tongsp"]=$_SESSION["tongsp"]-1;
    if($_SESSION["tongsp"] == 0){unset($_SESSION["tongsp"]);}
    unset($_SESSION[$id_san_pham]);
    unset($_SESSION[$so_luong_sp]);
}
?>