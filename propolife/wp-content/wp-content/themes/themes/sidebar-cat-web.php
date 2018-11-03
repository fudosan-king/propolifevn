<?php
$tax = 'cat-web';
$terms = get_terms($tax,array('hide_empty'=>0));
foreach($terms as $term){
$attachID=get_tax_meta($term->term_id,'tax_thumbnail',$attachID);
$image_thumb=wp_get_attachment_image_src($attachID,'thumbnail');
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="thumbnail catweb">
<a href="<?php echo get_term_link($term->slug,$tax);?>">
<img src="<?php bloginfo( 'template_directory' );?>/images/sthumb.jpg" class="img-responsive" >
<div class="caption"><h4><?php echo $term->name;?></h4><div class="num" align="center"><?php echo $term->count; ?></div></div>
</a>
<div class="description"><p><?php echo $term->description; ?></p></div>
</div>
</div>    
<?php }?>