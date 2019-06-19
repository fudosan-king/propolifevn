<?php 
	$frontpage_id = get_option( 'page_on_front' );
	$pageFront = get_post( $frontpage_id );
?>
<section class="bread_crumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php the_permalink( $pageFront ); ?>"><?php echo $pageFront->post_title; ?></a>
					</li>
					<li class="active"><?php the_title(); ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>