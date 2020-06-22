

<?php 
$page_info = get_page_by_path( 'general_addition_info' );

if (have_rows('side_bar', $page_info)):

	$group = get_field('side_bar', $page_info);
	$extra_content = $group['extra_content'];
	$links_follow = $group['links_follow'];
	echo '<div class="box_right">';
	?>
	
	<!-- SOCIAL CONTENT -->
	<?php 
	foreach($extra_content as $excontent){
		print_r($excontent['content']);
	}
	?>

	<!-- NEWS RECENT CONTENT -->

	<?php 
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
			'posts_per_page'         => -1,
			// 'posts_per_archive_page' => 10,
			// 'nopaging'               => false,
			// 'paged'                  => get_query_var( 'paged' ),
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

			echo '<h3 class="title_small text-uppercase">Informations</h3>
		<div class="box_aodai">
			<div class="panel panel-default">';
			while($query->have_posts()) : $query->the_post();
				?>
				<div class="panel-heading"><h3 class="panel-title"><?php the_title(); ?></h3></div>
				<div class="panel-body"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a><div class="datetime"><?php the_time(); ?></div></div>
				<?php
			endwhile;
			wp_reset_query();
			wp_reset_postdata();
			echo '</div>
		</div>';
		endif;

		?>
			

		<!-- LINKS FOLLOW CONTENT -->
		<?php 
		if (!empty($links_follow)):
			foreach($links_follow as $linkObj){
				$img = $linkObj['image'];
				$link = $linkObj['link'];
				?>
				<a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>"><img src="<?php echo $img['url']; ?>" alt="" class="img-responsive"></a>
				<?php

			}
		endif;
		?>
		<?php
		echo '</div>';
	endif;
	?>



