<?php
$san_pham_chon=get_total_price();
if(is_array($san_pham_chon)){
foreach($san_pham_chon as $result){
$so_luong_sp="so_luong_sp_". $result["id"];
if(isset($_REQUEST[$so_luong_sp])){
$value=$_REQUEST[$so_luong_sp];
$_SESSION[$so_luong_sp]=$value;
}
}
}

$customname = $_REQUEST['fullname'];
$email = $_REQUEST['mailaddress'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$message = $_REQUEST['message'];

$datetime = new DateTime();
$date=$datetime->format('Y/m/d H:i:s');
$madonhang='#'.preg_replace('/[^A-Za-z0-9]/', '',$date);

$title=$customname.'-'.__('Đặt hàng','ems').'-'.$madonhang;
$htmlCustomer='<b>'.__('Người đặt hàng','ems').'</b>:'.$customname.'<br/>';
$htmlCustomer.='<b>'.__('Điện thoại','ems').'</b>:'.$phone.'<br/>';
$htmlCustomer.='<b>Email</b>:'.$email.'<br/>';
$htmlCustomer.='<b>'.__('Địa chỉ','ems').'</b>:'.$address.'<br/>';
$htmlCustomer.='<b>'.__('Ghi chú','ems').'</b>:'.$message.'<br/>';
$htmlCustomer.='<b>'.__('Mã đơn hàng','ems').'</b>:'.$madonhang.'<br/><br/>';

$htmlOrder='<table class="wp-list-table widefat striped table-order" border="1" bordercolor="e1e1e1" cellpadding="0" cellspacing="0" wi><thead><tr>';
$htmlOrder.='<td width="30" align="center">'.__('STT','ems').'</td>';
$htmlOrder.='<th width="60">'.__('HÌNH','ems').'</th>';
$htmlOrder.='<th align="left">'.__('TÊN SẢN PHẨM','ems').'</th>';
$htmlOrder.='<th align="center" style="text-align:center">'.__('MÃ SP','ems').'</th>';
$htmlOrder.='<th class="num" align="center">'.__('SỐ LƯỢNG','ems').'</th>';
$htmlOrder.='<th class="price" align="right">'.__('GIÁ','ems').'</th>';
$htmlOrder.='</tr></thead><tbody>';

$htmlHeader='<div style="background-color:#f2f2f2;font-size:12px;font-family:arial;line-height:21px;margin-top: 20px;width:100%">
<div style="width:600px;margin:auto;background-color:#6b6b6b">
<div align="center" style="padding:20px 0px;color:#ffffff;"><img src="'.('template_directory').'/images/logomail.jpg">
<h2>'.$lienhe['hotline'].'</h2>営業時間:月曜日 – 金曜日 8.00-17:00</div>
<div style="background-color:#e3e3e3;padding:10px;">'.__('Cảm ơn quý khách','ems').' '.$customname.' '.__('đã đặt hàng tại EMS.','ems').'<br>'.__('ems.com rất vui thông báo đơn hàng','ems').' '.$madonhang.' '.__('của quý khách đã được tiếp nhận và đang trong quá trình xử lý. EMS sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.','ems').'</div>
<div style="background-color:#e3e3e3;padding:0px 10px;font-weight:bold">'.__('THÔNG TIN ĐƠN HÀNG','ems').' '.$madonhang.' ('.$date.')</div>
<table width="100%" cellpadding="0" cellspacing="0" border="1" bordercolor="#e3e3e3" bgcolor="#e3e3e3" style="border-collapse: collapse;border-color: #E3E3E3;">
<tr>
<td style="padding:10px" width="50%">
<strong style="border-bottom: solid;border-color: #f20000;">'.__('THÔNG TIN THANH TOÁN','ems').'</strong><br>
N: '.$customname.'<br>
M: '.$email.'<br>
T: '.$phone.'
</td>
<td style="padding:10px" width="50%">
<strong style="border-bottom: solid;border-color: #f20000;">'.__('ĐỊA CHỈ GIAO HÀNG','ems').'</strong><br>
A: '.$address.'<br>
T: '.$phone.'<br>
N: '.$message.'
</td>
</tr>
</table>
<div style="background-color:#f20000;padding:10px;color:#ffffff;font-size:18px">'.__('CHI TIẾT ĐƠN HÀNG','ems').'</div>
<table width="100%" cellpadding="0" cellspacing="0" border="1" bordercolor="#f2f2f2" bgcolor="#FFFFFF" style="border-collapse: collapse;border-color: #F2F2F2;">
<tr>
<td align="center" style="padding:10px"><strong>'.__('STT','ems').'</strong></td>
<td align="left" style="padding:10px"><strong>'.__('TÊN SẢN PHẨM','ems').'</strong></td>
<td align="right" style="padding:10px"><strong>'.__('ĐƠN GIÁ','ems').'</strong></td>
<td align="center" style="padding:10px"><strong>'.__('SỐ LƯỢNG','ems').'</strong></td>
<td align="right" style="padding:10px"><strong>'.__('TỔNG TẠM','ems').'</strong></td>
</tr>';

$san_pham_chon=get_total_price();

if(is_array($san_pham_chon)){
$dem=0;
foreach($san_pham_chon as $result){
$dem++;
$htmlOrder.='<tr class="inactive">
<td align="center">'.$dem.'</td>
<td><img src="'.$result["images"].'" alt='.$result["title"].' width="60" height="auto" /></td>
<td align="left" style="text-align:left">'.$result["title"].'</td>
<td align="center">'.$result["id"].'</td>
<td class="num" align="center">'.$result["soluong"].'</td>
<td class="price" align="right">'.$result["price"].'</td>
</tr>';
$htmlBody.='<tr>
<td align="center" style="padding:10px">'.$dem.'</td>
<td align="left" style="padding:10px">'.$result["title"].'</td>
<td align="right" style="padding:10px">'.$result["price"].'</td>
<td align="center" style="padding:10px">'.$result["soluong"].'</td>
<td align="right" style="padding:10px">'.$result["price"].'</td>
</tr>';
}
}
$htmlFooter='</table>
<div style="padding:20px 10px;color:#000000;background-color:#e3e3e3;font-size:18px" align="right">'.__('TỔNG CỘNG','ems').':<span style="color:#f20000">'.number_format($_SESSION["tong"]).' VND</span></div>
<div align="center" style="padding:10px;color:#ffffff">'.__('Quý khách nhận được email này vì đã mua hàng tại EMS.','ems').'<br>'
.__('Để chắc chắn luôn nhận được email thông báo, xác nhận mua hàng từ ems.com, quý khách vui lòng thêm địa chỉ hotro@ems.com vào số địa chỉ (Address Book, Contacts) của hộp email.','ems').'<br>
<address style="border-top:solid;border-color:#515151;border-width:1px;margin-top:10px;padding-top:10px">'.__('Văn phòng EMS:'.$lienhe['diachigmap'],'ems').'</address></div></div></div>';

$htmlOrder.='</tbody><tfoot><tr><td colspan="5" align="right">'.__('TỔNG CỘNG','ems').'</td><td align="right">'.number_format($_SESSION["tong"]).' VND</td></tr></tfoot></table>';
$my_post = array('post_title' =>$madonhang,'post_type' => 'dathang','post_status' => 'publish');

$post_ID = wp_insert_post($my_post);
update_post_meta($post_ID,'custom_name',$customname);
update_post_meta($post_ID,'custom_mobile',$phone);
update_post_meta($post_ID,'custom_mail',$email);
update_post_meta($post_ID,'custom_address',$address);
update_post_meta($post_ID,'custom_message',$message);
update_post_meta($post_ID,'order-id',$madonhang);
update_post_meta($post_ID,'order-info-products',$htmlOrder);
$headers = array('Content-Type: text/html; charset=UTF-8');
$admin_email = get_settings('admin_email');

wp_mail($admin_email,__('Đơn hàng','ems').' '.$madonhang,$htmlHeader.$htmlBody.$htmlFooter,$headers);
wp_mail('m.watanabe@fudosan-king.jp',__('Đơn hàng','ems').' '.$madonhang,$htmlHeader.$htmlBody.$htmlFooter,$headers);
wp_mail($email,__('Xác nhận đơn hàng tại EMS','ems'),$htmlHeader.$htmlBody.$htmlFooter,$headers);
//destroy
$san_pham_chon=get_total_price();

if(is_array($san_pham_chon)){
foreach($san_pham_chon as $result){
//$so_luong_sp="so_luong_sp_". $result["id"];
//if(isset($_REQUEST[$so_luong_sp])){
$id_san_pham="id_sp_".$result["id"];
$so_luong_sp="so_luong_sp_".$result["id"];
unset($_SESSION[$id_san_pham]);
unset($_SESSION[$so_luong_sp]);
unset($_SESSION["tong"]);
unset($_SESSION["tong_sp"]);
//}
}
}
$html=alertDialog(15);
?><script>jQuery(function($){$('#messageDialog').modal('show').html('<?php echo $html;?>');});</script><?php return; ?>