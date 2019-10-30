<style>
    .product-building {
        display: none;
    }
</style>
<div class="content-search-block common-rows" id='scroll-buidling'>
	<div class="container">
        <?php
	        // File store under folder application/views/FRONTEND/breadcums.php
	        echo $this->load->view('FRONTEND/breadcums');
        ?>

		<div class="row">
			<div class="map-content">
				<div class="product-area-map">
					<div class="product-item1 active">
						<?php if($list): ?>
							<?php foreach($list as $item):?>
								<?php $detail_building_buy_sell = PATH_URL . 'building_buy_sell/detail/' . $item->id; ?>
								<div class="product-building">
			                        <div class="row">
			                            <div class="col-xs-12 col-sm-5 col-md-4">
			                                <div class="product-building-img">
			                                    <?php if ($item->image): ?>
			                                    	<a href="<?php echo $detail_building_buy_sell; ?>">
														<img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/building_buy_sell/' . $item->image ?>">
													</a>
												<?php endif; ?>
			                                </div>
			                            </div>
			                            <div class="col-xs-12 col-sm-7 col-md-8">
			                                <div class="product-building-cnt">
			                                	<div class="title-building">
			                                        <a class="product-text" href="<?php echo $detail_building_buy_sell; ?>">
			                                        	<?php echo vcp_printf($item->title, current_lang_()); ?>
		                                        	</a>
			                                    </div>
			                                    <div class="text-building style-3">
			                                        <?php if(isset($item->description)): ?>
			                                       		<?php echo vcp_printf($item->description, current_lang_()); ?>
			                                       	<?php endif; ?>
			                                    </div>
			                                    <div class="product-btn">
			                                        <a href="<?php echo $detail_building_buy_sell; ?>">詳細、お写真はこちら</a>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
							<?php endforeach; ?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	
		<div class="row paging-after">
			<div class="paging pull-right">
				<?php echo $paging->create_links(); ?>
			</div>
		</div>
	</div>
</div><!-- content-search-block -->

<script>
	function init() {
		var imgDefer = document.getElementsByTagName('img');
		for (var i=0; i<imgDefer.length; i++) {
			if(imgDefer[i].getAttribute('data-src')) {
				imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
			}
		}	
 	}
	window.onload = init;

	$(document).ready(function($) {
		$(".product-building").slice(0, 3).show();
	    var position = $(".product-area-map").scrollTop() + 300; 
	    $(window).scroll(function(){
		    if($(this).scrollTop() >= position){
		        $(".product-building:hidden").slice(0, 17).slideDown();
		    }
		});
	});
</script>