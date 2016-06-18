<div id="slider" style="position: relative; margin:0px;<?php if ( is_user_logged_in() ) { echo 'top: -33px;'; } else { echo 'top: 0px;'; }?> left: 0px; width: 1900px; height:600px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
<div style="position: absolute; display: block; background: url(<?php echo $template_directory; ?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1900px;height:600px; overflow: hidden;">
<?php
    $sliders = get_field('slider', 307);
        foreach($sliders as $slider):
            echo '<div>';
        	if ($slider['video']) {
        		echo '<iframe width="1067" height="600" src="https://www.youtube.com/embed/' . $slider['video'] . '?rel=0&amp;loop=1&amp;autoplay=0" frameborder="0" allowfullscreen></iframe>';
        	} else {
	            if ($slider['link']) {
	            	echo '<a href="' . $slider['link'] . '" target="_blank">';}
	            	echo '<img u="image" src="' . $slider['image']['url'] . '" />';
	            if ($slider['link']) {
	            	echo '</a>';
	            }
	        }
            echo '</div>';
         endforeach;
?>
</div>
<div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;"><div u="prototype"></div></div>
<span u="arrowleft" class="jssora21l" style="top: 123px; left: 10px;"></span>
<span u="arrowright" class="jssora21r" style="top: 123px; right: 10px;"></span>
</div>