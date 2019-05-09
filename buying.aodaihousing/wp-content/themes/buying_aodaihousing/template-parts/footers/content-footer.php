<footer>
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12">
					<p class="freecall"><i class="fal fa-phone-volume"></i> <a href="tel:+84-28-3827-5068">+84-28-3827-5068</a></p>
					<p>受付時間／JST10:00 ~ JST19:00<br>
					定休日／土曜日・日曜日、ベトナムの祝日</p>
				</div>
			</div>
		</div>
	</div>

	<div class="footer_mid">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12 col-sm-12">
							<?php
						        $logoCompanyURL = wp_get_attachment_image_url( get_field('site_logo', 36)['ID'], $size = 'origin', $icon = false );
						      ?>
							<a href="<?php custom_top_link($pagename); ?>" class="logo_footer"><img src="<?php 
							echo $logoCompanyURL; ?>" alt="" class="img-fluid" width="357"></a>
						</div>
						<div class="col-12">
							<ul class="menu_footer">
								<?php 
						            $menuLocations = get_nav_menu_locations();
						            $menuID = $menuLocations['footer'];
						            $topNav = wp_get_nav_menu_items($menuID);
						            if (count($topNav)>0){
						                $active = is_front_page() ? 'active' : "";
						              foreach ($topNav as $nav){
						                    /* Action here */
						                    $active = $nav->object_id == $post->ID ? 'active' : "";
						                    if($nav->ID == 147)
						                    	echo ' <li><a class="link_pro" href="javascrip:void(0);">'.$nav->title.'</a></li>';
						                   	else
						                    	echo ' <li><a href="'.$nav->url.'">'.$nav->title.'</a></li>';
						                }
						            }
						          ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="col col-12 col-sm-12">
					<p class="copyright">Copyright © <a target="_blank" href="https://www.propolifevietnam.com/">PROPOLIFEVIETNAM CO., LTD.</a> All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class='back-to-top' id='back-to-top' title='Back to top'>
	<i class="fal fa-arrow-up fa-lg"></i>
</div>

<div class="bsnav-mobile">
  <div class="bsnav-mobile-overlay"></div>
  <div class="navbar"></div>
</div>