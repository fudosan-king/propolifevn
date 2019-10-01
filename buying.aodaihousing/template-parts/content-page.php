<main>
	<section class="content-page">
		<div class="container">
			<div class="row">
				<div class="col col-12 aodaihousing-introcation">
					<?php 
					if(have_posts()):
						while(have_posts()): the_post();
							$thumnailImage = wp_get_attachment_image_url( get_post_thumbnail_id(), $size = 'large', $icon = false );
							?>
							<h2 class="title"><span><?php the_title(); ?></span></h2>
							
							<div id="main-content">
								<p><?php the_content(); ?></p>
							</div>

							<?php
						endwhile;
					else:
						?>
							<p align="center">404 Page not found.</p>
						<?php
					endif;
					?>
					
				</div>
			</div>
		</div>
	</section>
</main>
