<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="effect">

<div align="center" class="align-top">
<?php
//http://localhost/propolife/receive-e-mail.html?cG9zdD01NjcmYWN0aW9uPTE=
$str = base64_encode('post=567&action=1');
$arr = explode("&", base64_decode($_SERVER['QUERY_STRING']));
$p = substr($arr[0],5);
$a=substr($arr[1],-1,1);
$status = get_post_meta($p,'actived',true);

if($a==1){
if($status==''){wp_publish_post($p);update_post_meta($p,'actived',$a);$result=alertDialog(11);echo $result;}
elseif($status==1){$result=alertDialog(11);echo $result;}
}
elseif($a!=1){$result=alertDialog(7);echo $result;}

?>
</div>

<form data-toggle="validator" role="form" id="receiveEmailForm">
<div class="container align-top">
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
<input type="email" id="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="メールアドレス, name@email.com" data-error="Oh, The value is not a valid email address" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
</div>

<div class="col-lg-3"></div>
<div class="col-lg-12" align="center"><input type="submit" name="receivemail" value="送信する" class="btn btn-info"></div>

</div>
</div>
</form>
</div>
<?php get_footer();?>