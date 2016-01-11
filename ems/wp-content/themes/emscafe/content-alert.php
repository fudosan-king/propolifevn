<?php
function alertDialog($flag){
switch ($flag){
case 0:
$header='ĐANG XỬ LÝ THÔNG TIN';
$content='Thông tin đang xác nhận, vui lòng đợi trong giây lát <i class="fa fa-spinner fa-spin"></i>';
$footer = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
break;
case 1:
$header='データの成功を送信';
$content='Thông tin gởi thành công, chúng tôi sẽ liên hệ lại bạn, Xin cảm ơn.';
$footer = '<a href="'.home_url().'" class="btn btn-default">Close</a>';
break;
case 2: 
$header= 'Đăng ký thành công';
$content='Chúng tôi đã gửi thư xác nhận tới hộp mail của bạn,vui lòng kiểm tra email để kích hoạt tài khoản.';
$footer='';

break;
case 3: 
$header= 'Đăng ký thất bại';
$content='Vì lý do kỹ thuật đăng ký thất bại!<br/> xin thử lại sau.';
$footer='';

break;
case 4: 
$header= 'Chưa kích hoạt tài khoản';
$content='Chúng tôi đã gửi thư xác nhận tới hộp mail của bạn, vui lòng kiểm tra email để kích hoạt tài khoản.';
$footer='';

break;
case 5: 
$header= 'Cập nhật tài khoản';
$content='Bạn đã cập nhật tài khoản trên website';
$footer='';

break;
case 6: 
$header= 'Cập nhật tài khoản';
$content='Vì lí do kỹ thuật cập nhật tài khoản thất bại<br />xin thử lại sau ít phút.';
$footer='';

break;
case 7: 
$header= 'Kích hoạt tài khoản';
$content='Kích hoạt thất bại, tài khoản ko xác thực!';
$footer='';

break;
case 8: 
$header= 'Cập nhật tài khoản';
$content='Vì lí do kỹ thuật cập nhật tài khoản thất bại<br />xin thử lại sau ít phút.';
$footer='';

break;
case 9: 
$header= 'Kích hoạt tài khoản';
$content='Chúc mừng bạn đã là thành viên của website<br/>';
$footer='';

break;
case 10: 
$header= 'Kích hoạt tài khoản';
$content='Vì lí do kỹ thuật kích hoạt tài khoản thất bại<br/>xin vui lòng thử lại sau!';
$footer='';

break;
case '11': 
$header= 'Kích hoạt tài khoản';
$content='Tài khoản của bạn đã được kích hoạt.';
$footer='';

break;
case '12': 
$header= 'Không đủ quyền hạn!';
$content='Bạn không đủ quyền hạn để sử dụng chức năng này.';
$footer='';

break;
case 13: 
$header= 'Đã gửi mail';
$content='Mail của bạn đã được gửi tới khách hàng.';
$footer='';

break;
case 14: 
$header= 'Đã gửi mail';
$content='Thông tin của bạn đã được gửi tới chúng tôi.<br/ >Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.';
$footer='';
break;
case 15:
 
$header= 'ĐÃ GỞI ĐƠN ĐẶT HÀNG';
$content='Đơn đặt hàng của bạn đã được gửi tới chúng tôi.<br/ >Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.';
$footer = '<a href="'.home_url().'" class="btn btn-default">Close</a>';
break;

case '16': 
$header= 'Đăng nhập';
$content='Chào mừng bạn đã đăng nhập<a href="'.home_url().'">Quay lại trang chủ</a>';
$footer='';
break;

case 17: 
$header= 'ショッピングカート';
$content='<i class="fa fa-shopping-basket fa-3x" style="margin-right:10px"></i>ショッピングカート商品なし';
$footer='<div align="center"><a href="'.get_permalink(get_page_by_path( 'menu')).'" class="btn btn-danger">選択メニュー</a></div>';

break;
case 18: 
$header= 'Đăng nhập';
$content='Sai password hoặc tài khoản!';
$footer='Bạn chưa có tài khoản hãy <a href="'.get_permalink(get_page_by_path( 'dang-ky')).'">Đăng ký</a>';
break;

case 19: 
$header= 'Đăng nhập';
$content='Xin vui lòng đăng nhập';
$footer='Bạn chưa có tài khoản hãy <a href="'.get_permalink(get_page_by_path('dang-ky')).'">Đăng ký</a>';
break;
}

$html='<div class="modal-dialog modal-sm" role="document">';
$html.='<div class="modal-content">';
$html.='<div class="modal-header">';
$html.='<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$html.='<h4 class="modal-title" id="myModalLabel">'.$header.'</h4>';
$html.='</div>';
$html.='<div class="modal-body">'.$content.'</div>';
$html.='<div class="modal-footer">'.$footer.'</div>';
$html.='</div>';
$html.='</div>';
return $html;
}
?>