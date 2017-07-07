<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">

    <?php
        $title = !empty($post->post_title) ? $post->post_title : get_option('blogname');
        $description = get_option('blogdescription');
        $keywords = "";

        $isFrontPage = is_front_page() ? 'true' : 'false';

        /* AIO SEO Pack integrate */
        $aioseo = get_option('aioseop_options');
        $aioseo_use_static_info = $aioseo['aiosp_use_static_home_info'];

        if ( $aioseo_use_static_info == 0 ){
            $title = !empty($aioseo['aiosp_home_title']) ? $aioseo['aiosp_home_title'] : $title;
            $keywords = !empty($aioseo['aiosp_home_keywords']) ? $aioseo['aiosp_home_keywords'] : $keywords;
            $description = !empty($aioseo['aiosp_home_description']) ? $aioseo['aiosp_home_description'] : $description;
        }else{
            $idFrontPage = get_option( 'page_on_front' );
            $frontPost = get_post($idFrontPage);

            $title = !empty($frontPost->post_title) ? $frontPost->post_title : get_option('blogname');

            $aioseop_is_post_disabled = get_post_meta($idFrontPage, '_aioseop_disable', true);
            if (empty($aioseop_is_post_disabled)){
                $title = !empty(get_post_meta($idFrontPage, '_aioseop_title', true)) ? get_post_meta($idFrontPage, '_aioseop_title', true) : $title;
                $keywords = !empty(get_post_meta($idFrontPage, '_aioseop_keywords', true)) ? get_post_meta($idFrontPage, '_aioseop_keywords', true) : $keywords;
                $description = !empty(get_post_meta($idFrontPage, '_aioseop_description', true)) ? get_post_meta($idFrontPage, '_aioseop_description', true) : $description;
            }
        }

        if ( !is_front_page() ):

            $collect_post_metas = get_post_meta(get_the_id());
            $aioseop_is_post_disabled = get_post_meta(get_the_id(), '_aioseop_disable', true);

            if (empty($aioseop_is_post_disabled)){
                $title = !empty(get_post_meta(get_the_id(), '_aioseop_title', true)) ? get_post_meta(get_the_id(), '_aioseop_title', true) : $title;
                $keywords = !empty(get_post_meta(get_the_id(), '_aioseop_keywords', true)) ? get_post_meta(get_the_id(), '_aioseop_keywords', true) : $keywords;
                $description = !empty(get_post_meta(get_the_id(), '_aioseop_description', true)) ? get_post_meta(get_the_id(), '_aioseop_description', true) : $description;

            }

        endif;

    ?>

    <title><?php $title ?></title>


    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
        $secHeadTag = get_post_by_slug('head-above-tag');
        the_field('extras_scripts_on_head_tag', $secHeadTag->ID)
    ?>

</head>

<body>

    <?php
        the_field('extras_scripts_on_body_tag', $secHeadTag->ID)
    ?>

    <div id="page">


        <?php
            if (is_front_page())
                get_template_part( TEMPLPART.'/header-nav', 'home' );
            else
                get_template_part( TEMPLPART.'/header-nav', 'other' );
        ?>
