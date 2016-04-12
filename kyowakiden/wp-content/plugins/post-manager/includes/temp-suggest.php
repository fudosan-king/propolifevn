<div id="list-suggestion-box">
<?php
if(!empty($_list) && $_list>0){
foreach($_list as $key){
	$_key = json_decode($key);
	$id = $_key->key;
	$o = $_key->postId;	
	$image=get_the_post_thumbnail($o,'gallery_admin_thumb');
	$terms =  wp_get_object_terms($o, 'cat-chronicle' );
?>
<div id="id_suggestion_<?php echo $id; ?>" class="suggestBoxElement">
<div class="suggestion-thumb" align="center" align="center"><?php echo $image;?></div>

<div class="detail">
<ul class="li-list-suggest">
<li><span>Tên SP:</span><?php echo get_the_title($o);?></li>
<li><span>Mã SP:</span><?php echo get_post_meta($o,'ma-sp',true);?></li>
<li><span>Danh mục:</span><?php echo $terms[0]->name;?></li>
<li><span>Thứ tự:</span><input type="text" value="<?php echo ($order?$order:0); ?>" /></li>
</ul>
<div class="del-suggestion" onclick="findAndRemovePostID('<?php echo $id; ?>')">
<a href="" onclick="return false"><span class="dashicons dashicons-no-alt"></span></a>
</div>
</div>
</div>

<?php }}?>
</div>