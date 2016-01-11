<footer class="doc-footer">
<div class="container">
<div align="center">
<ul class="footer-menu">

<li class="home"><a href="<?php echo home_url();?>">HOME</a></li>
<li class="<?php echo get_post(3)->post_name;?>"><a href="<?php echo get_post_permalink(3);?>"><?php echo get_the_title(3);?></a></li>
<li class="<?php echo get_post(5)->post_name;?>"><a href="<?php echo get_post_permalink(5);?>"><?php echo get_the_title(5);?></a></li>   
<li class="<?php echo get_post(7)->post_name;?>"><a href="<?php echo get_post_permalink(7);?>"><?php echo get_the_title(7);?></a></li>
<li class="<?php echo get_post(11)->post_name;?>"><a href="<?php echo get_post_permalink(11);?>"><?php echo get_the_title(11);?></a></li>       
<li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_post_permalink(1);?>"><?php echo get_the_title(1);?></a></li> 

</ul>
</div>
</div>
<div>
<address>
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12" align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/top-logo.png" width="166" height="auto" class="img-responsive center-block"></div>
</div>
</div>
</address>

<div class="socials">
<div class="socials_wrapper">
<a class="fa fa-facebook" href="#"></a>
<a class="fa fa-twitter" href="#"></a>
<a class="fa fa-google-plus" href="#"></a>
</div>
</div>
<div class="clearfix"></div>
<div class="footer-privacy">Copyright&nbsp;&copy;&nbsp;Propolife INC. ALL rights reserved.<span id="copyright-year">2015</span>. <a href="#">Privacy Policy</a></div>
</div>
<div class="modal fade bs-example-modal-sm" id="messageDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
</footer>
<script src="<?php bloginfo( 'template_directory' );?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/js/validator.min.js"></script>
<?php  wp_footer();?>
</body>
</html>
<?php ob_end_flush();?>