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
?><!DOCTYPE html>
<?php
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
$lang = get_bloginfo('language_code');
?>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" href="<?php echo $template_directory ?>/images/favico.gif" type="image/gif" sizes="16x16">
    <?php
        $post_id = get_post()->ID;
        $title_seo = get_field('title_seo', $post_id);
        $title_og = get_field('title_og', $post_id);
        $description_seo = get_field('description_seo', $post_id);
        $description_og = get_field('description_og', $post_id);
        $keywords = get_field('keywords', $post_id);
    ?>
    <?php if (($title_seo) && ($description_seo) && !(is_home())) { ?>
        <title><?php echo $title_seo; ?></title>
        <meta property="og:title" content="<?php echo $title_og; ?>">
        <meta property="og:description" content="<?php echo $description_og; ?>">
        <meta name="description" content="<?php echo $description_seo; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">
    <?php } else { ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <?php if ($lang == 'vi'){ ?>
            <meta property="og:description" content="“samurai-boxing-gym.vn” là wedsite chính thức của câu lạc bộ quyền anh Samurai đến từ Nhật Bản, có trụ sở tại thành phố Hồ Chí Minh. Nếu bạn đang có dự định bắt đầu thử sức với một môn thể thao nào đó với mục tiêu mong muốn là một thân hình lí tưởng, gọn gàng, săn chắc; hoặc là bạn ước mơ trở thành một võ sĩ quyền anh chuyên nghiệp… Hãy liên hệ với chúng tôi. Tuổi tác, giới tính hoàn toàn không phải là vấn đề đối với môn thể thao quyền anh này. Vì vậy, hãy đừng do dự mà tham gia vào môn thể thao yêu thích của bạn ngay bây giờ nhé!!!">
            <meta name="description" content="“samurai-boxing-gym.vn” là wedsite chính thức của câu lạc bộ quyền anh Samurai đến từ Nhật Bản, có trụ sở tại thành phố Hồ Chí Minh. Nếu bạn đang có dự định bắt đầu thử sức với một môn thể thao nào đó với mục tiêu mong muốn là một thân hình lí tưởng, gọn gàng, săn chắc; hoặc là bạn ước mơ trở thành một võ sĩ quyền anh chuyên nghiệp… Hãy liên hệ với chúng tôi. Tuổi tác, giới tính hoàn toàn không phải là vấn đề đối với môn thể thao quyền anh này. Vì vậy, hãy đừng do dự mà tham gia vào môn thể thao yêu thích của bạn ngay bây giờ nhé!!!">
            <meta name="keywords" content="samurai boxing gym, ho chi minh, viet nam, thể hình, thể thao thể hình, fitness, câu lạc bộ fitness">
        <?php  } else if ($lang == 'ja') { ?>
            <meta property="og:description" content="ベトナムホーチミン市のサムライボクシングジム公式HPです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂けるレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="description" content="ベトナムホーチミン市のサムライボクシングジム公式HPです。何かスポーツを始めたい、理想の体型を目指したいなどフィットネス目的の方から本格的にボクシングをしたいという方まで、ご満足頂けるレッスンになっています。サムライボクシングジムは、ご年齢、性別問わずに楽しんで頂ける日系ボクシングジムです。">
            <meta name="keywords" content="サムライボクシングジム,ホーチミン,ベトナム,ジム,スポーツジム,スポーツ,フィットネスクラブ,フィットネス,汗を流す公園,運動">
        <?php } else { ?>
            <meta property="og:description" content="“samurai-boxing-gym.vn” is official website  of Samurai boxing club from Japan, based in Ho Chi Minh City. If you are planning on starting to try a sport that the desired goal is an ideal body, neat and firm; or you are dreaming of becoming a professional boxer ... Please contact us. Age, sex is not absolutely a matter for the sport of boxing. So, please do not be hesitate to engage in  your favorite sport now !!!">
            <meta name="description" content="“samurai-boxing-gym.vn” is official website  of Samurai boxing club from Japan, based in Ho Chi Minh City. If you are planning on starting to try a sport that the desired goal is an ideal body, neat and firm; or you are dreaming of becoming a professional boxer ... Please contact us. Age, sex is not absolutely a matter for the sport of boxing. So, please do not be hesitate to engage in  your favorite sport now !!!">
            <meta name="keywords" content="samurai boxing gym, ho chi minh, viet nam, gym, sport gym, fitness club,park,">
        <?php } ?>
    <?php } ?>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
    <?php
    if (is_home()){
    ?>
    <script>
        jQuery(function ($) {
            var _SlideshowTransitions = [{ $Duration: 1200, $Opacity: 2 }];
            var options = {
                $FillMode:2,
                $AutoPlay: true,
                $AutoPlayInterval: 2000,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideEasing: $JssorEasing$.$EaseOutQuint,
                $SlideDuration: 800,
                $MinDragOffsetToSlide: 20,
                $SlideSpacing: 0,
                $DisplayPieces: 1,
                $ParkingPosition: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1,
                    $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: _SlideshowTransitions,
                    $TransitionsOrder: 1,
                    $ShowLink: true
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow:2,
                    $AutoCenter: 1,
                    $Steps: 1,
                    $Lanes: 1,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Orientation: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 2,
                    $Steps: 1
                }
            };

            var jssorslider = new $JssorSlider$("slider", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssorslider.$ScaleWidth(Math.min(bodyWidth, 1900));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        });
    </script>
    <?php
    }
    if (!is_page( 70 ) && !is_page( 72 ) && !is_page( 74 )){
    ?>
    <script>
        jQuery(function ($) {
            var options = {
                $AutoPlay:true,
                $AutoPlaySteps:4,
                $AutoPlayInterval: 4000,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideDuration: 160,
                $MinDragOffsetToSlide: 20,
                $SlideWidth:150,
                //$SlideHeight: 150,
                $SlideSpacing:20,
                $DisplayPieces:8,
                $ParkingPosition: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1,
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 1,
                    $Steps:4,
                    $Lanes: 1,
                    $SpacingX: 0,
                    $SpacingY: 0,
                    $Orientation: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow:0,
                    $AutoCenter: 2,
                    $Steps: 4
                }
            };

            var jssorCat = new $JssorSlider$("sliderCat", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth-30;
                if (bodyWidth)
                    jssorCat.$ScaleWidth(Math.min(bodyWidth, 1900));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        });
    </script>
    <?php
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox-buttons').fancybox({
                openEffect  : 'elastic',
                closeEffect : 'elastic',
                prevEffect : 'elastic',
                nextEffect : 'elastic',
                closeBtn  : false,
                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons : {}
                },
                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68375920-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body <?php if (is_page('Detail') || is_home() || is_single()){ echo 'class="body-parttern"';} body_class(); ?>>

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <h1 class="h1tag"><a class="navbar-brand" href="<?php echo get_bloginfo('siteurl'); ?>"><img src="<?php echo( get_header_image() ); ?>" width="320" height="94" class="img-responsive" alt="サムライボクシングジムは、ベトナムホーチミン市の日系ボクシングジムです。"></a></h1>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <?php
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu-header',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                ?>
            </div>
        </div>
    </nav>
</header>

<div class="container navbar-fixed-top">
    <ul class="select-lang">
    <?php
        pll_the_languages( array(
           'show_flags' => 1,
           'dropdown' => 0,
           'show_names' => 0,
    ));
    ?>
    </ul>
</div>
