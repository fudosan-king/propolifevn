<?php
function v2e_special($value){
	$value = str_replace("â", "a", $value);	
	$value = str_replace("ấ", "a", $value);
	$value = str_replace("ầ", "a", $value);
	$value = str_replace("ẩ", "a", $value);
	$value = str_replace("ẫ", "a", $value);
	$value = str_replace("ậ", "a", $value);
	#---------------------------------A^

	$value = str_replace("Â", "a", $value);	
	$value = str_replace("Ấ", "a", $value);
	$value = str_replace("Ầ", "a", $value);
	$value = str_replace("Ẩ", "a", $value);
	$value = str_replace("Ẫ", "a", $value);
	$value = str_replace("Ậ", "a", $value);
	#---------------------------------a

	$value = str_replace("á", "a", $value);
	$value = str_replace("à", "a", $value);
	$value = str_replace("ả", "a", $value);
	$value = str_replace("ã", "a", $value);
	$value = str_replace("ạ", "a", $value);
	#---------------------------------A

	$value = str_replace("Á", "a", $value);
	$value = str_replace("À", "a", $value);
	$value = str_replace("Ả", "a", $value);
	$value = str_replace("Ã", "a", $value);
	$value = str_replace("Ạ", "a", $value);
	#---------------------------------a(

	$value = str_replace("ă", "a", $value);	
	$value = str_replace("ắ", "a", $value);
	$value = str_replace("ằ","a", $value);
	$value = str_replace("ẳ", "a", $value);
	$value = str_replace("ẵ","a", $value);
	$value = str_replace("ặ", "a", $value);
	#---------------------------------A(

	$value = str_replace("Ă", "a", $value);
	$value = str_replace("Ắ", "a", $value);
	$value = str_replace("Ằ", "a", $value);
	$value = str_replace("Ẳ", "a", $value);
	$value = str_replace("Ẵ", "a", $value);
	$value = str_replace("Ặ", "a", $value);
	$value = str_replace("Ă", "a", $value);
	#---------------------------------e^

	$value = str_replace("ê", "e", $value);	
	$value = str_replace("ế", "e", $value);
	$value = str_replace("ề", "e", $value);
	$value = str_replace("ể", "e", $value);
	$value = str_replace("ễ", "e", $value);
	$value = str_replace("ệ", "e", $value);
	#---------------------------------E^

	$value = str_replace("Ê", "e", $value);	
	$value = str_replace("Ế", "e", $value);
	$value = str_replace("Ề", "e", $value);
	$value = str_replace("Ể", "e", $value);
	$value = str_replace("Ễ", "e", $value);
	$value = str_replace("Ệ", "e", $value);
	#---------------------------------e

	$value = str_replace("é","e", $value);
	$value = str_replace("è", "e", $value);
	$value = str_replace("ẻ", "e", $value);
	$value = str_replace("ẽ", "e", $value);
	$value = str_replace("ẹ", "e", $value);
	#---------------------------------E

	$value = str_replace("É", "e", $value);
	$value = str_replace("È", "e", $value);
	$value = str_replace("Ẻ", "e", $value);
	$value = str_replace("Ẽ", "e", $value);
	$value = str_replace("Ẹ", "e", $value);
	#---------------------------------i

	$value = str_replace("í", "i", $value);
	$value = str_replace("ì", "i", $value);
	$value = str_replace("ỉ", "i", $value);
	$value = str_replace("ĩ", "i", $value);
	$value = str_replace("ị", "i", $value);
	#---------------------------------I

	$value = str_replace("Í", "i", $value);
	$value = str_replace("Í", "i", $value);
	$value = str_replace("Ỉ", "i", $value);
	$value = str_replace("Ĩ", "i", $value);
	$value = str_replace("Ị", "i", $value);
	#---------------------------------o^

	$value = str_replace("ô", "o", $value);	
	$value = str_replace("ố", "o", $value);
	$value = str_replace("ồ", "o", $value);
	$value = str_replace("ổ", "o", $value);
	$value = str_replace("ỗ", "o", $value);
	$value = str_replace("ộ", "o", $value);
	#---------------------------------O^

	$value = str_replace("Ô", "o", $value);	
	$value = str_replace("Ố", "o", $value);
	$value = str_replace("Ồ", "o", $value);
	$value = str_replace("Ổ", "o", $value);
	$value = str_replace("Ỗ", "o", $value);
	$value = str_replace("Ộ", "o", $value);
	#---------------------------------o*

	$value = str_replace("ơ", "o", $value);	
	$value = str_replace("ớ", "o", $value);
	$value = str_replace("ờ", "o", $value);
	$value = str_replace("ở", "o", $value);
	$value = str_replace("ỡ", "o", $value);
	$value = str_replace("ợ", "o", $value);
	#---------------------------------O*

	$value = str_replace("Ơ", "o", $value);	
	$value = str_replace("Ớ", "o", $value);
	$value = str_replace("Ờ", "o", $value);
	$value = str_replace("Ở", "o", $value);
	$value = str_replace("Ỡ", "o", $value);
	$value = str_replace("Ợ", "o", $value);
	#---------------------------------u*

	$value = str_replace("ư", "u", $value);	
	$value = str_replace("ứ", "u", $value);
	$value = str_replace("ừ", "u", $value);
	$value = str_replace("ử", "u", $value);
	$value = str_replace("ữ", "u", $value);
	$value = str_replace("ự", "u", $value);
	#---------------------------------U*

	$value = str_replace("Ư", "u", $value);	
	$value = str_replace("Ứ", "u", $value);
	$value = str_replace("Ừ", "u", $value);
	$value = str_replace("Ử", "u", $value);
	$value = str_replace("Ữ", "u", $value);
	$value = str_replace("Ự", "u", $value);
	#---------------------------------y

	$value = str_replace("ý", "y", $value);
	$value = str_replace("ỳ", "y", $value);
	$value = str_replace("ỷ", "y", $value);
	$value = str_replace("ỹ", "y", $value);
	$value = str_replace("ỵ", "y", $value);
	#---------------------------------Y

	$value = str_replace("Ý", "y", $value);
	$value = str_replace("Ỳ", "y", $value);
	$value = str_replace("Ỷ", "y", $value);
	$value = str_replace("Ỹ", "y", $value);
	$value = str_replace("Ỵ", "y", $value);
	#---------------------------------DD

	$value = str_replace("Đ", "d", $value);		
	$value = str_replace("đ", "d", $value);
	#---------------------------------o

	$value = str_replace("ó", "o", $value);
	$value = str_replace("ò", "o", $value);
	$value = str_replace("ỏ", "o", $value);
	$value = str_replace("õ", "o", $value);
	$value = str_replace("ọ", "o", $value);
	#---------------------------------O

	$value = str_replace("Ó", "o", $value);
	$value = str_replace("Ò", "o", $value);
	$value = str_replace("Ỏ", "o", $value);
	$value = str_replace("Õ", "o", $value);
	$value = str_replace("Ọ", "o", $value);
	#---------------------------------u

	$value = str_replace("ú", "u", $value);
	$value = str_replace("ù", "u", $value);
	$value = str_replace("ủ", "u", $value);
	$value = str_replace("ũ", "u", $value);
	$value = str_replace("ụ", "u", $value);
	#---------------------------------U

	$value = str_replace("Ú", "u", $value);
	$value = str_replace("Ù", "u", $value);
	$value = str_replace("Ủ", "u", $value);
	$value = str_replace("Ũ", "u", $value);
	$value = str_replace("Ụ", "u", $value);
	#---------------------------------

	return $value;
}

function v2e($value){
	#---------------------------------SPECIAL	
	$value = str_replace("&quot;","", $value);	
	$value = str_replace(".","", $value);
	$value = str_replace("=","", $value);
	$value = str_replace("+","", $value);
	$value = str_replace("!","", $value);
	$value = str_replace("@","", $value);
	$value = str_replace("#","", $value);
	$value = str_replace("$","", $value);
	$value = str_replace("%","", $value);	
	$value = str_replace("^","", $value);	
	$value = str_replace("&","", $value);	
	$value = str_replace("*","", $value);	
	$value = str_replace("(","", $value);	
	$value = str_replace(")","", $value);	
	$value = str_replace("`","", $value);	
	$value = str_replace("~","", $value);	
	$value = str_replace(",","", $value);
	$value = str_replace("/","", $value);	
	$value = str_replace("\\","", $value);	
	$value = str_replace('"',"", $value);	
	$value = str_replace("'","", $value);	
	$value = str_replace(":","", $value);	
	$value = str_replace(";","", $value);	
	$value = str_replace("|","", $value);	
	$value = str_replace("[","", $value);	
	$value = str_replace("]","", $value);	
	$value = str_replace("{","", $value);	
	$value = str_replace("}","", $value);	
	$value = str_replace("(","", $value);	
	$value = str_replace(")","", $value);		
	$value = str_replace("?","", $value);
	#---------------------------------a^

	$value = str_replace("â", "a", $value);	
	$value = str_replace("ấ", "a", $value);
	$value = str_replace("ầ", "a", $value);
	$value = str_replace("ẩ", "a", $value);
	$value = str_replace("ẫ", "a", $value);
	$value = str_replace("ậ", "a", $value);
	#---------------------------------A^

	$value = str_replace("Â", "a", $value);	
	$value = str_replace("Ấ", "a", $value);
	$value = str_replace("Ầ", "a", $value);
	$value = str_replace("Ẩ", "a", $value);
	$value = str_replace("Ẫ", "a", $value);
	$value = str_replace("Ậ", "a", $value);
	#---------------------------------a

	$value = str_replace("á", "a", $value);
	$value = str_replace("à", "a", $value);
	$value = str_replace("ả", "a", $value);
	$value = str_replace("ã", "a", $value);
	$value = str_replace("ạ", "a", $value);
	#---------------------------------A

	$value = str_replace("Á", "a", $value);
	$value = str_replace("À", "a", $value);
	$value = str_replace("Ả", "a", $value);
	$value = str_replace("Ã", "a", $value);
	$value = str_replace("Ạ", "a", $value);
	#---------------------------------a(

	$value = str_replace("ă", "a", $value);	
	$value = str_replace("ắ", "a", $value);
	$value = str_replace("ằ","a", $value);
	$value = str_replace("ẳ", "a", $value);
	$value = str_replace("ẵ","a", $value);
	$value = str_replace("ặ", "a", $value);
	#---------------------------------A(

	$value = str_replace("Ă", "a", $value);
	$value = str_replace("Ắ", "a", $value);
	$value = str_replace("Ằ", "a", $value);
	$value = str_replace("Ẳ", "a", $value);
	$value = str_replace("Ẵ", "a", $value);
	$value = str_replace("Ặ", "a", $value);
	$value = str_replace("Ă", "a", $value);
	#---------------------------------e^

	$value = str_replace("ê", "e", $value);	
	$value = str_replace("ế", "e", $value);
	$value = str_replace("ề", "e", $value);
	$value = str_replace("ể", "e", $value);
	$value = str_replace("ễ", "e", $value);
	$value = str_replace("ệ", "e", $value);
	#---------------------------------E^

	$value = str_replace("Ê", "e", $value);	
	$value = str_replace("Ế", "e", $value);
	$value = str_replace("Ề", "e", $value);
	$value = str_replace("Ể", "e", $value);
	$value = str_replace("Ễ", "e", $value);
	$value = str_replace("Ệ", "e", $value);
	#---------------------------------e

	$value = str_replace("é","e", $value);
	$value = str_replace("è", "e", $value);
	$value = str_replace("ẻ", "e", $value);
	$value = str_replace("ẽ", "e", $value);
	$value = str_replace("ẹ", "e", $value);
	#---------------------------------E

	$value = str_replace("É", "e", $value);
	$value = str_replace("È", "e", $value);
	$value = str_replace("Ẻ", "e", $value);
	$value = str_replace("Ẽ", "e", $value);
	$value = str_replace("Ẹ", "e", $value);
	#---------------------------------i

	$value = str_replace("í", "i", $value);
	$value = str_replace("ì", "i", $value);
	$value = str_replace("ỉ", "i", $value);
	$value = str_replace("ĩ", "i", $value);
	$value = str_replace("ị", "i", $value);
	#---------------------------------I

	$value = str_replace("Í", "i", $value);
	$value = str_replace("Í", "i", $value);
	$value = str_replace("Ỉ", "i", $value);
	$value = str_replace("Ĩ", "i", $value);
	$value = str_replace("Ị", "i", $value);
	#---------------------------------o^

	$value = str_replace("ô", "o", $value);	
	$value = str_replace("ố", "o", $value);
	$value = str_replace("ồ", "o", $value);
	$value = str_replace("ổ", "o", $value);
	$value = str_replace("ỗ", "o", $value);
	$value = str_replace("ộ", "o", $value);
	#---------------------------------O^

	$value = str_replace("Ô", "o", $value);	
	$value = str_replace("Ố", "o", $value);
	$value = str_replace("Ồ", "o", $value);
	$value = str_replace("Ổ", "o", $value);
	$value = str_replace("Ỗ", "o", $value);
	$value = str_replace("Ộ", "o", $value);
	#---------------------------------o*

	$value = str_replace("ơ", "o", $value);	
	$value = str_replace("ớ", "o", $value);
	$value = str_replace("ờ", "o", $value);
	$value = str_replace("ở", "o", $value);
	$value = str_replace("ỡ", "o", $value);
	$value = str_replace("ợ", "o", $value);
	#---------------------------------O*

	$value = str_replace("Ơ", "o", $value);	
	$value = str_replace("Ớ", "o", $value);
	$value = str_replace("Ờ", "o", $value);
	$value = str_replace("Ở", "o", $value);
	$value = str_replace("Ỡ", "o", $value);
	$value = str_replace("Ợ", "o", $value);
	#---------------------------------u*

	$value = str_replace("ư", "u", $value);	
	$value = str_replace("ứ", "u", $value);
	$value = str_replace("ừ", "u", $value);
	$value = str_replace("ử", "u", $value);
	$value = str_replace("ữ", "u", $value);
	$value = str_replace("ự", "u", $value);
	#---------------------------------U*

	$value = str_replace("Ư", "u", $value);	
	$value = str_replace("Ứ", "u", $value);
	$value = str_replace("Ừ", "u", $value);
	$value = str_replace("Ử", "u", $value);
	$value = str_replace("Ữ", "u", $value);
	$value = str_replace("Ự", "u", $value);
	#---------------------------------y

	$value = str_replace("ý", "y", $value);
	$value = str_replace("ỳ", "y", $value);
	$value = str_replace("ỷ", "y", $value);
	$value = str_replace("ỹ", "y", $value);
	$value = str_replace("ỵ", "y", $value);
	#---------------------------------Y

	$value = str_replace("Ý", "y", $value);
	$value = str_replace("Ỳ", "y", $value);
	$value = str_replace("Ỷ", "y", $value);
	$value = str_replace("Ỹ", "y", $value);
	$value = str_replace("Ỵ", "y", $value);
	#---------------------------------DD

	$value = str_replace("Đ", "d", $value);		
	$value = str_replace("đ", "d", $value);
	#---------------------------------o

	$value = str_replace("ó", "o", $value);
	$value = str_replace("ò", "o", $value);
	$value = str_replace("ỏ", "o", $value);
	$value = str_replace("õ", "o", $value);
	$value = str_replace("ọ", "o", $value);
	#---------------------------------O

	$value = str_replace("Ó", "o", $value);
	$value = str_replace("Ò", "o", $value);
	$value = str_replace("Ỏ", "o", $value);
	$value = str_replace("Õ", "o", $value);
	$value = str_replace("Ọ", "o", $value);
	#---------------------------------u

	$value = str_replace("ú", "u", $value);
	$value = str_replace("ù", "u", $value);
	$value = str_replace("ủ", "u", $value);
	$value = str_replace("ũ", "u", $value);
	$value = str_replace("ụ", "u", $value);
	#---------------------------------U

	$value = str_replace("Ú", "u", $value);
	$value = str_replace("Ù", "u", $value);
	$value = str_replace("Ủ", "u", $value);
	$value = str_replace("Ũ", "u", $value);
	$value = str_replace("Ụ", "u", $value);
	#---------------------------------

	return $value;
}

if ( ! function_exists('SEO')){	
	function SEO($name='') {
		$name = v2e($name);
		$name = preg_replace("/[^a-z,A-Z,0-9,_,-]/", "-", $name);
		$name = str_replace("---", "-", $name);
		$name = str_replace("--", "-", $name);		
		return strtolower($name);
	}
}

if ( ! function_exists('random_string')){
	function random_string($length = 4)
	{
		$sWord = '';
		$sChars = 'abcdefghjklmnprtwyzABCDEFGHJKLMNPRTWXYZ1234567890';		
		for ($i = 1; $i <= $length; $i++)
		{
			$nNumber = rand(1, strlen($sChars));
			$sWord .= substr($sChars, $nNumber - 1, 1);
	 	}
	 	return $sWord;
	}
}

if ( ! function_exists('last_query'))
{
	function last_query($exit=false)
	{
		$CI =& get_instance();
		echo $CI ->db->last_query();
		if($exit){
			exit();
		}
	}
}

if ( ! function_exists('pr')){
	function pr($data,$type=0)
	{
		print '<pre>';
		print_r($data);
		print '</pre>';
		if($type!=0){
			exit();
		}
	}
}

if ( ! function_exists('CutText')){
	function CutText($text, $n=80) 
	{ 
		// string is shorter than n, return as is
		if (strlen($text) <= $n) {
			return $text;}
		$text= substr($text, 0, $n);
		if ($text[$n-1] == ' ') {
			return trim($text)."...";
		}
		$x  = explode(" ", $text);
		$sz = sizeof($x);
		if ($sz <= 1)   {
			return $text."...";}
		$x[$sz-1] = '';
		return trim(implode(" ", $x))."...";
	}
}

if ( ! function_exists('CutTextNew')){
	function CutTextNew($text, $n=70) 
	{ 
		$string = strlen($text);
        if($string<=$n){
            echo $text; 
        }
        else{
            echo mb_substr($text, 0, $n, 'utf-8') . '...';
        }
	}
}

function getIP(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getImage($src,$maxw=0,$maxh=0){
	$size= getimagesize(BASEFOLDER.$src);
	$w = $size[0];
	
	if($maxw!=0){
		if($maxw>$w){
			return '<img alt="" src="'.PATH_URL_IMAGES.$src.'" />';
		}else{
			return '<img alt="" width="'.$maxw.'" src="'.PATH_URL_IMAGES.$src.'" />';
		}
	}
	
	if($maxh!=0){
		if($maxh>$h){
			return '<img alt="" src="'.PATH_URL_IMAGES.$src.'" />';
		}else{
			return '<img alt="" width="'.$maxh.'" src="'.PATH_URL_IMAGES.$src.'" />';
		}
	}
}

function parserEditorHTML($str){
	/*$str = str_replace('../../../static/uploads/editor/', PATH_URL_IMAGES.'static/uploads/editor/', $str);
	$str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)&amp;feature=([A-Za-z0-9]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);
	$str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);*/
	$str = str_replace('../../../static/uploads/editor/', PATH_URL_IMAGES.'static/uploads/editor/', $str);
	//$str = preg_replace('/<table(.*?)>(.*?)<\/table>/i',"<div class='table-responsive'><table$1>$2</table></div>",$str);
	//$str = preg_replace('/<div class=\'table-responsive\'><table style="border-collapse: collapse;"(.*?)>(.*?)<\/table><\/div>/i',"<div class='table-responsive'><table style=\"border-collapse: collapse;width:100%\"$1>$2</table></div>",$str);
	return $str;
}

function captcha(){
	//Set the image width and height
	$width = 80;
	$height = 40;

	//Create the image resource
	$image = ImageCreate($width, $height);

	//We are making three colors, white, black and gray
	$white = ImageColorAllocate($image, 255, 255, 255);
	$black = ImageColorAllocate($image, 0, 0, 0);
	$grey = ImageColorAllocate($image, 204, 204, 204);

	$security_code = random_string(6);
	session_start();
	$_SESSION['codeCaptcha'] = $security_code;
	
	//Make the background black 
	ImageFill($image, 0, 0, $black);

	//Add randomly generated string in white to the image
	ImageString($image, 20, 15, 12, $security_code, $white);

	//Throw in some lines to make it a little bit harder for any bots to break 
	ImageRectangle($image,0,0,$width-1,$height-1,$grey);
	//imageline($image, 0, $height/2, $width, $height/2, $grey);
	//imageline($image, $width/2, 0, $width/2, $height, $grey);

	//Tell the browser what kind of file is come in 
	header("Content-Type: image/jpeg");

	//Output the newly created image in jpeg format 
	ImageJpeg($image);

	//Free up resources
	ImageDestroy($image);
}

function url_login_openid($type='google'){
	if($type=='google'){
		$params = array(
			'response_type'            => 'token',
			'client_id'                => G_CLIENT_ID,
			'redirect_uri'             => G_REDIRECT_URL,
			'state'                    => 'profile',
			'scope'                    => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile https://www.google.com/m8/feeds'
		);
		
		$url = 'https://accounts.google.com/o/oauth2/auth?';
		foreach($params as $key=>$param){
			$url .= $key.'='.urlencode($param).'&';
		}
	}
	if($type=='yahoo'){
		$params = array(
			'openid.ns'                => 'http://specs.openid.net/auth/2.0',
			'openid.mode'              => 'checkid_setup',
			'openid.claimed_id'        => 'http://specs.openid.net/auth/2.0/identifier_select',
			'openid.identity'          => 'http://specs.openid.net/auth/2.0/identifier_select',
			'openid.assoc_handle'      => 'profile',
			'openid.return_to'         => G_REDIRECT_URL,
			'openid.realm'             => 'http://wst-group.no-ip.info',
			'openid.ns.oauth'          => 'http://specs.openid.net/extensions/oauth/1.0',
			'openid.oauth.consumer'    => 'dj0yJmk9OUlxYUw4T2tZc3JXJmQ9WVdrOVVqbG1VbTlFTTJVbWNHbzlNVFE0TnpZeU5qazJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD1hOA--',
		);
		
		$url = 'https://open.login.yahooapis.com/openid/op/auth?';
		foreach($params as $key=>$param){
			$url .= $key.'='.urlencode($param).'&';
		}
	}
	return $url;
}

function logout_openid($type='google'){
	if($type=='google'){
		include('application/libraries/eac_curl.class.php');
		$options = array();
		$options['CURLOPT_AUTOREFERER']    = 1;
		$options['CURLOPT_CRLF']           = 1;
		$options['CURLOPT_NOPROGRESS']     = 1;
		$http = new cURL($options);
		$http->setOptions($options);
		$src = $http->get("https://mail.google.com/mail/u/0/?logout&hl=en");
	}
}

function get_attr_profile_openid($type='google'){
	session_start();
	if($type=='google'){
		include('application/libraries/eac_curl.class.php');
		$options = array();
		$options['CURLOPT_AUTOREFERER']    = 1;
		$options['CURLOPT_CRLF']           = 1;
		$options['CURLOPT_NOPROGRESS']     = 1;
		$http = new cURL($options);
		$http->setOptions($options);
		$src = $http->get("https://www.googleapis.com/oauth2/v1/userinfo?access_token=".$_GET['access_token']);
		$contact = $http->get("https://www.google.com/m8/feeds/contacts/default/full?max-results=5000&oauth_token=".$_GET['access_token']);
		$xml =  new SimpleXMLElement($contact);
		$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
		$result = $xml->xpath('//gd:email');

		$profile = json_decode($src);
		if(isset($profile->id)){
			$info['id'] = $profile->id;
		}else{
			$info['id'] = '';
		}
		if($profile->email){
			$info['email'] = $profile->email;
		}else{
			$info['email'] = '';
		}
		if($profile->verified_email){
			$info['verified_email'] = $profile->verified_email;
		}else{
			$info['verified_email'] = '';
		}
		if($profile->name){
			$info['full_name'] = $profile->name;
		}else{
			$info['full_name'] = '';
		}
		if($profile->given_name){
			$info['f_name'] = $profile->given_name;
		}else{
			$info['f_name'] = '';
		}
		if($profile->family_name){
			$info['l_name'] = $profile->family_name;
		}else{
			$info['l_name'] = '';
		}
		if(isset($profile->picture)){
			$info['avatar'] = $profile->picture;
		}else{
			$info['avatar'] = '';
		}
		if(isset($profile->locale)){
			$info['locale'] = $profile->locale;
		}else{
			$info['locale'] = '';
		}
		if(isset($profile->timezone)){
			$info['timezone'] = $profile->timezone;
		}else{
			$info['timezone'] = '';
		}
		if(isset($profile->gender)){
			$info['gender'] = $profile->gender;
		}else{
			$info['gender'] = '';
		}
		foreach ($result as $title) {
			$info['contact'][] = $title->attributes()->address;
			//echo $title->attributes()->address."<br>";
		}
	}
	return $info;
}

if( ! function_exists('check_permission'))
{
	function check_permission($action = "",$module = '')
	{
		$CI =&get_instance();
		$permission = $CI->session->userdata("userPer");
		//pr($permission,1);
		$listMod = array();
		$listPer = array();
		if(!empty($permission))
		{
			foreach($permission as $per)
			{
				if(isset($per->child_list))
				{
					$listMod[$per->name] = $per->child_list;
				}
			}
		}
		
		if(array_key_exists($module,$listMod))
		{
			if($action != '')
			{
				$listPer = $listMod[$module];
				if(!empty($listPer))
				{
					foreach($listPer as $per)
					{
						if($action == $per->name)
						{
							return true;
						}
					}
				}
				return false;
			}
			return true;
		}
		return false;
	}
}

function getNow()
{
	return date("Y-m-d H:i:s");
}

function getSetting($key='') {
    $CI = &get_instance();
    $result = '';
    if($key == '') {
        $CI->db->select('*');
        $CI->db->where('status', 1);
        $query = $CI->db->get(PREFIX . 'setting');
        $result = $query->result();
    }else {
        $CI->db->select('*');
        $CI->db->where('status', 1);
        $CI->db->where('key', $key);
        $query = $CI->db->get(PREFIX . 'setting');
        $result = $query->row();
    }
    return $result;
}

function headerSeo($seo = array(), $seoGoogle = array())
{
    $CI = &get_instance();
    
    $meta_string = '';
    $meta = getSetting();
    $data = array(
        array(
            'key' => 'http-equiv="Content-Type"',
            'value' => 'text/html; charset=utf-8'
        ),
        array(
            'key' => 'name="description"',
            'value' => ''
        ),
        array(
            'key' => 'name="keywords"',
            'value' => ''
        ),
        array(
            'key' => 'name="robots"',
            'value' => 'content="INDEX,FOLLOW"'
        )
    );
    
    if(empty($seo)) {
        $seo = array(
            'image' =>'',
            'title' => '',
            'description' => '',
            'url' => ''
        );
    }
    foreach($seo as $key=>$value) {
        if($seo[$key] != '') {
            $meta_string .= '<meta property="og:'.$key.'" content="'.$value.'" />';
        }else{
            $meta_string .= '<meta property="og:'.$key.'" content="'.$CI->config->item($key).'" />';
        }
    }

    $meta_arr = array();
    foreach($meta as $item) {
        
        if($item->key == 'name="keywords"' && !empty($seoGoogle) && isset($seoGoogle['keyword'])){
            $meta_arr[$item->key] = 'content="' . $seoGoogle['keyword'] . '"';
        }else{
            $meta_arr[$item->key] = $item->value;
        }
    }
    
    
    foreach($seo as $key=>$item) {
        if($key == 'description'){
            $meta_arr['name="description"'] = 'content="' . $item . '"';
        }else{
            //$meta_arr['name="description"'] = 'content="' . $CI->config->item('description') . '"';
        }
        if($key == 'keywords'){
            $meta_arr['name="keywords"'] = 'content="' . $item . '"';
        }
    }  
    foreach($data as $item) {
        if(isset($meta_arr[$item['key']])) {
            $meta_string .= '<meta '.$item['key']. ' ' . $meta_arr[$item['key']].' />';
            
        }
        
    }
    $CI->template->write('meta',$meta_string);
    
    $seo_title_site = '';
    if(isset($seoGoogle['title']) && $seoGoogle['title'] != ""){          
        $seo_title_site = $seoGoogle['title'];
    }elseif(isset($seo['title']) && $seo['title'] != ''){
        $seo_title_site = $seo['title'];
    }
    
    if($seo_title_site == '') {
        $CI->template->write('title', $meta_arr['title'], true);
    }else{
        $CI->template->write('title',$seo_title_site, true);
    }
}

function getToolbar($module, $items = array()) {
    $CI = &get_instance();
    $module =  $CI->router->fetch_class();
    $toolbar = array(
        'addNew' => '<li><a href="' . PATH_URL.'admincp/'.$module.'/update/"><span class="add_new">Add new</span></a></li>',
        'show' => '<li><a href="javascript:void(0)" onclick="showStatusAll()"><span class="show_items">Show</span></a></li>',
        'hide' => '<li><a href="javascript:void(0)" onclick="hideStatusAll()"><span class="hide_items">Hide</span></a></li>',
        'delete' => '<li class="midNav_last_child"><a href="javascript:void(0)" onclick="deleteAll()"><span class="delete_items">Delete</span></a></li>',
        'back' => '<li><a href="' . PATH_URL.'admincp/'.$module.'"><span class="back">Back</span></a></li>',
        'save' => '<li class="midNav_last_child"><a href="javascript:void(0)" onclick="save()"><span class="save">Save</span></a></li>',
        'edit' => '<li class=""><a href="popup"  id="link_popup" class="iframe1" target="_blank"><span class="edit">Edit</span></a></li>'
    );
    $listToolbar = '';
    foreach($items as $item) {
        $listToolbar .= $toolbar[$item];
    }
    
    if($CI->session->userdata('userInfo')){
        $CI->template->write('toolbar',$listToolbar);
    }
    
}

function sendEmail($emailTo, $emailToName, $fromEmail, $fromName, $subject, $body, $bcc_list = array(), $cc_list = array(), $to_list = array())
{
    $CI =& get_instance();
    $CI->load->library('phpmailer');
    $CI->load->helper('email');
    $mail = new PHPMailer();
    
    $mail->IsSMTP(); 												// Gọi đến class xử lý SMTP
    $mail->Host       = "mail.aozaihousing.sakura.ne.jp"; 			// tên SMTP server
    $mail->SMTPDebug  = false; 										// enables SMTP debug information (for testing)
                                               						// 1 = errors and messages
                                               						// 2 = messages only
    $mail->SMTPAuth   = true;                  						// Sử dụng đăng nhập vào account
    //$mail->Host       = "mail.aozaihousing.sakura.ne.jp";         // Thiết lập thông tin của SMPT
    $mail->Port       = 587;                    					// Thiết lập cổng gửi email của máy
    $mail->Username   = "tandat@aozaihousing.sakura.ne.jp";         // SMTP account username
    $mail->Password   = "tandat86";                					// SMTP account password
    $mail->SMTPSecure = ""; 
    
    //Thiet lap thong tin nguoi gui va email nguoi gui
    $mail->SetFrom($emailTo, $emailToName);
    
    //Thiết lập thông tin người nhận
    $mail->AddAddress($fromEmail, $fromName);

    //Thiet lap email to
    if($to_list) {
        foreach($to_list as $item) {
        	if (valid_email($item['email'])) {
            	$mail->AddAddress($item['email'], $item['name']);
        	}
        }
    }

    // Reply
    $mail->AddReplyTo($emailTo, $emailToName);
    
    //Thiet lap email bcc
    if($bcc_list) {
        foreach($bcc_list as $item) {
        	if (valid_email($item['email'])) {
            	$mail->AddBCC($item['email'], $item['name']);
            }
        }
    }

    //Thiet lap email cc
    if($cc_list) {
        foreach($cc_list as $item) {
        	if (valid_email($item['email'])) {
            	$mail->AddCC($item['email'], $item['name']);
            }
        }
    }

    /*=====================================
     * THIET LAP NOI DUNG EMAIL
     *=====================================*/
    
    //Thiết lập tiêu đề
    $mail->Subject = $subject;
    
    //Thiết lập định dạng font chữ
    $mail->CharSet = "utf-8";
    
    //Thiết lập nội dung chính của email
    $mail->MsgHTML($body);
    
    if(!$mail->Send()) {
      //echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      //echo "Message sent!";
    }
}

function checkPermission(){
    $CI =& get_instance();
    $id  = $CI->session->userdata('type');
    if($id == 1){
        return 1;
    }else{
        return 0;
    }
}

/*=============muti language===================*/
function config($item = '')
{
    $CI =& get_instance();
    return $CI->config->item($item);
}

function vcp_printf($string = "", $lang='ja', $replace = array()){
    $return = "";
    
    if($string == ""){
        $return = "";
    }else{
        $tmp = json_decode($string);
        if($tmp == '') {
            $return = $string;
        }else{
            $return = isset($tmp->$lang)? $tmp->$lang: $string;
        }
    }
	$return = parserEditorHTML($return);
    if(!empty($replace)){
        foreach($replace as $key=>$item){
            $return = str_replace($item, $key,$return);
        }
    }
    return $return;
}

function change_lang($lang = '')
{
    $switchs = config('routes');
    $vn = array();
    $ja = array();
    
	$uris = uri_string();
	$uris = explode('/', trim(trim(trim(uri_string()), '/'), '/'));
	$result_uris = '';
	foreach($uris as $uri)
	{
		if(trim(strtolower($uri)) != 'vn' && trim(strtolower($uri)) != 'jp' && trim(strtolower($uri)) != 'ch' && trim(strtolower($uri)) != '')
		{
			$result_uris .= $uri.'/';
		}
	}
    if($lang == 'vn')
    {
        $tmp = $vn;
        $vn = $ja;
        $ja = $tmp;
    }
    $result_uris = str_ireplace($vn, $ja, trim($result_uris));
    
    if($lang != '')
    {
        $url = base_url().$lang.'/'.trim($result_uris, '/');
    }else{
        $url = base_url().trim($result_uris, '/');
            
    }
        
    if(isset($_SERVER['REDIRECT_QUERY_STRING']) && $_SERVER['REDIRECT_QUERY_STRING'] != '') {
        $url = $url . '?' . $_SERVER['REDIRECT_QUERY_STRING'];
    }
	return $url;

}

function current_lang() {
    $CI =& get_instance();
    $lang = $CI->uri->segment(1);
    if($lang == 'vn') {
        return 'vn';
    } 
    return '';
}

function current_lang_() {
    $CI =& get_instance();
    $lang = $CI->uri->segment(1);
    if($lang == 'vn') {
        return 'vn';
    }
    
    return 'jp';
}

function create_url($url = '')
{
    $CI =& get_instance();
    $language = $CI->uri->segment(1);
	//$language = (count(config('language_code')) > 1)?LANGUAGE:'';
    if($language == 'jp' || $language == 'vn'){
        
    }else{
        $language = '';
    }
	return PATH_URL .((trim($language) != '')?($language.'/'):'').trim(trim($url), '/');
}

function change_language($jp_lang = '', $vn_lang = ''){
    if(current_lang_() == 'jp'){
        echo $jp_lang;
    }elseif(current_lang_() == 'vn'){
        echo $vn_lang;
    }
}


function mobile_template()
{
    $CI =& get_instance();
    $CI->load->library('mobiles');
    $deviceType = ($CI->mobiles->isMobile() ? ($CI->mobiles->isTablet() ? 'tablet' : 'phone') : 'computer');

    if ($deviceType == 'computer') {
        $CI->template->set_template('default');
        return 'pc';
    } else {
        $CI->template->set_template('mobile');
        return 'mobile';
    }
}

function getDomainName() {
    return DOMAIN_NEW;
}

function getNewDomain() {
    $http_https = '';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $http_https = 'https://';
    } else {
        $http_https = 'http://';
    }
    return $http_https . getDomainName();
}

function redirectNewDomain($url) {
    if (isUseRedirect() == true) {
    	$url = str_replace('&' . IS_REDIRECT_PAGE, '', $url);
    	$url = str_replace('?' . IS_REDIRECT_PAGE, '', $url);
        redirect(getNewDomain() . $url);
    }
}

function isUseRedirect() {
    return true;
}

function get_the_current_url() {
    $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
    return $complete_url;
}

function get_url_redirect() {
	$url = get_the_current_url();
    $url_old = explode('?',$url);
    
    if (isset($url_old[1])) {
        $url .= '&' . IS_REDIRECT_PAGE;
    } else {
        $url .= '?' . IS_REDIRECT_PAGE;
    }
    return $url;
}

function get_current_controller() {
	$CI =& get_instance();
	return $CI->router->fetch_class();
}

function get_current_method() {
	$CI =& get_instance();
	return $CI->router->fetch_method();
}

function searchValueInArray($data, $field, $value) {
   	foreach($data as $key => $item) {
  		if ( $item[$field] === $value ) {
        	return $key;
  		}
   	}
   	return false;
}

function fn_type_email($type = '') {
	$type_email = array(
		'to' => 'TO',
		'cc' => 'CC',
		'bcc' => 'BCC'
	);
	if (array_key_exists($type, $type_email)) {
		return $type_email[$type];
	}
	return $type_email;
}

?>