<?php
$tax = 'cat-manga';
$terms = get_terms($tax,array('orderby'=> 'name','order'=> 'ASC','hide_empty'=>1));
foreach($terms as $term){
	$attachID = get_tax_meta($term->term_taxonomy_id,'tax_thumbnail',true);	
	$thumbUrl = wp_get_attachment_image_src($attachID,'full');
?>
<div class="col-lg-4" align="center">
<a class="thumbnail mangaMenu" href="<?php echo get_term_link($term->slug,$tax);?>">
<img src='<?php echo $thumbUrl[0];?>' class="img-responsive" />
<div class="caption">
<h4><?php echo $term->name;?></h4>
<p><?php echo $term->description;?></p>
<span class="btn btn-danger">VIEW CAT</span>
</div>
</a>
</div>
<?php	
}
?>