<?php if($items): ?>
    
<div class="slider-top-menu">
    <?php foreach($items as $item): ?>
    <div class="image-list">
        <img src="<?php echo PATH_URL . 'static/uploads/bannerhome/' . $item->images ?>" alt="">
    </div>
    <?php endforeach; ?>
</div> 
<?php endif; ?> 