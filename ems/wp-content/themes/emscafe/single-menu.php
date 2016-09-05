<?php get_header();?>
<body class="body-pt">
<header class="header" role="masthead"><div class="container"><?php get_sidebar('main-menu');?></div></header>

<div class="bg-default">
<div class="container">
<div class="row">
<div class="col-lg-12">

<div class="media">
<?php while ( have_posts() ) : the_post();$price = get_post_meta($post->ID,'price',true);$masp = get_post_meta($post->ID,'ma-sp',true); ?>
<div class="col-lg-6" align="center">
<div class="thumbnail" style="background-color:#ffffff;height:auto;">
<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
</div>
</div>


<div class="col-lg-6" align="left">
<div class="caption" align="left" style="margin-top:75px;padding-bottom:30px;">
<h1 style="font-size: 30px;"><?php the_title();?></h1>
<div style="font-size:12px;">SKU:<?php echo $masp;?></div>
<h4 class="offer-price" style="color: #c00;font-size:28px;">Price: <?php echo ($price!=''?number_format($price):0);?> VND</h4>
<div><span>数量: </span><input type="text" class="form-control input-sm" name="soluong" id="soluong" style="width:50px;"></div>
<div style="border-bottom: 2px solid #C36666;display:inline-block;text-transform:uppercase">説明</div>
<div><p style="font-size:12px;text-align:justify;margin:15px 0px"><?php the_content(); ?></p></div>

<div align="left" class="cart">
<button class="btn btn-lg btn-danger addtocart" data-toggle="modal" data-target="#shopConfirm"><?php echo __('CHO VÀO GIỎ HÀNG','ems'); ?><i class="fa fa-plus-square" style="margin-left:5px;"></i></button>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="shopConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" align="left">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo __('BẠN MUỐN MUA SẢN PHẨM NÀY ?','ems'); ?></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-4"><?php the_post_thumbnail($post->ID,array('class' =>'img-responsive'));?></div>
<div class="col-md-8">
<div><span><?php the_title();?></span></div>
<div style="font-size:12px;">SKU:<?php echo $masp;?></div>
<div><span><?php echo __('GIÁ','ems'); ?>: <?php echo ($price!=''?number_format($price):0);?> VND</span></div>
</div>
</div>
</div>
<div class="modal-footer">       
<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('HỦY BỎ','ems'); ?></button>
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="ajax_add_list_cart('<?php echo $post->ID;?>','<?php echo get_page_ID_by_slug('ajax-cart');?>');"><?php echo __('MUA HÀNG','ems'); ?></button>
</div>
</div>
</div>
</div>
<!-- END Modal -->
<?php endwhile;wp_reset_query();?>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
<div class="pt-bottom"></div>

<div align="center" class="hidden-xs"><h2 class="heading">menu Drink</h2></div>

<div class="container">
<div class="row show-grid">
<?php
$arg = array(
'post_type' => 'menu',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>4,
'taxonomy'=>'cat-menu',
'term' =>'drink'
);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
$price = get_post_meta($post->ID,'price',true);
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="listDrink">
<a href="<?php echo get_permalink($post->ID);?>"><?php the_post_thumbnail('medium',array('class'=>'img-responsive'));?>
<div class="caption" align="center">
<h4><?php the_title();?></h4>
<span style="font-size:12px;">SKU:<?php echo $masp;?></span>
<span>Price: <?php echo ($price!=''?number_format($price):0);?> VND</span>
<p>Gentlemen and women class can come for.</p>
<div class="btn btn-danger">View menu</div>
</div>
</a>
</div>
</div>
<?php endwhile;wp_reset_query();?>
</div>
<div class="row"><div class="col-lg-12" align="center"><a href="" class="btn btn-lg btn-danger" style="margin-bottom:30px;">VIEW MORE</a></div></div>
</div>

<?php get_footer();?>