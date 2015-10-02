<?php
/**
Template Name: GalleryPage
*/
?>

<?php
$lang = get_bloginfo('language_code');
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());

function add_script_video(){
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());

    echo '<script type="text/javascript" src="' . $template_directory . '/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>';

    echo '
        <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox-media")
                .attr("rel", "media-gallery")
                .fancybox({
                    openEffect : "none",
                    closeEffect : "none",
                    prevEffect : "none",
                    nextEffect : "none",
                    closeBtn  : false,
                    arrows : false,
                    helpers : {
                        media : {},
                        buttons : {}
                    }
                });
        });
        </script>
    ';
}
add_action( 'wp_head', 'add_script_video', 0 );

get_header();

?>

<?php
    // while ( have_posts() ) : the_post();
    //     the_content();
    // endwhile;
    // wp_reset_query();
?>


<?php
$videos = get_field('videos', 307);
foreach($videos as $video):
    echo '
    <div class="container">
    <div class="row top-row">
    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">&nbsp;</div>
    <div class="col-lg-4 col-sm-4 col-xs-12" align="center">
    <div class="title" align="center"><h3>' . $video['title_category'] . '</h3></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">&nbsp;</div>
    </div>

    <div class="row">
    <div class="col-lg-1" align="center"></div>
    <div class="col-lg-10 col-xs-12" align="center">
    <p class="notice fact">';

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();

    echo '</p>
    </div>
    <div class="col-lg-1" align="center"></div>
    </div>
    </div>

    <div class="container-fluid">
    <div class="row show-grid">
    ';

    $index = 1;
    foreach($video['categories'] as $categorie):
        echo '
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" align="center">
            <div class="gallery" align="center">
            <div class="view" align="center">
            <a href="https://www.youtube.com/embed/' . $categorie['video_id'] . '" class="fancybox-media" rel="media-gallery"><img src="http://img.youtube.com/vi/' . $categorie['video_id'] . '/0.jpg" class="img-responsive"></a>
            </div>
            </div>
            <div class="title" align="center">' . $categorie[title] . '</div>
            </div>
        ';
        $index += 1;
    endforeach;

    echo '
    </div>
    </div>
    ';
endforeach;
?>


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
    <a class="fa fa-facebook" href="#"></a>
    <a class="fa fa-twitter" href="#"></a>
    <a class="fa fa-google-plus" href="#"></a>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="footer-privacy">Copyright&nbsp;©&nbsp;Propolife INC. ALL rights reserved.<span id="copyright-year">2015</span>. <a href="#">Privacy Policy</a></div>
    <div class="container" role="alert">
    <div class="hidden-lg hidden-md hidden-sm col-xs-12 quick-contact" align="center">
    <div align="center" class="alert bg-quick-contact">
    <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <?php $topics = get_field('topic', 170); ?>
    <i class="fa fa-phone-square"></i><abbr title="<?php echo $topics[0]['address'][0]['tel'] ?>"><?php echo $topics[0]['address'][0]['tel'] ?></abbr><i class="fa fa-chevron-up fa-3x" style="margin-left:10px;"></i>
    </a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
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
    <?php wp_footer(); ?>
    </body>
</html>
