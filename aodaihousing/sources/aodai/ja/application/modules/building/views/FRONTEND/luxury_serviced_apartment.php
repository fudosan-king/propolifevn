<!-- search-box -->
<?php
    $catid = $this->uri->segment(2);
    $module = $this->uri->segment(1);
    if($module != 'news') {
        echo modules::run('search',$catid, $module);
    }
?>

<div class="content-search-block common-rows" id='scroll-buidling'>
	<div class="container">
        <?php
	        // File store under folder application/views/FRONTEND/breadcums.php
	        echo $this->load->view('FRONTEND/breadcums');
        ?>

		<div class="row">
			<div class="order_condition">
				<div class="select_order_area">
                    <select data-toggle="dropdown" class="select_order" name="cb_area" id='cb_area'>
                        <ul class="dropdown-menu">
                        	<?php if ($area): ?>
                        		<option value=""><?php echo lang('エリアを絞り込む'); ?></option>
                        		<?php foreach($area as $item_area): ?>
                        			<?php
                        				$selected = '';
                        				if ($item_area->id == $get_area) {
                        					$selected = ' selected="selected"';
                        				}
                        			?>
                        			<option value="<?php echo $item_area->id;?>"<?php echo $selected;?>>
                        				<a>
                                            <?php
                                            if($item_area->id == '3'){
                                                echo lang('1区レタントン通り',$language);
                                            }else{
                                                echo vcp_printf($item_area->name, $language);
                                            }
                                            ?>
                                        </a>
                        			</option>
                        		<?php endforeach; ?>
                        	<?php endif; ?>
                        </ul>
                    </select>
				</div>
			</div>
		</div>

		<?php $replace = array("-"=>"/");?> 
		<div class="row">
			<div class="map-content">
				<div class="product-area-map">
					<div class="product-item1 active">
					<?php if($list): ?>
						<?php foreach($list as $item):?>
							<?php $link = create_url("building/detail-service-apartment/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
							<div class="product-detail-area">
								<div class="img-product-map">
									<a href="<?php echo $link; ?>">
										<?php if ($item->image): ?>
											<img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
										<?php endif; ?>
									</a>
								</div>
								<div class="product-detail-map">
									<a href="<?php echo $link; ?>">
										<?php echo vcp_printf($item->name, current_lang_()); ?>
									</a>
									<p>
										<?php echo nl2br($item->description); ?>
									</p>
									<p>
                                       <?php if(isset($item->address)): ?>
                                       <?php echo vcp_printf($item->address, current_lang_()); ?>
                                       <?php endif; ?>
                                    </p>
								</div>
								<div class="clear"></div>
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
		$(".product-detail-area").slice(0, 3).show();
	    var position = $(".product-area-map").scrollTop(); 
	    $(window).scroll(function(){
		    var position = $('.product-area-map').height();
		    if($(this).scrollTop() >= position){
		        $(".product-detail-area:hidden").slice(0, 17).slideDown();
		    }
		});
		$('#cb_area').change(function(event) {
			/* Act on the event */
			var language = '<?php echo $language;?>';
			var url = '<?php echo PATH_URL; ?>';
			if (language == 'vn') {
				url += language + '/';
			}
			url += 'building/<?php echo helper_get_action_current(); ?>';
			if ($(this).val()) {
				url += '?area=' + $(this).val();
			}
			window.location.href = url;
		});

		$('html, body').animate({
            scrollTop: $("#scroll-buidling").offset().top
        }, 500);
	});
</script>