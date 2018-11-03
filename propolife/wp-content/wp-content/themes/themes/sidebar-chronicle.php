<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">クロニクルリフォーム</h4></a>
<?php
$args = array('orderby'=> 'name', 'order'=> 'ASC', 'hide_empty'=>0,'exclude'=>array(7,11));
$terms = get_terms('cat-chronicle',$args);
$dem=0;
foreach($terms as $term){$dem++;
?>
<a href="<?php echo get_term_link($term->slug,'cat-chronicle'); ?>" class="list-group-item"><span class="list_num">0<?php echo $dem;?>.</span><?php echo $term->name;?></a>    
<?php }?>
</div>