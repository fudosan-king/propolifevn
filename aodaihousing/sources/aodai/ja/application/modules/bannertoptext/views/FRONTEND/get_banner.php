<?php if($items): ?>
    <?php foreach($items as $item): ?>
    	<?php
    		$title = '';
    		if (vcp_printf($item->title, current_lang_())) {
    			$title = vcp_printf($item->title, current_lang_());
    		}

    		$description_one = '';
    		if (vcp_printf($item->description_one, current_lang_())) {
    			$description_one = vcp_printf($item->description_one, current_lang_());
    		}

    		$description_two = '';
    		if (vcp_printf($item->description_two, current_lang_())) {
    			$description_two = vcp_printf($item->description_two, current_lang_());
    		}

    		$description_three = '';
    		if (vcp_printf($item->description_three, current_lang_())) {
    			$description_three = vcp_printf($item->description_three, current_lang_());
    		}

    		$description_four = '';
    		if (vcp_printf($item->description_four, current_lang_())) {
    			$description_four = vcp_printf($item->description_four, current_lang_());
    		}

    		$random_line = '';
    		if (
    			$description_one && 
    			$description_two && 
    			$description_three && 
    			$description_four
    		) {
    			$random_line = 'four-line';
    		} else if (
    			(
    				$description_one && 
	    			!$description_two && 
	    			!$description_three && 
	    			!$description_four
    			) ||
    			(
    				!$description_one && 
	    			$description_two && 
	    			!$description_three && 
	    			!$description_four
    			) ||
    			(
    				!$description_one && 
	    			!$description_two && 
	    			$description_three && 
	    			!$description_four
    			) ||
    			(
    				!$description_one && 
	    			!$description_two && 
	    			!$description_three && 
	    			$description_four
    			)
    		) {
    			$random_line = 'one-line';
    		}
    	?>
	    
	    <div class="sub-content-list <?php echo $random_line; ?>">
			<div class="container">
				<div class="banner-content">
	                <?php if ($title): ?>
					    <p class="heading-title-banner"><?php echo $title; ?></p>
	                <?php endif; ?>
	                
	                <?php if ($description_one): ?>
						<p class="text-two"><?php echo $description_one; ?></p>
	                <?php endif; ?>
	                
	                <?php if ($description_two): ?>
						<p class="text-two"><?php echo $description_two; ?></p>
	                <?php endif; ?>

	                <?php if ($description_three): ?>
						<p class="text-two"><?php echo $description_three; ?></p>
	                <?php endif; ?>

	                <?php if ($description_four): ?>
						<p class="text-two"><?php echo $description_four; ?></p>
	                <?php endif; ?>
				</div>
			</div>
		</div>
    <?php endforeach; ?>
<?php endif; ?> 