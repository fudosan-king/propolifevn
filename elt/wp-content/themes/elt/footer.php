<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */
?>
<?php
$lang = get_bloginfo('language');
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
?>


<?php
    if (!is_page( 38 ) && !is_page( 40 ) ) {
        // add_services_clients();
		$arg = array('page_id' => 381);
		$the_query = new WP_Query($arg);
		while ( $the_query->have_posts() ) : $the_query->the_post();
			the_content();
		endwhile;
		wp_reset_query();
    }
?>
<footer class="doc-footer">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer-privacy center-block" align="left">Copyright&nbsp;&copy;&nbsp;Propolife INC. ALL rights reserved.<span id="copyright-year">2015</span>. <a href="http://propolife.co.jp" target="_blank">Privacy Policy</a></div>
</div>
</div>
</div>
<div class="back-top"><a href="#"><i class="fa fa-arrow-circle-o-up"></i></a></div>
</footer>


<?php wp_footer(); ?>

    </body>
</html>








