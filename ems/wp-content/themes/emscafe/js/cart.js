var xmlhttp;
var xmlhttp1;
function GetXmlHttpObject(){
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject){
		// code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function ajax_add_list_cart($postid,$pageid){
	xmlhttp=GetXmlHttpObject();
	var $soluong=document.getElementById("soluong").value;
	if($soluong=='' || $soluong==0){$soluong=1;}
	var url ="?page_id="+$pageid+"&active="+$postid+"&soluong="+$soluong;	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("block-cart").innerHTML =xmlhttp.responseText;			
		}
	}
		
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);	
}
function ajax_remove_cart($page1id,$page2id,$postid){
	xmlhttp=GetXmlHttpObject();	
	xmlhttp1=GetXmlHttpObject();	
	var url ="?page_id="+$page1id+"&remove="+$postid;
	var url1 ="?page_id="+$page2id;
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("totalcart").innerHTML =xmlhttp.responseText;
		}
	}
	
	xmlhttp1.onreadystatechange = function()	{
		if(xmlhttp1.readyState == 4 && xmlhttp1.status == 200){
			document.getElementById("block-cart").innerHTML =xmlhttp1.responseText;
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
	xmlhttp1.open("GET", url1, true);
	xmlhttp1.send(null);
	$("#giohang_"+$postid).fadeOut(400);
}
function plus_num_cart($postid,$pageid){
	$num=document.getElementById("numcount_"+$postid).value;
	$num++;
	document.getElementById("numcount_"+$postid).value = $num;
	xmlhttp=GetXmlHttpObject();
	var url ="?page_id="+$pageid+"&plus="+$postid+"&number="+$num;
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("totalcart").innerHTML =xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}
function des_num_cart($postid,$pageid){
	$num=document.getElementById("numcount_"+$postid).value;
	if($num >1){
	$num--;
	}
	document.getElementById("numcount_"+$postid).value = $num;
	xmlhttp=GetXmlHttpObject();
	var url ="?page_id="+$pageid+"&plus="+$postid+"&number="+$num;
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("totalcart").innerHTML = 	xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}