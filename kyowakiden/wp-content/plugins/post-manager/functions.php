<?php
function array_sort($array, $on, $order=SORT_ASC){

$new_array = array();
$sortable_array = array();

if (count($array) > 0) {
	foreach ($array as $k => $v) {
		if (is_array($v)) {
			foreach ($v as $k2 => $v2) {
				if ($k2 == $on) {
					$sortable_array[$k] = $v2;
				}
			}
		
		} 
		else{
			$sortable_array[$k] = $v;
		}
	}

	switch ($order) {
		case SORT_ASC:
			asort($sortable_array);
		break;
		case SORT_DESC:
			arsort($sortable_array);
		break;
	}

	foreach ($sortable_array as $k => $v) {
		$new_array[$k] = $array[$k];
	}
}
return $new_array;
}

function delKey(){
	$k = $_REQUEST['key'];
	$arr = $_REQUEST['arr'];
	//$arr = array_sort($_REQUEST['arr'],'order',SORT_DESC);
	if(isset($k) && is_numeric($k) && isset($arr)){
		foreach($arr as $key=>$val){
			if($val['key']==$k)
			unset($arr[$key]);
		}	
	}

	resetObject($arr);
}

add_action('wp_ajax_delKey','delKey');
add_action('wp_ajax_nopriv_delKey','delKey');

function replaceKey(){
	$k = $_REQUEST['key'];
	$arr = $_REQUEST['arr'];
	$order = $_REQUEST['order'];
	$attach_id = $_REQUEST['attach_id'];
	$status = $_REQUEST['status'];
	if(isset($k) && is_numeric($k) && isset($arr)){
	switch($status){
		case 'order':
		foreach($arr as $key=>$val){
			if($val['key']==$k){
			$repKey=array("order"=>$order);
			$arr[$key]=array_replace($arr[$key],$repKey);			
			}	
		}		
		break;
		case 'attach_id':
		foreach($arr as $key=>$val){
			if($val['key']==$k){
			$repKey=array("attach_id"=>$attach_id);
			$arr[$key]=array_replace($arr[$key],$repKey);			
			}	
		}		
		break;		
	}
	}		

	$arr = array_sort($arr,'order',SORT_ASC);
	resetObject($arr);
}

add_action('wp_ajax_replaceKey','replaceKey');
add_action('wp_ajax_nopriv_replaceKey','replaceKey');

function resetObject($arr){
	$str ='';
	$i=0;
	foreach($arr as $key){
		if($i==0)
		$str.=json_encode($key);
		else
		$str.=','.json_encode($key);
		$i++;
	}
	echo $str;	
	die();	
}
//--------------------------------------------------------------------------------------------------------------------//
function mcpGallery($postId){
	$list_gallery = get_post_meta($postId,'gallery-thumb-id',true);	
	$list_gallery = str_replace('},','};',$list_gallery);
	$_list = explode(';',$list_gallery);
	return $_list;
}
add_action('wp_footer','mcpGallery');
?>
