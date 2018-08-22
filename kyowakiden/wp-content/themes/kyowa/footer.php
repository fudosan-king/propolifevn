<?php global $lienhe;?>
<footer class="doc-footer">
  <div class="container">
    <div align="center">
      <ul class="footer-menu">
        <li class="home"><a href="index.html"><?php echo __('TRANG CHỦ','theme'); ?></a></li>
        <li class="<?php echo get_post(4)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('business'))?>"><?php echo get_the_title(4);?></a></li>     
        <li class="<?php echo get_post(5)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('head-office'))?>"><?php echo get_the_title(5);?></a></li>
        <li class="<?php echo get_post(2)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('about'))?>"><?php echo get_the_title(2);?></a></li>
        <li class="<?php echo get_post(3)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('group'))?>"><?php echo get_the_title(3);?></a></li>
        <li class="<?php echo get_post(6)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('news'))?>"><?php echo get_the_title(6);?></a></li>
        <li class="<?php echo get_post(1)->post_name;?>"><a href="<?php echo get_permalink(get_page_by_path('contact'))?>"><?php echo get_the_title(1);?></a></li>
      </ul>
    </div>
  </div>
  <div>
    <address>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12" align="center"><img src="<?php bloginfo( 'template_directory' );?>/images/top-logo.jpg" class="img-responsive center-block"></div>
        </div>
      </div>
    </address>

    <div class="clearfix"></div>
    <div class="footer-privacy">Copyright&nbsp;&copy;&nbsp;KYOWAKIDEN VIETNAM Co .,Ltd. ALL rights reserved.<span id="copyright-year"> 2016</span></div>
  </div>
  <div class="modal fade bs-example-modal-sm" id="messageDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
</footer>

<script src="<?php bloginfo( 'template_directory' );?>/js/functions.js"></script>

<script src="<?php bloginfo( 'template_directory' );?>/js/validator.min.js"></script>
<?php wp_footer();?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73793979-1', 'kyowakidenvietnam.com');
  ga('send', 'pageview');
</script>

<script>
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
</script>

<?php if(is_page('business')){?>
<script>
  $(function(){
    $(window).load(function(){	
      $('.grid-business').each(function() {
        var currentElement = $(this);
        var tagID = $(this).attr('id');
        $('#'+tagID+' .bg-default').css('height',currentElement.height());

      });
    });
  })
</script>
<?php } ?>
</body>
</html>
<?php ob_end_flush();?>