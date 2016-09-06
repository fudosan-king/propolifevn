<?php get_header();global $lienhe;?>
<body>
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12" align="center">
<div class="title" align="center"><h3 style="text-transform:uppercase"><?php echo $lienhe['tencongty'];?></h3></div>
<dl class="dl-contact-form">
<dt>a: <?php echo $lienhe['diachigmap'];?></dt>
<dd>m: <?php echo $lienhe['hotline'];?></dd>
<dt>e: <?php echo $lienhe['mail'];?></dt>
<dd>w: <?php echo $lienhe['website'];?></dd>
</dl>
</div>
</div>
</div>

<div class="container">
<div class="row show-grid">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-default">
<div class="panel-body">
<div id="map-canvas"></div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 center-block">

<div class="panel panel-default panel-edit">
<div class="panel-heading">Any question, please fill in on the form below.<br>
* Your name and Email is required fill.</div>
<div class="panel-body">
<form data-toggle="validator" role="form" id="contactForm">

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
<input type="tel" id="phonenumber" pattern="[0-9]{10,14}" class="form-control" placeholder="電話番号" data-error="Oh, that phone is invalid" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<textarea placeholder="ご住所" id="address" class="form-control" required></textarea>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<textarea class="form-control" placeholder="Message"></textarea>
</div>

<input type="submit" name="sendmail" value="SEND" class="btn btn-primary">
</form>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="panel panel-primary panel-facebook">
<div class="panel-heading"><div class="panel-title">Facebook</div></div>
<div class="panel-body">Facebook content</div>
</div>
</div>
</div>
</div>

<div class="blockgallery">
<?php get_sidebar('gallery-food-drink');?>
</div>
<?php get_footer();?>