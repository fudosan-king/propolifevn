<?php /* Template Name: PageCompany */?>
<?php get_header(); ?>

<?php
global $post;
?>
<section class="section_general section_companyprofile">
	<div class="container">
		<div class="row flex-row-reverse">

			<div class="col-12 col-md-6 align-self-center">
				<h2>Company Profile</h2>
				<p>お近くにいらっしゃる際は、ぜひお立ち寄りください。</p>
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
			<div class="col-12 col-md-6 align-self-center">
				<div class="box_staff">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
					<img src="<?php echo $url ?>" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>