<link rel="stylesheet" type="text/css" href="<?=PATH_URL?>static/plugin/slideshow/css/base/advanced-slider-base.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?=PATH_URL?>static/plugin/slideshow/css/glossy-square/gray/glossy-square-gray.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?=PATH_URL?>static/plugin/slideshow/css/responsive-slider.css" media="screen"/>

<script type="text/javascript">	
	jQuery(document).ready(function(){
		$('#responsive-slider').advancedSlider({width: '670px',
												height: '492px',
												scaleType: 'outsideFit',
												skin: 'glossy-square-gray',
												effectType: 'swipe',
												pauseSlideshowOnHover: true,
												swipeThreshold: 50,
												slideButtons: false,
												thumbnailType: 'scroller',
												thumbnailButtons: true,
												thumbnailScrollerResponsive: true,
												minimumVisibleThumbnails: 2,
                                                shadow: false,    
                                                timerAnimation:false,
                                                captionToggle: false,
                                                thumbnailWidth: 120,
                                                thumbnailHeight: 90,
                                                thumbnailButtons: false
											   
		});
	});
	
	
</script>
<?php if(!empty($items)): ?>
<div class="advanced-slider" id="responsive-slider">
		<ul class="slides">
            <?php foreach($items as $key=>$item): ?>
			<li class="slide">
				<img class="image" src="<?=PATH_URL_IMAGES?>static/uploads/offices/gallery/<?=$item->name_image; ?>"/>
    			<img class="thumbnail" src="<?=PATH_URL_IMAGES?>static/uploads/offices/gallery/<?=$item->name_image; ?>"/>
			</li>
            <?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
<?php if(empty($items) && !empty($thumb)){?>
    <div class="advanced-slider" id="responsive-slider">
        <ul class="slides">
            <li class="slide">
                <img class="image" src="<?=PATH_URL_IMAGES?>static/uploads/offices/<?=$thumb; ?>"/>
                <?php if(mobile_template()=='pc'){ ?>
                    <img class="thumbnail" src="<?=PATH_URL_IMAGES?>static/uploads/offices/<?=$thumb; ?>"/>
                <?php } ?>
            </li>
        </ul>
    </div>
<?php }?>
