<?php
/*Template Name: 360 Perth - Page Template*/
?>


<?php get_header(); ?>

<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/three.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/CanvasRenderer.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/Projector.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/DeviceOrientationControls.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/StereoEffect.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/D.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/uevent.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/doT.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/NoSleep.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/dist/photo-sphere-viewer.min.js"></script>

<script>
    isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
        isMobile = true;
    }
</script>

<div class="page_360perth">

    <!-- <section class="banner_360perth">
        <iframe id="ado-26041" src="about:blank" frameborder="0" width="100%" height="720" webkitAllowFullScreen="1" mozallowfullscreen="1" allowFullScreen="1"></iframe><script type="text/javascript">document.getElementById("ado-26041").setAttribute("src", "//www.vroptimal-3dx-assets.com/content/26041?player=true&autoplay=false&referer=" + encodeURIComponent(window.location.href));</script><noscript><a href='https://www.omnivirt.com/content/26041/'>Virtual Reality Marketing</a>. <a href='https://www.omnivirt.com/'>Virtual Reality Advertising</a></noscript><script type="text/javascript" src="//remote.vroptimal-3dx-assets.com/scripts/vroptimal.js"></script>
    </section> -->

    <?php 
        $imgObjecField = get_field_object('banner_sub_bg_image');
        $img = get_field('banner_sub_bg_image');
        $imgUrl = $img['url'];
        $title = get_the_title();

        if (isset($imgUrl) && !empty($imgUrl)){
            $is360VR = get_field('banner_bg_image_type');
            if (!empty($is360VR) && $is360VR == 1){
                $key =  $imgObjecField['key'];
                ?>
                    <section class="banner_360perth">
                        <div id="banner_sub_bg_image"></div>
                    </section>

                    <script>
                        var heightResponsive = isMobile ? 320 : 720;
                        var PSV = new PhotoSphereViewer({
                            panorama: '<?php echo $imgUrl ; ?>',
                            container: 'banner_sub_bg_image',
                            loading_img: 'https://chronicle.propolifevietnam.com/wp-content/uploads/2018/06/android-chrome-256x256.png',
                            navbar: [
                            'autorotate', 
                            'zoom', 
                          // 'download', 
                          // 'markers',
                          'caption', 
                          'gyroscope', 
                          'stereo', 
                          'fullscreen'
                          ],
                          mousewheel: false,
                          default_fov: 100,
                          // time_anim: false,
                          time_anim: 2000,
                          anim_speed: '270dpm',
                        // caption: 'Estate 360 Demo &copy; Propolife Vietnam',
                        size: {
                            height: heightResponsive,
                            // width: 100%
                        }
                    });
                </script>
                <?php
            }else{
                ?>
                    <section class="banner_sub">
                        <div class="swiper-container">
                            <div class="parallax-bg" style="background-image:url('<?php echo $imgUrl; ?>')" data-swiper-parallax="-23%"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="title" data-swiper-parallax="-300"><?php echo $title; ?></div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
            }
        }
    ?>


    <?php 
        $benefitObject = get_field_object('360_benefit');
        $benefit_group = get_field('360_benefit');
        $label = $benefitObject['label'];

        $benefit_img = $benefit_group['360_benefit_img'];
        $benefit_imgUrl = $benefit_img['url'];

        $benefit_content = $benefit_group['360_benefit_content'];
    ?>
        
    <section class="section_benefits">
        <h2 class="headline"><?php echo $label; ?></h2>
        <div class="container">
          <div class="template_content">
            <div class="row vertical">
              <div class="col-xs-12 col-sm-7">
                <?php 
                if (isset($benefit_imgUrl) && !empty($benefit_imgUrl)){
                    $is360VR = $benefit_group['360_benefit_img_type'];
                    if (!empty($is360VR) && $is360VR == 1){
                        ?>

                        <div id="360_benefit_img"></div>

                        <script>
                            var heightResponsive = isMobile ? 210 : 410;
                            var PSV = new PhotoSphereViewer({
                                panorama: '<?php echo $benefit_imgUrl ; ?>',
                                container: '360_benefit_img',
                                loading_img: 'https://chronicle.propolifevietnam.com/wp-content/uploads/2018/06/android-chrome-256x256.png',
                                navbar: [
                                'autorotate', 
                                'zoom', 
                                    // 'download', 
                                    // 'markers',
                                    'caption', 
                                    'gyroscope', 
                                    'stereo', 
                                    'fullscreen'
                                    ],
                                    mousewheel: false,
                                    default_fov: 100,
                                    // time_anim: false,
                                    time_anim: 2000,
                                    anim_speed: '270dpm',
                                    // caption: 'Estate 360 Demo &copy; Propolife Vietnam',
                                    size: {
                                        height: heightResponsive,
                                    // width: 100%
                                }
                            });
                        </script>

                        <?php
                    }else{
                        ?>
                        <img src="<?php echo $benefit_imgUrl ; ?>" alt="">
                        <?php
                    }
                }
                ?>
                
</div>
<div class="col-xs-12 col-sm-5">
    <div class="benefits_text">
     <?php echo $benefit_content; ?>
  </div>

</div>
</div>
</div>
</div>
</section>

<?php 
    $correspondingObject = get_field_object('corresponding_device');
    $corresponding_group = get_field('corresponding_device');
    $label = $correspondingObject['label'];

    $corresponding_device_img = $corresponding_group['corresponding_device_img'];
    $corresponding_content = $corresponding_group['corresponding_device_content'];
    $corresponding_device_link = $corresponding_group['corresponding_device_link'];
?>

<section class="section_correspondingDevice">
    <h2 class="headline"><?php echo $label; ?></h2>
    <div class="container">
      <div class="template_content">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <img class="img-responsive" src="<?php echo $corresponding_device_img['url']; ?>">
            <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2">
                <?php echo $corresponding_content; ?>

                <?php if (!empty($corresponding_device_link)):
                ?>
                    <a href="<?php echo $corresponding_device_link['url'] ?>" class="btn btn-lg btn_consultProduction" target="<?php echo $corresponding_device_link['target']; ?>" ><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $corresponding_device_link['title']; ?> <i class="i_arrowright"></i></a>
                <?php
                endif; ?>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>

<?php 
    $product_period_feeObject = get_field_object('product_period_fee');
    $product_period_fee_group = get_field('product_period_fee');
    $label = $product_period_feeObject['label'];

    $background_img = $product_period_fee_group['background_img'];
    $background_imgURL = wp_get_attachment_image_url( $background_img['ID'], $size = 'full', $icon = false );

    $product_period_fee_content = $product_period_fee_group['product_period_fee_content'];
    $product_period_fee_link = $product_period_fee_group['product_period_fee_link'];

    $product_period_fee_steps = $product_period_fee_group['product_period_fee_steps'];
?>

<section class="section_productionPeriod_fee" style="background: url(<?php echo $background_imgURL; ?>) no-repeat;">
    <h2 class="headline"><?php echo $label; ?></h2>
    <div class="container productionPeriod_fee_content">
      <div class="template_content">
        <div class="row">
          <div class="col-xs-12 col-sm-12 text-center">
            <?php echo $product_period_fee_content; ?>
            
            <?php 
                if (count($product_period_fee_steps)>0){
                    echo '<div class="w_btn_service clearfix">';
                    foreach ($product_period_fee_steps as $i => $step) {
                        $step_link = $step['step_link'];
                        if (!empty($step_link))
                            echo '<a class="btn_service" href="'.$step_link['url'].'">'.$step['step_content'].'</a>';
                    }
                    echo '</div>';
                }

            ?>
          

          <?php if (!empty($product_period_fee_link)):
            ?>
                <a href="<?php echo $product_period_fee_link['url'] ?>" class="btn btn-lg btn_consultProduction" target="<?php echo $product_period_fee_link['target']; ?>" ><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $product_period_fee_link['title']; ?> <i class="i_arrowright"></i></a>
            <?php
            endif; ?>
          
      </div>
  </div>
</div>
</div>
<div class="overlay_white"></div>
</section>

<?php 
    $product_applyObject = get_field_object('product_apply');
    $product_apply_group = get_field('product_apply');
    $label = $product_applyObject['label'];

    $headline = $product_apply_group['headline'];
    $content_block = $product_apply_group['content_block'];
    $product_apply_content = $product_apply_group['product_apply_content'];
    $product_apply_link = $product_apply_group['product_apply_link'];
?>

<section class="section_support">
    <h2 class="headline"><?php echo $label; ?></h2>
    <div class="container">
        <div class="template_content">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h4 class="sub_headline"><?php echo $headline; ?></h4>
                    <div class="row">

                        <?php 
                        if (count($content_block)>0){

                            foreach ($content_block as $i => $block) {
                                echo '<div class="col-xs-12 col-sm-4 text-center">
                            <div class="section_support_content">';
                                echo $block['content'];
                                 echo '</div>
                            </div>';
                            }
                           
                        }

                        ?>



                    </div>
                    <?php 
                    echo $product_apply_content; 

                    if (!empty($product_apply_link)):
                        ?>
                        <a href="<?php echo $product_apply_link['url'] ?>" class="btn btn-lg btn_consultProduction" target="<?php echo $product_apply_link['target']; ?>" ><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $product_apply_link['title']; ?> <i class="i_arrowright"></i></a>
                        <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>  
</section>

<hr>
</div>



<?php get_footer(); ?>