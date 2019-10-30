<?php
echo '<p>不動産オーナー様からお問い合わせが届きました。<br>
確認をお願い致します。</p>';

$string_info = '<p>';
// Username
if($userName != '') {
    $string_info .= 'お名前 : ' . $userName;
}
// Email
if($email != '') {
    $string_info .= '<br>' . 'Eメール : ' . $email;
}
// Phone
if($phone != '') {
    $string_info .= '<br>' . 'お電話番号 : ' . $phone;
}
// Address
if($address != '') {
    $string_info .= '<br>' . '物件住所 : ' . $address;
}
$string_info .= '</p>';
echo $string_info;

$link = PATH_URL . 'admincp/estate_owners/update/' . $house_id;
echo '<p>詳細情報については下記の管理画面のURL先をご確認ください。</p>';
echo '<p><a target="_blank" href="' . $link . '">Click Here</a> （管理画面内の該当のお問い合わせの詳細情報ページへのリンク）</p>';