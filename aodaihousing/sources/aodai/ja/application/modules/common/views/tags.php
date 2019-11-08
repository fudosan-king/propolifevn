<?php if($tagsList): ?>
	<div class="tag_cloud">
	    <?php foreach($tagsList as $item): ?>
			<a href="<?=create_url() . "tag/" . $item->name; ?>"><?php echo $item->name; ?></a>
	    <?php endforeach; ?>
	</div>
<?php endif; ?>