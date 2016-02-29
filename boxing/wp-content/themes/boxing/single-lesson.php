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
    $post_id = get_post()->ID;
    $oder = get_field('oder', $post_id);
    $name = get_field('name', $post_id);
    $id_youtube = get_field('id_youtube', $post_id);
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
        $lesson = 'レッスン';
    } else if ($lang == 'vi') {
        $text_after = 'Gọi cho chúng tôi ';
        $text_befor = ' để chọn lớp thích hợp';
        $lesson = 'Bài học';
    } else {
        $text_after = 'Call us today on ';
        $text_befor = ' start getting fit!';
        $lesson = 'LESSON';
    }
?>
<span><?php echo $text_after; ?><abbr><?php echo $topics[0]['address'][0]['tel'] ?></abbr><?php echo $text_befor; ?></abbr></span>
</div>
</div>
</div>

<div class="row show-grid">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 center-block">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="title-detail"><?php echo $lesson; ?> <?php echo str_replace('<br>', '', $oder); ?><small class="badge badge-active"><?php echo $badge_active; ?></small></h3></div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12" align="left">
            <h4><?php echo $name; ?></h4>
            <article>
                <iframe width="100%" height="475" src="https://www.youtube.com/embed/<?php echo $id_youtube; ?>" frameborder="0" allowfullscreen=""></iframe>
            </article>
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
    <?php echo $lesson; ?>
</div>
<section>
<div class="content mCustomScrollbar" data-mcs-theme="minimal">
<ul style="margin-top:15px;">

<?php
    if ($lang == 'vi'){
        $cat = 68;
    } else if ($lang == 'ja') {
        $cat = 70;
    } else {
        $cat = 66;
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
            $oder = get_field('oder', $class_array->ID);
            $href = $class_array->guid;
            $name = str_replace('<br>', '', $name);
            echo '
            <li><a href="' . get_bloginfo('siteurl'). '&p='. $class_array->ID . '"><i class="fa fa-angle-right"></i> ' . $lesson . ' ' . $oder . '</a></li>
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
