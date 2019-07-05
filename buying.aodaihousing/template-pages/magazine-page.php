<?php 
/* Template Name: MAGAZINE - Page Template */
?>
<?php   
get_header();
global $wp;
$current_url_page = home_url( $wp->request );
// get array query
$args = array(
    // Type & Status Parameters
	'post_type'   => 'news',
	'post_status' => 'publish',
	// Pagination Parameters
	'posts_per_page' => 12,
	// Order & Orderby Parameters
	'order'    => 'DESC',
	'orderby'  => 'ID',
	// get the current page
	'paged' => get_query_var('paged'),
);
$wp_query = new WP_Query( $args );
?>
    <main>
        <div class="main_templates">
            <section class="section_magazine">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="title"><span>アオザイマガジン</span></h2>
                            <p class="sub_title">不動産購入や現地の実情に関する情報を随時発信</p>
                        </div>
                    </div>
                    <?php
                        if($wp_query->have_posts()):
                            $index = 1;

                    ?>
                    <div class="row no-gutters">
                    	<?php 
                    		while($wp_query->have_posts()): $wp_query->the_post();

                                $thumbnailURL = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), $size = 'origin', $icon = false );
                        ?>
                        <div class="col-6 col-sm-6 col-md-4 mx-auto">
                            <article class="article_items">
                                <div class="article_img">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <figure><img src="<?php echo $thumbnailURL; ?>" alt="" class="img-fluid"></figure>
                                    </a>
                                </div>
                                <div class="article_footer">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-sm-9 align-self-center">
                                            <p class="article_title"><?php the_title(); ?></p>
                                        </div>
                                        <div class="col-12 col-sm-3 align-self-center">
                                            <a href="<?php echo get_permalink(); ?>" class="btn btnRead">Read</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php endwhile; ?>
                    </div>                                           
                    <div class="row mt-3 mt-sm-5"> 
                        <div class="col-12">
                        	<?php custom_wp_pagination(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p>現在雑誌は出版されていません !</p>
                <?php endif; ?>
                </div>
            </section>
        </div>
    </main>
<?php wp_reset_query(); ?>
<?php get_footer();?>