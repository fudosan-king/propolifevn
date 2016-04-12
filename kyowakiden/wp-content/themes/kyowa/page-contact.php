<?php get_header();global $lienhe;?>
<header class="header" role="masthead"><?php get_sidebar('main-menu');?></header>
<div class="show-body">
<div class="container">
<div class="row">
<div class="col-lg-4 col-sm-4 col-xs-12" align="center">
<div class=""><?php the_post_thumbnail('large',array('class'=>'img-responsive'));?></div>
</div>
<div class="col-lg-8 col-sm-8 col-xs-12" align="left">
<div class="title-table"><h3 style="padding: 9px 10px;"><?php echo __('Liên hệ','theme');?></h3></div>
<div class="table-edit"><?php while ( have_posts() ) : the_post();the_content();endwhile;?></div>
</div>
</div>
</div>
<div><div id="map-canvas"></div></div>
<div class="container">
<div class="row">
<div class="col-lg-4 col-sm-4 hidden-xs" align="left">
<div class="bgContact"><h3 style="margin:0px;padding:0px 15px;"><?php echo __('Địa chỉ','theme');?></h3></div>
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<div class="bgContact"><h3 style="margin:0px;padding:0px 15px;"><?php echo __('Liên hệ','theme');?></h3></div>
</div>
</div>

</div>
<form data-toggle="validator" role="form" id="contactForm" class="form-horizontal" style="margin-top:15px;">
<div class="container">
<div class="row">

<div class="col-lg-4 col-sm-4 hidden-xs" align="left">
<div class="contact-form" style="margin-top:5px;">
<?php echo getExcerptByID(1);?><br>
<p>m: <?php echo $lienhe['hotline'];?></p><br>
<p>e: <?php echo $lienhe['mail'];?></p><br>
<p>w: http://www.kyowa-kk.co.jp</p>
</div>
</div>

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

<div class="row">
<div class="col-md-4 col-xs-12">
<div class="form-group has-feedback">

<input type="text" id="fullname" class="form-control" placeholder="<?php echo __('Họ tên','theme');?>" data-error="Oh, must be input fullname" required>

<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
</div>

<div class="col-md-4 col-xs-12">
<div class="form-group has-feedback">

<input type="tel" id="phonenumber" class="form-control" placeholder="<?php echo __('Điện thoại','theme');?>" data-error="Oh, that phone is invalid" >

<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
</div>

<div class="col-md-4 col-xs-12">
<div class="form-group has-feedback">

<input type="email" id="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="<?php echo __('Địa chỉ mail','theme');?>" data-error="Oh, The value is not a valid email address" required>

<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
</div>

</div>

<div class="form-group has-feedback">
<textarea placeholder="<?php echo __('Địa chỉ','theme');?>" id="address" class="form-control" required></textarea>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
<div class="form-group has-feedback"><textarea placeholder="<?php echo __('Nội dung liên hệ','theme');?>" id="message" class="form-control"></textarea></div>

<div class="row">
<div class="col-md-4 col-xs-12">
<input type="submit" name="sendmail" value="<?php echo __('Gởi','theme');?>" class="btn btn-primary btn-lg btn-block"  style="margin-bottom:15px;border-radius:0px">
</div>
<div class="col-md-8 hidden-xs"></div>
</div>
</div>

</div>
</div>
</form>
</div>
<?php get_footer();?>