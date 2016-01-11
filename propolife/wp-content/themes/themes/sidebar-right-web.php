<div class="list-group" align="left">
<a href="#" class="list-group-item active">CATALOGUE</a>
<?php
$tax = 'cat-web';
$terms = get_terms($tax,array('hide_empty'=>0));
foreach($terms as $term){
$attachID=get_tax_meta($term->term_id,'tax_thumbnail',$attachID);
$image_thumb=wp_get_attachment_image_src($attachID,'thumbnail');
?>
<a href="<?php echo get_term_link($term->slug,$tax);?>" class="list-group-item"><?php echo $term->name;?><span class="badge"><?php echo $term->count; ?></span></a>   
<?php }?>
</div>

<div class="list-group" align="left">
<a href="#" class="list-group-item active">CHRONICLE SERVICE</a>
<a href="office.html" class="list-group-item">Office</a>
<a href="office.html" class="list-group-item">Home</a>
<a href="lotus.html" class="list-group-item">Lotus</a>
<a href="web.html" class="list-group-item">Web design</a>
</div>

<div class="panel panel-success">
<div class="panel-heading"><div class="panel-title" align="left">SUPPORT/ HOTLINE</div></div>
<div class="panel-body" align="left">
<a href="#" class="" style="display:block;margin-bottom:10px;">
<i class="fa fa-phone-square fa-3x" style="color: #41BDCE;"></i>
<span style="display:inline-block">＋84-91-6631088<br>（日本人担当者)</span>
</a>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading"><div class="panel-title" align="left">SUPPORT/ CHAT ONLINE</div></div>
<div class="panel-body" align="left">
<a href="#" class="" style="display:block">
<i class="fa fa-skype fa-3x" style="color: #41BDCE;"></i>
<span style="display:inline-block;margin-left:10px;">skype<br>NICKNAME</span>
</a>
</div>
</div>
