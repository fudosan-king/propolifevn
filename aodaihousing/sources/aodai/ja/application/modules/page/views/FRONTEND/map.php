<div class="wrapper-content-block">
    <div class="content-search-block common-rows">
        <div class="container">
            <!-- Breadcums -->
            <?php 
                // File store under folder application/views/FRONTEND/breadcums.php
                echo $this->load->view('FRONTEND/breadcums');
            ?>

            <div class="row">
                <div class="map-content">
                    <div class="description-map">
                        <p>地図上の区をクリックして下さい。 
                            <br> 区の情報と指定した区のマンション、サービスアパートが下記に表示されます。
                        </p>
                    </div><!-- end .description-map -->
                    
                    <div id="drawing"></div><!-- end #drawing -->
                    <div class="heading-product heading-map">
                        <?php
                            echo lang('quan_1');
                        ?>
                    </div><!-- end .heading-product -->
                    <div class="des-and-image">
                        <div class="clearfix">
                            <div class="type-map-des pull-left">
                                <p class="product-item-area1"></p>
                                <p class="product-item-area2"></p>
                                
                                <p class="product-item-area3">
                                    <?php
                                    if($infomationArea[1]) {
                                        echo nl2br(vcp_printf($infomationArea[1]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area4"></p>
                                
                                <p class="product-item-area5">
                                    <?php
                                    if($infomationArea[3]) {
                                        echo nl2br(vcp_printf($infomationArea[3]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area6">
                                    <?php
                                    if($infomationArea[2]) {
                                        echo nl2br(vcp_printf($infomationArea[2]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area7"></p>
                                
                                <p class="product-item-area8">
                                    <?php
                                    if($infomationArea[0]) {
                                        echo nl2br(vcp_printf($infomationArea[0]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area9">
                                    <?php
                                    if($infomationArea[6]) {
                                        echo nl2br(vcp_printf($infomationArea[6]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area10">
                                    <?php
                                    if($infomationArea[5]) {
                                        echo nl2br(vcp_printf($infomationArea[5]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                                
                                <p class="product-item-area11">
                                    <?php
                                    if($infomationArea[4]) {
                                        echo nl2br(vcp_printf($infomationArea[4]->information , current_lang_()));
                                    }
                                    ?>
                                </p>
                            </div><!-- end .type-map-des -->
                            <div class="map-image pull-right">
                                <p class="product-images-area1">
<!--                                    <img src="--><?php //echo PATH_URL . 'static/images/area_map/'?><!--">-->
                                </p>
                                <p class="product-images-area2">
<!--                                    <img src="--><?php //echo PATH_URL . 'static/images/area_map'?><!--">-->
                                </p>
                                <p class="product-images-area3">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/phunhuan.jpg'?>">
                                </p>
                                <p class="product-images-area4">
<!--                                    <img src="--><?php //echo PATH_URL . 'static/images/area_map'?><!--">-->
                                </p>
                                <p class="product-images-area5">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/quan3.jpg'?>">
                                </p>
                                <p class="product-images-area6">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/binhthanh_new.jpg'?>">
                                </p>
                                <p class="product-images-area7">
<!--                                    <img src="--><?php //echo PATH_URL . 'static/images/area_map'?><!--">-->
                                </p>
                                <p class="product-images-area8">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/quan1.jpg'?>">
                                </p>
                                <p class="product-images-area9">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/quan4.jpg'?>">
                                </p>
                                <p class="product-images-area10">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/quan2.jpg'?>">
                                </p>
                                <p class="product-images-area11">
                                    <img src="<?php echo PATH_URL . 'static/images/area_map/quan7.jpg'?>">
                                </p>

                            </div>
                        </div>
                        
                    </div>
                    <!-- Contact us button -->
                    <?php
                    // File store under folder application/views/FRONTEND/information_contact_us.php
                    echo $this->load->view('FRONTEND/information_contact_us');
                    ?>
                    <div class="product-area-map">                        
                        <div class="product-item-default active"></div><!-- end .product-item-default active -->
                        <div class="product-item1"></div><!-- end .product-item1 -->
                        <div class="product-item2"></div><!-- end .product-item2 -->
                        
                        <div class="product-item3">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[0]): ?>
                                    <?php foreach ($building[0] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item3 -->
                        
                        <div class="product-item4"></div><!-- end .product-item4 -->
                        
                        <div class="product-item5">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[1]): ?>
                                    <?php foreach ($building[1] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item5 -->
                        
                        <div class="product-item6">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[6]): ?>
                                    <?php foreach ($building[6] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item6 -->
                        
                        <div class="product-item7"></div><!-- end .product-item7 -->
                                
                        <div class="product-item8">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[2]): ?>
                                    <?php foreach ($building[2] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item8 -->
                                
                        <div class="product-item9">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[3]): ?>
                                    <?php foreach ($building[3] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item9 -->
                                
                        <div class="product-item10">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[4]): ?>
                                    <?php foreach ($building[4] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item10 -->
            
                        <div class="product-item11">
                            <div class="product-area-map">
                                <?php $replace = array("-"=>"/");?>
                                <?php if($building[5]): ?>
                                    <?php foreach ($building[5] as $key => $item): ?>
                                        <?php $link = create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace)); ?>
                                        <div class="product-detail-area">
                                            <div class="img-product-map">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </a>
                                            </div>
                                            <div class="product-detail-map">
                                                <a href="<?php echo $link; ?>">
                                                    <?=vcp_printf($item->name, current_lang_());?>
                                                </a>
                                                <p>
                                                    <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                </p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- end .product-item11 -->
                    </div><!-- end .product-area-map -->
                </div><!-- end .map-content -->
            </div><!-- end .row -->
            <!-- feature-block -->
            <div class="row">
                <div class="feature-static-page">                    
                    <?php echo modules::run('block/feature'); ?>
                </div>
            </div>
            <!-- <div class="btn-home">
                <a href="<?=create_url(); ?>" class="">
                    <span> ホームに戻る</span>  
                </a> 
            </div> -->
        </div><!-- end .container -->
    </div><!-- end .content-search-block common-rows -->
</div><!-- end .wrapper-content-block -->
<script>
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i=0; i<imgDefer.length; i++) {
            if(imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
            }
        }   
    }
    window.onload = init;
    $(document).ready(function($) {
        $(".product-detail-area").slice(0, 1).show();
        var position = $(".product-area-map").scrollTop(); 
        $(window).scroll(function(){
            var position = $('.product-area-map').height();
            if($(this).scrollTop() >= position){
                $(".product-detail-area:hidden").slideDown();
            }
        });
    });
</script>