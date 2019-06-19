
<?php 


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    /*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
    $args = array(

		// Type & Status Parameters
    	'post_type'   => 'news_obj',
    	'post_status' => 'publish',

		// Order & Orderby Parameters
    	'order'               => 'DESC',
    	'orderby'             => 'date',

		// Pagination Parameters
    	'posts_per_page'         => 5,
		// 'posts_per_archive_page' => 10,
    	'nopaging'               => false,
    	'paged'                  => $paged,
		// 'offset'                 => 3,

		// Permission Parameters -
    	'perm' => 'readable',

		// Parameters relating to caching
    	'no_found_rows'          => false,
    	'cache_results'          => true,
    	'update_post_term_cache' => true,
    	'update_post_meta_cache' => true,
    );

    $query = new WP_Query( $args );

    if ($query->have_posts()):
    	echo '<div class="box_left">
    	<h2 class="title">'.get_the_title().'</h2>
    	<div class="box_listNews">';

    	while($query->have_posts()): $query->the_post();
    		?>
    		<div class="news_item">
    			<h4><?php the_title(); ?></h4>
    			<div><small><?php the_time(); ?></small></div>
    			<p><a href="<?php the_permalink(); ?>" title=""><?php the_excerpt(); ?></a></p>
    			<a class="btn btn-default btn_newDetail" href="<?php the_permalink(); ?>" title=""><?php echo __('詳細を見る »', 'chroniclevn'); ?></a>
    		</div>

    		<?php
    	endwhile;

    	// PAGINATION HERE

    	echo '</div>
    	<div class="text-center">
    	<ul class="pagination">';

    	$pagination = paginate_links( array(
    		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    		'total'        => $query->max_num_pages,
    		'current'      => max( 1, get_query_var( 'paged' ) ),
    		'format'       => '?paged=%#%',
    		'show_all'     => false,
    		'type'         => 'array',
    		'end_size'     => 2,
    		'mid_size'     => 1,
    		'prev_next'    => true,
    		'prev_text'    => sprintf( '<i></i> %1$s', __( '&laquo;', 'text-domain' ) ),
    		'next_text'    => sprintf( '%1$s <i></i>', __( '&raquo;', 'text-domain' ) ),
    		'add_args'     => false,
    		'add_fragment' => '',
    	) );

    	if (!empty($pagination)):

    		

    		foreach($pagination as $page){
    			echo '<li>'.$page.'</li>';
    		}

    		
    	endif;
    	echo '</ul>
    	</div>
    	</div>';

    	wp_reset_postdata();
    	wp_reset_query();
    endif;


    ?>