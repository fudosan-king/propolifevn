<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */
?>
<?php
    $lang = get_bloginfo('language');
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    $slogan = get_field('slogan', 167);
    $name = get_field('name', 167);
?>

<?php
    add_action( 'wp_head_customer', 'add_javascript_slider', 10);
    add_action( 'wp_head_customer', 'add_javascript_sliderAbout', 15);
    get_header();
?>

<?php
    // show slider
    show_slider();
?>


<div class="show-grid">
<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12 center-block" align="center">
<?php
    $post_id = get_post( 167 );
    $content = $post_id->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
    echo $content;
?>

<?php
    // show gallery page top
    show_gallery();
?>

</div>
</div>
</div>
</div>

<div class="slogan-row" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">
<div class="col-lg-12"><div class="slogan">
    <div>
        <?php _e($slogan, 'elt'); ?>
    </div>
</div></div>
</div>
</div>
</div>

<div class="bg-default">
    <div class="container">
    <div class="row">
    <div class="col-lg-12" align="center">
    <h3>
        <?php _e($name, 'elt');?>
    </h3>

    </div>
    <div class="clearfix"></div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
        <a href="/?page_id=35" class="lazy-item">
        <span class="list-title"><?php _e( '私達について', 'elt' ); ?></span>
        <span class="lazy-container lazyloaded">
        <span class="lazy_preloader"></span>
        <img src="<?php echo $template_directory;?>/images/blank.gif" data-src="http://www.eltvn.com/wp-content/uploads/2015/10/elt-thumb.jpg" class="lazy img-responsive" alt="牛の肉鶏肉" style="display: block;">
        </span>
        </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
        <a href="/?page_id=38" class="lazy-item">
        <span class="list-title"><?php _e( '私たちのサービス', 'elt' ); ?></span>
        <span class="lazy-container lazyloaded">
        <span class="lazy_preloader"></span>
        <img src="<?php echo $template_directory;?>/images/blank.gif" data-src="http://www.eltvn.com/wp-content/uploads/2015/09/2.jpg" class="lazy img-responsive" alt="鶏肉" style="display: block;">
        </span>
        </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
        <a href="/?page_id=40" class="lazy-item">
        <span class="list-title"><?php _e( 'クライアント', 'elt' ); ?></span>
        <span class="lazy-container lazyloaded">
        <span class="lazy_preloader"></span>
        <img src="<?php echo $template_directory;?>/images/blank.gif" data-src="http://www.eltvn.com/wp-content/uploads/2015/09/3.jpg" class="lazy img-responsive" alt="PORK MEAT" style="display: block;">
        </span>
        </a>
        </div>
    </div>
    </div>
</div>

<?php
    // show all categories
    // show_product_categories_index();
?>

<?php
    add_action( 'wp_footer', 'add_script_footer', 30 );
    get_footer();
?>
