<?php
foreach ($items as $key => $value) {
    $thumb_image = 'static/uploads/houses/gallery/' . $value->name_image;
    $thumb_gallery_image = 'static/uploads/houses/gallery/thumb_' . $value->name_image;
    if(file_exists($thumb_image) && is_file($thumb_image)){?>
        <li data-thumb="<?= PATH_URL.$thumb_image ?>">
            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?= PATH_URL.$thumb_image ?>"/>
        </li>
    <?php }
    /* Load thumb images in detail house and building*/
    elseif (file_exists($thumb_gallery_image) && is_file($thumb_gallery_image)){?>
        <li data-thumb="<?= PATH_URL.$thumb_gallery_image ?>">
            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?= PATH_URL.$thumb_gallery_image ?>"/>
        </li>
    <?php }
}

if(count($items) == 0 && isset($images_thumb)) {
    foreach ($images_thumb as $key => $value) {
        $thumb_image = 'static/uploads/houses/thumb_' . $value->images_thumb;
        if(file_exists($thumb_image) && is_file($thumb_image)){?>
            <li data-thumb="<?= PATH_URL.$thumb_image ?>">
                <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?= PATH_URL.$thumb_image ?>"/>
            </li>
        <?php }
    }
}
?>