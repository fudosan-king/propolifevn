<?php
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
	$result=alertDialog(1);	
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