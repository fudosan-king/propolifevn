<!-- <?php if($items): ?>

<div class="slider-top-menu">
    <?php if(is_device() == "pc"): ?>
    <?php foreach($items as $item): ?>
    <div class="image-list">
        <img class="lazy" data-src="<?php echo PATH_URL . 'static/uploads/bannerhome/' . $item->images ?>" alt="">
    </div>
    <?php endforeach; ?>
    <?php else : ?>
    <?php foreach($items as $item): ?>
    <div class="image-list">
        <img class="lazy" data-src="<?php echo PATH_URL . 'static/uploads/bannerhome/thumb_' . $item->images ?>" alt="">
    </div>
    <?php endforeach; ?>
    <?php endif; ?> 
</div> 
<?php endif; ?> --> 

<style type="text/css">
    .fadeOut.owl-carousel .item img {
        width: 100%;
        height: 754px;
        object-fit: cover;
    }

    @media screen and (max-width: 1024px) {
        .fadeOut.owl-carousel .item img {
            height: 290px;
        }
    }

    @media screen and (max-width: 414px) {
        .fadeOut.owl-carousel .item img {
            height: 155px;
        }
    }
</style>

<?php if($items): ?>
    <div class="fadeOut owl-carousel owl-theme">
        <?php if(is_device() == "pc"): ?>
            <?php foreach($items as $item): ?>
            <div class="item">
                <img src="<?php echo PATH_URL . 'static/uploads/bannerhome/' . $item->images ?>" alt="">
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <?php foreach($items as $item): ?>
                <div class="item">
                     <img class="owl-lazy" data-src="<?php echo PATH_URL . 'static/uploads/bannerhome/thumb_' . $item->images ?>" alt="">
                </div>
            <?php endforeach; ?>
        <?php endif; ?> 
    </div> 
<?php endif; ?>