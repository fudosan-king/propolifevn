<?php
@session_start();
if(isset($_REQUEST["plus"])){
    $id_plus=$_REQUEST["plus"];
    $number=$_REQUEST["number"];
    set_session_number_price($id_plus,$number);
}
elseif(isset($_REQUEST["remove"])){
    $id_active=$_REQUEST["remove"];
    remove_session_cart($id_active);
}
$san_pham_chon=get_total_price();
$total_cart=number_format($_SESSION["tong"]);
echo $total_cart;
?>