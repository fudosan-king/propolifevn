<?php
function wp_head_customer() {
    do_action( 'wp_head_customer' );
}

if ( ! function_exists( 'load_elt_textdomain' ) ) {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    function load_elt_textdomain() {
        load_theme_textdomain( 'elt', $template_directory . '/languages' );
    }
}
add_action( 'after_setup_theme', 'load_elt_textdomain' );

function add_css() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());

    # css
    echo '<link rel="stylesheet" href="' . $template_directory . '/bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/font-awesome-4.4.0/css/font-awesome.css" type="text/css">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/style.css" type="text/css">';
}

function add_font_lemon() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '<link href="https://fonts.googleapis.com/css?family=Lemon" rel="stylesheet" type="text/css">';
}

function add_javascript() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());

    # javascript
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jquery.easing.1.3.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jquery.lazy.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jssor.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jssor.slider.js"></script>';
}

function add_jquery() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jquery.min.js"></script>';
}

function add_jquery_admin() {
    echo '<script type="text/javascript" src="' . get_bloginfo('siteurl') . '/wp-includes/js/jquery/jquery.js"></script>';
}

function add_fancybox() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());

    echo '<script type="text/javascript" src="' . $template_directory . '/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>';
    echo '<link rel="stylesheet" type="text/css" href="' . $template_directory . '/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen">';
    echo '<link rel="stylesheet" type="text/css" href="' . $template_directory . '/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5">';
    echo '<script type="text/javascript" src="' . $template_directory . '/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>';
    echo '
        <script type="text/javascript">
        jQuery(function($) {
            $(".fancybox-buttons").fancybox({
                openEffect  : "elastic",
                closeEffect : "elastic",
                prevEffect : "elastic",
                nextEffect : "elastic",
                closeBtn  : false,
                helpers : {
                    title : {
                        type : "inside"
                    },
                    buttons : {}
                },
                afterLoad : function() {
                    this.title = "Image " + (this.index + 1) + " of " + this.group.length + (this.title ? " - " + this.title : "");
                }
            });
        });
        </script>
    ';
}

function wpsites_nav_class($classes, $item){
    if (is_home() && ($classes[4] == 'menu-item-17' || $classes[4] == 'menu-item-18' || $classes[4] == 'menu-item-19')){
        $classes[] = "active";
    }
    return $classes;
}


if ( ! is_admin() ) {
    add_action( 'wp_head_customer', 'add_css', 0 );
    add_action( 'wp_head_customer', 'add_jquery', 0 );
    add_action( 'wp_head_customer', 'add_javascript', 15 );
    add_action( 'wp_head_customer', 'add_fancybox', 25 );
    add_filter('nav_menu_css_class' , 'wpsites_nav_class' , 10 , 2);
}

function add_javascript_slider() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '
        <script>
            jQuery(function ($) {
                var options = {
                    $AutoPlay: true,
                    $PauseOnHover: 1,
                    $ArrowKeyNavigation: true,
                    $SlideWidth:1400,
                    //$SlideHeight:650,
                    $SlideSpacing: 0,
                    $DisplayPieces: 2,
                    $ParkingPosition:250,
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                        $ChanceToShow:2,
                        $AutoCenter: 2,
                        $Steps: 1
                    }
                };

                var jssor_slider1 = new $JssorSlider$("slider", options);
                function ScaleSlider() {
                    var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                    if (parentWidth)
                        jssor_slider1.$ScaleWidth(Math.min(parentWidth,1900));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
            });
        </script>
    ';
}

function add_javascript_sliderAbout() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '
        <script>
            jQuery(function ($) {
                var options = {
                    $AutoPlay:true,
                    $AutoPlaySteps:4,
                    $AutoPlayInterval: 4000,
                    $PauseOnHover: 1,
                    $ArrowKeyNavigation: true,
                    $SlideDuration: 160,
                    $MinDragOffsetToSlide:10,
                    $SlideWidth:150,
                    //$SlideHeight: 150,
                    $SlideSpacing:10,
                    $DisplayPieces:6,
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

                var jssorCat = new $JssorSlider$("sliderAbout", options);
                function ScaleSlider() {
                    var bodyWidth = document.body.clientWidth-30;
                    if (bodyWidth)
                        jssorCat.$ScaleWidth(Math.min(bodyWidth,950));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
            });
        </script>
    ';
}

function add_javascript_sliderProduction() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '
        <script>
            jQuery(function ($) {
                var options = {
                    $AutoPlay:true,
                    $AutoPlaySteps:4,
                    $AutoPlayInterval: 4000,
                    $PauseOnHover: 1,
                    $ArrowKeyNavigation: true,
                    $SlideDuration: 160,
                    $MinDragOffsetToSlide:10,
                    $SlideWidth:100,
                    //$SlideHeight:70,
                    $SlideSpacing:13,
                    $DisplayPieces:4,
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

                var jssorCat = new $JssorSlider$("sliderProduction", options);
                function ScaleSlider() {
                    var bodyWidth = document.body.clientWidth-30;
                    if (bodyWidth)
                        jssorCat.$ScaleWidth(Math.min(bodyWidth,425));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
            });
        </script>
    ';
}

function add_script_footer(){
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jquery.simplr.smoothscroll.stellar.min.js"></script>';
    echo '
        <script>
            jQuery(function($) {
                $(window).load(function(){
                  $.stellar({responsive: true,horizontalScrolling: false});
                });
            });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery("img.lazy").lazy({
                    effect: "fadeIn",
                    effectTime:1500,
                    threshold: 0,
                    afterLoad: function(element) {
                        if(typeof $.fn.BlackAndWhite_init == "function"){
                            jQuery(element).parents(".lazy-item .lazy-container").BlackAndWhite_init();
                        }
                        setTimeout(function(){
                            element.parent(".lazy-container").addClass("lazyloaded");
                        },500)
                    }
                });
            });
        </script>
        ';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/functions.js"></script>';
}

add_action( 'wp_footer', 'add_script_footer', 0 );

function show_product_categories() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    $args = array(
        'number'     => $number,
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
        'include'    => $ids
    );

    $product_categories = get_terms( 'product_cat', $args );
    echo '
        <div class="wood-bg other-block">
        <div class="container">
        <div class="row">
        <div class="col-lg-12" align="center">
        <i class="fa fa-get-pocket" style="font-size: 40px;color: #ffffff;margin-top:-5px;"></i>
        <h3 style="font-size:35px;margin-bottom:0px;text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.51);">
    ';

    _e( 'その他の製品', 'elt' );

    echo'
        </h3>
        <small style="font-size: 16px;margin-bottom: 15px;display: block;">
    ';
    _e( 'あなたの玄関口に毎週配信！', 'elt' );
    echo '
        </small>
        </div>
        <div class="clearfix"></div>
        ';

    foreach ($product_categories as $product_categorie) {
        $thumbnail_id = get_woocommerce_term_meta( $product_categorie->term_id, 'thumbnail_id', true  );

        if ( $thumbnail_id ) {
            $image = wp_get_attachment_image_src( $thumbnail_id, array(360, 252) );
            $image = $image[0];
        } else {
            $image = wc_placeholder_img_src();
        }



        echo '
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
            <div class="thumbnail">
            <a href="' . get_bloginfo('url') . '/?product_cat=' . $product_categorie->slug . '" class="lazy-item">
            <span class="list-title">' . $product_categorie->name . '</span>
            <span class="lazy-container">
            <span class="lazy_preloader"></span>
        ';

        if ( $image ) {
            $image = str_replace( ' ', '%20', $image );

            echo '<img src="' . $template_directory . '/images/blank.gif" class="lazy img-responsive" data-src="' . esc_url( $image ) . '" alt="' . esc_attr( $product_categorie->name ) . '"/>';
        }

        echo'
            </span>
            </a>
            <p>
            ';

        _e( $product_categorie->description, 'qtranslate' );

        echo '
            </p>
            <a class="btn btn-default" href="' . get_bloginfo('url') . '/?product_cat=' . $product_categorie->slug . '">
            <span>
        ';

        _e( '続きを読みます', 'elt' );

        echo '
            </span></a>
            </div>
            </div>
        ';
    }

    echo '
        </div>
        </div>
        </div>
    ';
}

function show_product_categories_index() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    $args = array(
        'number'     => $number,
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
        'include'    => $ids
    );

    $product_categories = get_terms( 'product_cat', $args );
    echo '
        <div class="bg-default">
        <div class="container">
        <div class="row">
        <div class="col-lg-12" align="center">
        <h3>
    ';

    _e( 'その他の製品', 'elt' );

    echo'
        </h3>
    ';
    echo '
        </div>
        <div class="clearfix"></div>
        ';

    foreach ($product_categories as $product_categorie) {
        $thumbnail_id = get_woocommerce_term_meta( $product_categorie->term_id, 'thumbnail_id', true  );

        if ( $thumbnail_id ) {
            $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
            $image = $image[0];
        } else {
            $image = wc_placeholder_img_src();
        }

        echo '
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
            <a href="' . get_bloginfo('url') . '/?product_cat=' . $product_categorie->slug . '" class="lazy-item">
            <span class="list-title">' . $product_categorie->name . '</span>
            <span class="lazy-container">
            <span class="lazy_preloader"></span>
        ';

        if ( $image ) {
            $image = str_replace( ' ', '%20', $image );

            echo '<img src="' . $template_directory . '/images/blank.gif" class="lazy img-responsive" data-src="' . esc_url( $image ) . '" alt="' . esc_attr( $product_categorie->name ) . '"/>';
        }

        echo'
            </span>
            </a>
            <p>
            ';

        _e( $product_categorie->description, 'qtranslate' );

        echo '
            </p>
            <a class="btn btn-default" href="' . get_bloginfo('url') . '/?product_cat=' . $product_categorie->slug . '">
            <span>
        ';

        _e( '続きを読みます', 'elt' );

        echo '
            </span>
            </a>
            </div>
        ';
    }

    echo '
        </div>
        </div>
        </div>
    ';
}

function show_gallery() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    $galery_pictures = get_field('galery_picture', 29);
    $index = 1;

    echo '
        <div id="sliderAbout" style="position: relative; top: 0px; left: 0px; width:950px; height:105px; overflow: hidden;margin-top:10px;padding-bottom:20px">
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
        <div style="position: absolute; display: block; background: url(' . $template_directory . '/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
        </div>

        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:950px; height:105px; overflow: hidden;">
    ';

    foreach ($galery_pictures as $galery_picture):
        echo '<div align="center"><a href="' . $galery_picture['image']['url'] . '" class="fancybox-buttons" data-fancybox-group="button"><img src="' . $galery_picture['image']['url'] . '" class="img-responsive" alt="' . $galery_picture['title'] . '"></a></div>';
        $index += 1;
     endforeach;

    echo '
        </div>
        </div>
    ';
}

function show_slider() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '
        <div align="center">
        <div id="slider" style="position: relative; top: 0px; left: 0px; width:1900px;height:650px; overflow: hidden;">
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:1900px; height:650px;overflow: hidden;">
        <div align="center"><img u="image" src="' . $template_directory . '/images/slides/3.jpg" class="lazy" />
        <div class="slider-caption">';

    _e('食肉の加工', 'elt');

    echo '</div>
        <div class="slider-text">';

    _e('当社では、安心で安全な商品とサービスを通じて、 常にお客様に満足して頂く事を念頭に 置いています。', 'elt');

    echo '</div>
        </div>

        <div align="center"><img u="image" src="' . $template_directory . '/images/slides/2.jpg" class="lazy" />
        <div class="slider-caption">';

    _e('食肉の加工', 'elt');

    echo '</div>
        <div class="slider-text">';

    _e('当社では、安心で安全な商品とサービスを通じて、 常にお客様に満足して頂く事を念頭に 置いています。', 'elt');

    echo '</div>
        </div>

        <div align="center"><img u="image" src="' . $template_directory . '/images/slides/4.jpg" class="lazy" />
        <div class="slider-caption">';

    _e('食肉の加工', 'elt');

    echo '</div>
        <div class="slider-text">';

    _e('当社では、安心で安全な商品とサービスを通じて、 常にお客様に満足して頂く事を念頭に 置いています。', 'elt');

    echo '</div>
        </div>

        <div align="center"><img u="image" src="' . $template_directory . '/images/slides/3.jpg" class="lazy" />
        <div class="slider-caption">';

    _e('食肉の加工', 'elt');

    echo '</div>
        <div class="slider-text">';

    _e('当社では、安心で安全な商品とサービスを通じて、 常にお客様に満足して頂く事を念頭に 置いています。', 'elt');

    echo '</div>
        </div>

        </div>
        <span u="arrowleft" class="jssora13l" style="top: 123px; left: 30px;"></span>
        <span u="arrowright" class="jssora13r" style="top: 123px; right: 30px;"></span>
        </div>
        </div>
    ';
}

function add_services_clients() {
    $template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
    echo '
        <div class="bg-contact">
        <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12" align="center"><img src="' . $template_directory . '/images/top-logo.png" class="img-responsive"></div>
        <div class="col-md-9 col-sm-8 col-xs-12 center-block" align="left">
        <address>
    ';

    echo '<h2>';
    _e('ELT VIETNAM CO.,LTD概要', 'elt');
    echo '</h2>';

    echo '<p>';
    _e('営業時間:月曜日 – 金曜日  8:00 - 17:00', 'elt');
    echo '</p>';

    echo '<p>';
    _e( 'アドレス: Lot M-5A, Trung Tam st, Long Hau Expand lP, Long Hau Commune, Can Giuoc Dist, Long An Province', 'elt' );
    echo '</p>';

    echo '<p>';

    _e('電話', 'elt');
        ;
    echo ': <a href="tel:08 3873 4081" class="tel">08 3873 4081</a></p>';

    echo '<p>Email: info-eltvn@eltvn.com</p>';

    echo '</p>';
    _e('＊自社加工工場は、ベトナムホーチミン市より車で40分程度の中心地からとても近いロンハウ工業団地内にございます。', 'elt');
    echo '</p>';

    echo '
        </address>
        <div class="socials">
        <div class="socials_wrapper">
        <a class="fa fa-facebook" href="https://www.facebook.com/ELT-VIET-NAM-COLTD-1539948359594705/timeline/" target="_blank"></a>
        <a class="fa fa-twitter" href="#" target="_blank"></a>
        <a class="fa fa-google-plus" href="#" target="_blank"></a>
        </div>
        </div>

        </div>
        </div>
        </div>
        </div>


        <div class="ourservice" data-stellar-background-ratio="0.5">
        <div class="container">
        <h3 align="left">';

     _e('私たちのサービス', 'elt');

    echo '</h3>
        <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-archive"></i><span class="panel-title">';

    _e('加工', 'elt');

    echo '</span></div>
        <div class="panel-body"><p align="justify">';

    _e('温度管理、衛生管理が徹底した自社加工工場で、高品質の新鮮なお肉をお客様がすぐに使えるようにカット加工、ミンチ加工、パン粉付け加工、加熱加工などの加工をいたします。お客様が調理場で均一に加工する手間とコストの負担を省きます。', 'elt');

    echo '</p></div>
        </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-truck"></i><span class="panel-title">';

    _e('配送', 'elt');

    echo '</span></div>
        <div class="panel-body"><p align="justify">';

    _e('鮮度を保った状態でお肉をお届け致します。日本通運様と配送に関する業務提携を行い、食料品スーパー様、飲食店様、ご家庭などに柔軟に個別配送を行っております。', 'elt');

    echo '</p></div>
        </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-user"></i><span class="panel-title">';

    _e('パートナー', 'elt');

    echo '</span></div>
        <div class="panel-body"><p align="justify">';

    _e('お肉の加工以外にも様々な商品作りのご相談が可能です。新鮮な野菜、魚、鶏肉なども仕入れることができるので、焼肉セットや鍋セットなどの商品作りにも対応可能です。', 'elt');

    echo '</p></div>
        </div>
        </div>

        </div>
        </div>
        </div>

        <div class="container">
        <h3 align="left">';

    _e('当社のクライアント', 'elt');

    echo '</h3>
        <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-cutlery"></i><span class="panel-title">';

    _e('レストラン', 'elt');

    echo '</span>
        </div>
        <div class="panel-body"><img src="http://www.eltvn.com/wp-content/uploads/2015/09/4.jpg" class="lazy img-responsive" alt="鶏肉" style="display: block;"></div>
        </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-home"></i><span class="panel-title">';

    _e('ホテル', 'elt');

    echo '</span>
        </div>
        <div class="panel-body"><img src="http://www.eltvn.com/wp-content/uploads/2015/09/6.jpg" class="lazy img-responsive" alt="鶏肉" style="display: block;"></div>
        </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-shopping-cart"></i><span class="panel-title">';

    _e('ショップ', 'elt');

    echo '</span>
        </div>
        <div class="panel-body"><img src="http://www.eltvn.com/wp-content/uploads/2015/09/5.jpg" class="lazy img-responsive" alt="鶏肉" style="display: block;"></div>
        </div>
        </div>

        </div>
        </div>
    ';
}

function theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    // $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    // $site_description = get_bloginfo( 'description', 'display' );
    // if ( $site_description && ( is_home() || is_front_page() ) ) {
    //     $title .= " $sep $site_description";
    // }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

?>

