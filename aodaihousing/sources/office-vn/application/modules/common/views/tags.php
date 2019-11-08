<?php if(!empty($tagsList)): ?>
<div class="tag_cloud">
    <?php foreach($tagsList as $item): ?>
      <a href="<?=PATH_URL . "tag/" . $item->name; ?>"><?=$item->name?></a>
    <?php endforeach; ?>
</div>
<?php endif; ?>