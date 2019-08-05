<?php
	$args = array(
		// Type & Status Parameters
		'post_type'   => 'news',
		'post_status' => 'publish',
		'order'               => 'DESC',
		'orderby'             => 'ID'
	);

	$query = new WP_Query( $args );

	if($query->have_posts()):
	 	$index = 1;
	 	while($query->have_posts()): $query->the_post();
?>
<article>
	<h4 class="datetime"><?php echo get_the_date('', $post->ID); ?></h4>
	<p><a href="<?php echo esc_url(get_permalink()); ?>" style="color: #000000;"><?php the_title(); ?></a></p>
</article>
		<?php endwhile; ?>
	<?php else: ?>
<article>
	<p>現在投稿はありません !</p>
</article>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>