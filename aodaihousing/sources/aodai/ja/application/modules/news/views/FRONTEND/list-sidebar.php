<div class="website-information">
    <div class="container">
        <h3 class="heading-title-line">アオザイインフォメーション</h3>
        <div class="info-webpage-list">
            <div class="row">
                <?php if($items): ?>
                <div class="col-xs-6 col-info-website-item">
                    <div class="img-info-website-item"><img src="<?=PATH_URL.'static/images'?>/items/image12.png" alt=""></div>
                    <div class="des-info background-dot-red clearfix">
                        <h4><a href="<?=PATH_URL. 'news/' . $items[0]->id.'/'.SEO($items[0]->title)?>" title=""><?php echo vcp_printf($items[0]->title, current_lang_())?></a></h4>
                        <p class="des-info-p"><?php echo vcp_printf($items[0]->content, current_lang_())?></p>
                        <p class="time-block pull-left"><?=date("Y-m-d", strtotime($items[0]->created));?></p>
                        <a href="javascript:void(0)" class="btn-view-more pull-right">もっと見る</a>
                    </div>  
                </div><!-- col-info-website-item -->
                

                <div class="col-xs-6 col-info-website-item">
                    <?php foreach($items as $item): ?>
                    <div class="row">
                        <div class="space-appartment">
                            <div class="col-xs-7 col-items-block">
                                <div class="img-info"><img src="<?=PATH_URL.'static/images'?>/items/image13.png" alt=""/></div>
                            </div>
                            <div class="col-xs-5 col-items-block background-dot-dark">
                                <div class="des-info-item">
                                    <h4><a href="<?=PATH_URL. 'news/' . $item->id.'/'.SEO($item->title)?>" title=""><?php echo vcp_printf($item->title, current_lang_())?></a></h4>
                                    <!-- <p class="des-info-item-content"><?=$item->content?> -->
                                    <!-- </p> -->
                                    <p class="time-block"><?=date("Y-m-d", strtotime($item->created));?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                   
                    
                    <!-- <div class="row">
                        <div class="space-appartment">
                            <div class="col-xs-7 col-items-block">
                                <div class="img-info"><img src="<?=PATH_URL.'static/images'?>/items/image14.png" alt=""/></div>
                            </div>
                            <div class="col-xs-5 col-items-block">
                                <div class="des-info-item background-dot-dark">
                                    <h4><a href="" title="">重ぶ有立みスなね</a></h4>
                                    <p class="des-info-item-content">第塩ね介身旅ミキヱウ画聞ケリワロ河退イオレリ村外でえげる宏61重ぶ有立みスなね弘6文ゅリ書医ぱ編七ゃイつを減権容係車ぽんどき。要願あ対段迎びばンの観取審据灯をリ...
                                    </p>
                                    <p class="time-block">5 Jun 2017</p>
                                </div>                                      
                            </div>
                        </div>
                    </div>   -->
                </div><!-- col-info-website-item -->    
            <?php endif; ?>
            </div>
        </div>
    </div><!-- container -->
</div>  <!-- website-information -->