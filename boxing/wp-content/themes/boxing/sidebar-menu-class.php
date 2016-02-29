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