<?php 
/*Template Name: News - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <?php get_template_part( 'template-parts/page/news', 'list_items' ); ?>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>

