<?php
@session_start();
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {?>
<script type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
<?php
}
function htmlContactButton(){
	ob_start();?>
    <div class="clearfix"></div>
	<a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-default btn-lg btn-danger" style="color: #ffffff;margin-bottom:25px;">
    <i class="fa fa-envelope" style="margin-right:5px;"></i><span class="hidden-xs">WEBからの お問い合わせ</span>
    </a>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
/*-----------------------------------------------------------------------*/
include('include/theme-script.php');
/*-----------------------------------------------------------------------*/
function new_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Propolife Viet Nam' ), max( $paged, $page ) );

	return $title;
}

/*-----------------------------------------------------------------------*/
add_filter( 'wp_title', 'new_wp_title', 10, 2 );

/*-----------------------------------------------------------------------*/
include('content-alert.php');
/*-----------------------------------------------------------------------*/
function sendmail(){
	$hoten=$_REQUEST['user'];
	$email=$_REQUEST['mail'];
	$diachi=$_REQUEST['add'];
	$phone=$_REQUEST['phone'];        
	$noidung=$_REQUEST['message'];
	
	$title=$hoten." - お名前";
	$html="<b>お名前</b> :".$hoten."<br/>";  
	$html="<b>ご住所</b> :".$diachi."<br/>"; 
	$html.="<b>メールアドレス</b> :".$email."<br/>";
	$html.="<b>電話番号</b> :".$phone."<br/><br/>";
	$html.="<b>お問い合わせ</b> :<br/>".$noidung;
	$headers = 'Content-type: text/html';		
	//$admin_email = get_settings('admin_email');
	//wp_mail($admin_email,$title, $html,$headers);	
	//echo 1;
	alertDialog(1);	
	die();
}
add_action('wp_ajax_sendmailContact','sendmail');
add_action('wp_ajax_nopriv_sendmailContact','sendmail');
/*-----------------------------------------------------------------------*/
function getSlugCustomPosttype(){
	$link = get_permalink();
	$link = str_replace( home_url( '/' ), '', $link );
	$link = str_replace('?', '', $link );
	if(is_home()){$classNname='home';}
	else{
	if ( ( $len = strlen( $link ) ) > 0 && $link[$len - 1] == '/' ) {
		$link = substr( $link, 0, -1 );
	}
	$arr = array();
	$arr=explode( '=', $link );			
	if(is_page()){		
		$classNname = get_post($arr[1])->post_name;				
	}
	elseif(is_singular()){
		$classNname = $arr[0];	
	}
	elseif(is_tax()){
		$tax = $arr[0];
		$slug = $arr[1];
		$classNname = $tax;
	}
	}
	return $classNname;
}
/*-----------------------------------------------------------------------*/
function activeMenu(){
	$class = getSlugCustomPosttype();
	?>
	<script>jQuery(function($){$('.<?php echo $class;?>').addClass('active');})</script>
    <?php
}    
add_action('wp_footer','activeMenu');
/*-----------------------------------------------------------------------*/
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
/*-----------------------------------------------------------------------*/
function get_page_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
/*-----------------------------------------------------------------------*/
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {return 'text/html';}
/*-----------------------------------------------------------------------*/
function getExcerptByID($page_id){
	$my_post = get_post($page_id);
	$my_excerpt=$my_post->post_excerpt;		
	return $my_excerpt;
}

function getContentByID($page_id){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;	
	
}
?>