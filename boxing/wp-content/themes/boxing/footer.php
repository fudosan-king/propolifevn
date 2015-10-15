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
$lang = get_bloginfo('language_code');
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
?>
    <div class="blockgallery">
    <div class="container-fluid">
    <h3 align="center">
        <?php if ($lang == 'ja') { ?>
            ライブラリー

        <?php } else if ($lang == 'vi') { ?>
            THƯ VIỆN

        <?php } else { ?>
            GALLERY BOXING

        <?php } ?>
    </h3>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="sliderCat" style="position: relative; top: 0px; left: 0px; width:1170px; height:180px; overflow: hidden;margin-top:10px;padding-bottom:20px">
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
    <div style="position: absolute; display: block; background: url(<?php echo $template_directory; ?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
    </div>

    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:1170px; height:180px; overflow: hidden;">

    <?php
    $gallery_boxings = get_field('images', 307);
        foreach($gallery_boxings as $gallery_boxing):
            echo '
                <div align="center">
                <div align="center" class="bgzoom">
                <a href="' . $gallery_boxing['image']['url'] . '" class="fancybox-buttons" data-fancybox-group="button">
                <img src="' . $gallery_boxing['image']['url'] . '" class="img-responsive">
                <i class="fa fa-search-plus"></i>
                </a>
                </div>
                </div>
            ';
         endforeach;
    ?>

    </div>

    <div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;"><div u="prototype"><div u="numbertemplate"></div></div></div>
    <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;"></span>
    <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;"></span>
    </div>
    </div>
    </div>
    <div align="center">
        <?php if ($lang == 'ja') { ?>
            <a href="/?page_id=52&lang=ja" class="btn btn-primary">
            参加しませんか

        <?php } else if ($lang == 'vi') { ?>
            <a href="/?page_id=50&lang=vi" class="btn btn-primary">
            THAM GIA VỚI CHÚNG TÔI

        <?php } else { ?>
            <a href="/?page_id=48&lang=en" class="btn btn-primary">
            JOIN US

        <?php } ?>
    </a></div>
    </div>
    </div>

    <footer class="doc-footer">
        <div class="container">
        <div align="center">
        <ul class="footer-menu">
            <?php
                $defaults = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu-header',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => ''
                );
                wp_nav_menu( $defaults );
            ?>
        </ul>
        </div>
        </div>
        <div>
        <address>
        <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12" align="center"><img src="<?php echo( get_header_image() ); ?>" width="166" height="98" class="img-responsive center-block"></div>
        </div>
        </div>
        </address>

        <div class="socials">
        <div class="socials_wrapper">
        <a class="fa fa-facebook" href="https://www.facebook.com/pages/Samurai-Boxing-Gym/972758416076004" target="_blank"></a>
        <a class="fa fa-twitter" href="#"></a>
        <a class="fa fa-google-plus" href="#"></a>
        </div>
        </div>
        <div class="clearfix"></div>
        <div class="footer-privacy">Copyright&nbsp;&copy;&nbsp;Propolife INC. ALL rights reserved.<span id="copyright-year">2015</span>. <a href="#">Privacy Policy</a></div>
        <div class="container" role="alert">
        <div class="hidden-lg hidden-md hidden-sm col-xs-12 quick-contact" align="center">
        <div align="center" class="alert bg-quick-contact">
        <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <?php $topics = get_field('topic', 170); ?>
        <i class="fa fa-phone-square"></i><a href="tel:<?php echo $topics[0]['address'][0]['mobile'] ?>" title="<?php echo $topics[0]['address'][0]['mobile'] ?>"><?php echo $topics[0]['address'][0]['mobile'] ?></a><i class="fa fa-chevron-up fa-3x" style="margin-left:10px;"></i>
        </a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php
        foreach ($topics as $topic) {
            if ($topic['language'] == $lang){
                echo '<div class="collapse" id="collapseExample" style="width:100%"><hr><p>' . $topic['address'][0]['opening'] . '</p></div>';
            }
        }
        ?>
        </div>
        </div>
        </div>
        </div>
    </footer>
    <script src="<?php echo $template_directory ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <?php wp_footer(); ?>
    </body>
</html>








