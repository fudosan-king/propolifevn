<?php
/**
Template Name: QualityPage
*/
?>

<?php
$lang = get_bloginfo('language');
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
?>

<?php
    add_action( 'wp_head_customer', 'add_font_lemon', 0);
    get_header();
?>

<?php
    // show slider
    // show_slider();
?>

<div class="wood-bg other-block">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<h3 style="font-size:35px;margin-bottom:0px;text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.51);font-family: 'Lemon', cursive;">Our Quality</h3>
</div>

<div class="col-lg-12" align="center">
<p align="center" style="color:#ffffff;padding: 20px 0px;">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

</div>

<div class="col-lg-3 col-md-3" align="center">
</div>

<div class="col-lg-3 col-md-3 col-sm-6" align="center">
<div class="thumbnail" style="padding:15px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.58);"><img src="<?php echo $template_directory ?>/images/certificate.jpg" class="img-responsive"></div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6" align="center">
<div class="thumbnail" style="padding:15px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.58);"><img src="<?php echo $template_directory ?>/images/certificate.jpg" class="img-responsive"></div>
</div>

<div class="col-lg-3 col-md-3" align="center">
</div>


</div>
</div>
</div>



<div class="ourprocess">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center"><h3 style="color: #91c11e;margin-bottom:40px;font-family: 'Lemon', cursive;font-size:40px;">Our Processes</h3></div>
<div class="clearfix"></div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<a><img src="<?php echo $template_directory ?>/images/founders.png" alt=""></a>
<h4 style="font-family: 'Lemon', cursive;">Produce</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride ourselves on supplying the best fresh ingredients available.</p>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<div class="hidden-xs">
<h4 style="font-family: 'Lemon', cursive;">Storing</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride ourselves on supplying the best fresh ingredients available.</p>
</div>
<a><img src="<?php echo $template_directory ?>/images/f2.png"></a>
<div class="visible-xs">
<h4 style="font-family: 'Lemon', cursive;">Storing</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride ourselves on supplying the best fresh ingredients available.</p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
<a><img src="<?php echo $template_directory ?>/images/f3.png" alt=""></a>
<h4 style="font-family: 'Lemon', cursive;">Distribution</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride c on supplying the best fresh ingredients available.</p>
</div>

</div>
</div>
</div>



<div align="center"><img src="<?php echo $template_directory ?>/images/ff.png"></div>


<div class="slogan-row" data-stellar-background-ratio="0.5" style="background-position: 50% 105.945px;">
<div class="container">
<div class="row">
<div class="col-lg-12"><div class="slogan"><h4 class="item-title">Food fresh</h4><div>Necessary for all families</div></div></div>
</div>
</div>
</div>


<div class="bg-default">
<div class="container">

<div class="row">

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
<div class="thumbnail" style="padding:15px;margin-top:30px;">
<img src="<?php echo $template_directory ?>/images/ff.jpg" class="img-responsive">
<h4 style="font-family: 'Lemon', cursive;">Fresh food</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride c on supplying the best fresh ingredients available.</p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
<div class="thumbnail" style="padding:15px;margin-top:30px;">
<img src="<?php echo $template_directory ?>/images/nf.jpg" class="img-responsive">
<h4 style="font-family: 'Lemon', cursive;">Safe food</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride c on supplying the best fresh ingredients available.</p>

</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
<div class="thumbnail" style="padding:15px;margin-top:30px;">
<img src="<?php echo $template_directory ?>/images/df.jpg" class="img-responsive">
<h4 style="font-family: 'Lemon', cursive;">Clean food</h4>
<p align="center">We are a family run business with over 25 years’ experience in the food service industry.
We pride c on supplying the best fresh ingredients available.</p>

</div>
</div>

</div>
</div>
</div>



<?php get_footer(); ?>