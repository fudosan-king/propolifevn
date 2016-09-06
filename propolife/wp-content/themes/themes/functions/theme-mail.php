<?php
function sendmail(){
	$lienhe = contactInfo();
	$hoten=$_REQUEST['user'];
	$email=$_REQUEST['mail'];
	$diachi=$_REQUEST['add'];
	$phone=$_REQUEST['phone'];
	$noidung=$_REQUEST['message'];
	
	$title="【PROPOLIFE VIETNAM】WEBからのお問い合わせ";
	$html="<b>お名前</b> :".$hoten."<br/>";
	$html.="<b>ご住所</b> :".$diachi."<br/>";
	$html.="<b>メールアドレス</b> :".$email."<br/>";
	$html.="<b>電話番号</b> :".$phone."<br/><br/>";
	$html.="<b>お問い合わせ内容</b> :<br/>".$noidung;
	$headers = 'Content-type: text/html';			
	//$admin_email = get_settings('admin_email');
	//wp_mail($admin_email,$title, $html,$headers);
	$posttitle = $hoten.'-'.$email;

	$ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	if($query && $query['status'] == 'success') {
	$timezone = $query['timezone'];
	$date = new DateTime('now', new DateTimeZone($timezone));
	$localtime = $date->format('Y-m-d H:i:s');
	$fromlocation = $localtime.'/'.$query['city'].'/'.$query['country'];
	$posttitle = $hoten.'-'.$query['city'].'-'.$query['country'];
	}
	$listmail = explode(';',$lienhe['mail']);
	foreach($listmail as $m){
		wp_mail($m,$title, $html,$headers);
	}
	
	$my_post = array('post_title' =>$posttitle,'post_type' => 'mail-inbox','post_excerpt'=>$noidung,'post_status' => 'publish');
	$postID = wp_insert_post($my_post);
	
	if($fromlocation==''){
		$fromlocation = get_the_date('Y-m-d',$postID).' @ '.get_the_time('',$postID);
	}
	
	update_post_meta($postID,'c-name',$hoten);
	update_post_meta($postID,'c-email',$email);
	update_post_meta($postID,'c-date',$fromlocation);
	update_post_meta($postID,'c-phone',$phone);
	update_post_meta($postID,'c-address',$diachi);
	update_post_meta($postID,'c-message',$noidung);
	$result = alertDialog(1);
	echo $result;
	die();
}
add_action('wp_ajax_sendmailContact','sendmail');
add_action('wp_ajax_nopriv_sendmailContact','sendmail');
/*-----------------------------------------------------------------------*/
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {return 'text/html';}
?>