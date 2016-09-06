<?php
@session_start();
if(isset($_REQUEST["active"])){
    $id_active=$_REQUEST["active"];
	$soluong=$_REQUEST["soluong"];
    set_session_price($id_active,$soluong);	
}
$san_pham_chon=get_total_price();
if(isset($_SESSION['tongsp'])){
    $tongsp=$_SESSION['tongsp'];
    $cart_list_label = $tongsp;
	echo $cart_list_label;
	die();
}
else{
    $tongsp=0;
    $cart_list_label=$tongsp;
}
    echo $cart_list_label;
?>