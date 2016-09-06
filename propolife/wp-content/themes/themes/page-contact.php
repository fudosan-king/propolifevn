<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="effect">
<form data-toggle="validator" role="form" id="contactForm">
<div class="container align-top">
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
<div class="well"><h3 align="center" style="margin-top:0px;line-height:normal;margin-bottom:0px;">WEBからの お問い合わせ</h3></div>
<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" id="fullname" class="form-control" placeholder="お名前（アルファベット）(*)" data-error="Oh, must be input fullname" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
<input type="email" id="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="メールアドレス, name@email.com" data-error="Oh, The value is not a valid email address" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="tel" id="phonenumber" class="form-control" placeholder="電話番号" data-error="Oh, that phone is invalid" >
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<textarea placeholder="ご住所" id="address" class="form-control" required></textarea>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
<div class="form-group has-feedback"><textarea placeholder="お問い合わせ" id="message" class="form-control" style="height:201px;"></textarea></div>
</div>

<div class="col-lg-3"></div>
<div class="col-lg-12" align="center"><input type="submit" name="sendmail" value="送信する" class="btn btn-info"></div>

</div>
</div>
</form>
</div>
<?php get_footer();?>