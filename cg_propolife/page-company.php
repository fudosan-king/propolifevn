<?php /* Template Name: PageCompany */?>
<?php get_header(); ?>

<?php
global $post;
?>
<section class="section_general section_companyprofile">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-8 offset-md-2 align-self-center">
				<div class="box_staff">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
					<img src="<?php echo $url ?>" alt="" class="img-fluid">
					<h2>Company Profile</h2>
				</div>
			</div>

			<div class="col-12 col-md-6 offset-md-3 align-self-center">
				<table class="table">
					<?php if (have_rows('table')) {
						while (have_rows('table')) {
							the_row();
							$label = get_sub_field('label');
							$text = get_sub_field('text');
					?>
						<tr>
							<th><?php echo $label; ?></th>
							<td><?php echo $text; ?></td>
						</tr>
					<?php
						}
					}
					?>
				</table>
			</div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>