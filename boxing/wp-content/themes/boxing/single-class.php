<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */

get_header(); ?>
<?php
    $lang = $_GET['lang'];
    if (!$lang) {
        $lang = 'ja';
    }
    $name = get_field('name', $post_id);
    $badge_active = get_field('badge-active', $post_id);
    $image = get_field('image', $post_id);
    $class_ = get_field('class', $post_id);
    $description = get_field('description', $post_id);
?>
<div class="container">

<div class="row">
<div class="col-lg-12">
<div align="center" class="heading">
<?php $topics = get_field('topic', 170); ?>
<?php
    if ($lang == 'ja') {
        $text_after = 'お問い合わせはこちらまで';
        $text_befor = 'お待ちしております';
    } else if ($lang == 'vi') {
        $text_after = 'Gọi cho chúng tôi ';
        $text_befor = ' để chọn lớp thích hợp';
    } else {
        $text_after = 'Call us today on ';
        $text_befor = ' start getting fit!';
    }
?>
<span><?php echo $text_after; ?><abbr><?php echo $topics[0]['address'][0]['tel'] ?></abbr><?php echo $text_befor; ?></abbr></span>
</div>
</div>
</div>

<div class="row show-grid">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 center-block">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="title-detail"><?php echo str_replace('<br>', '', $name); ?><small class="badge badge-active"><?php echo $badge_active; ?></small></h3></div>
<div class="panel-body">
<div class="row">
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-block" align="center"><img src="<?php echo $image['url'] ?>" class="img-responsive img-thumbnail"></div>
<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<table class="table table-bordered table-striped table-hover">
<?php if ($lang == 'vi') { ?>
    <thead><tr><th>TÊN LỚP</th><th>THỜI GIAN</th><th>GIÁ</th></tr></thead>

<?php } else if ($lang == 'ja') { ?>
    <thead><tr><th>クラス名</th><th>タイム</th><th>価格</th></tr></thead>

<?php } else { ?>
    <thead><tr><th>CLASS NAME</th><th>TIMES</th><th>PRICE</th></tr></thead>

<?php } ?>
<tbody>
<?php foreach($class_ as $class):  ?>
<tr>
<td><?php echo $class['class_name'] ?></td>
<td><?php echo $class['times'] ?></td>
<td align="right"><?php echo $class['price'] ?></td>
</tr>
<?php  endforeach; ?>

</tbody>

<tfoot>
<tr><td colspan="3">
<?php if ($lang == 'vi') { ?>
    Lệ phí tuyển sinh và lệ phí hàng tháng chưa bao gồm 10% VAT

<?php } else if ($lang == 'ja') { ?>
    年間申し込み割引、6ヶ月申し込み割引、3ヶ月申し込み割引をご用意しております。詳しくはお問い合わせ下さい。<br>
    入会金と月額料金にはVAT10%は含まれておりません。
<?php } else { ?>
    Entrance fee and monthly fee are not included 10% VAT

<?php } ?>
</td></tr>
</tfoot>

</table>
</div>
</div>
</div>
<div class="panel-footer">
<p align="justify"><?php echo $description; ?></p>
</div>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="bg-default block-right mn-scroll">
<div style="background-color: #000000;  color: #ffffff;  padding: 15px !important;  margin: -15px;">
<?php if ($lang == 'ja') { ?>
    クラス

<?php } else if ($lang == 'vi') { ?>
    LỚP HỌC

<?php } else { ?>
    CLASSES

<?php } ?>
</div>
<section>
<div class="content mCustomScrollbar" data-mcs-theme="minimal">
<ul style="margin-top:15px;">

<?php
     if ($lang == 'vi'){
        $cat = 37;
    } else if ($lang == 'ja') {
        $cat = 39;
    } else {
        $cat = 35;
    }
    $args = array(
        'cat'              => $cat,
        'posts_per_page'   => 20,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );
    $posts_arrays = get_posts( $args );
    $class_arrays = array();

    if($posts_arrays):
        foreach (range(1, count($posts_arrays)) as $number) {
            foreach($posts_arrays as $posts_array){
                if ($number == get_field('oder', $posts_array->ID)){
                    array_push($class_arrays, $posts_array);
                }
            }
        }

        foreach($class_arrays as $class_array):
            $name = get_field('name', $class_array->ID);
            $href = $class_array->guid;
            $name = str_replace('<br>', '', $name);
            echo '
            <li><a href="' . get_bloginfo('siteurl'). '&p='. $class_array->ID . '"><i class="fa fa-angle-right"></i> ' . $name . '</a></li>
            ';
        endforeach;
    endif;

?>
</ul>
</div>
</section>
</div>
</div>
</div>

</div>
<?php get_footer(); ?>
