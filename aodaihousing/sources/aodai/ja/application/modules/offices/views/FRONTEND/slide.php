<?php
foreach ($items as $key => $value) {
    ?>
    <li data-thumb="<?=PATH_URL?>static/uploads/offices/gallery/<?=$value->name_image; ?>">
        <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?=PATH_URL?>static/uploads/offices/gallery/<?=$value->name_image; ?>" />
    </li>
    <?php
}

if(count($items) == 0 && isset($images_thumb)) {
    foreach ($images_thumb as $key => $value) {
        ?>
        <li data-thumb="<?= PATH_URL ?>static/uploads/offices/<?= $value->images_thumb; ?>">
            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?= PATH_URL ?>static/uploads/offices/<?= $value->images_thumb; ?>"/>
        </li>
        <?php
    }
}
?>