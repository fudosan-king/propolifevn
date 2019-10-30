<div class="search-box common-search-box background-dot-grey">
    <div class="container">
        <h3 class="heading-search-title">検索</h3>
        <ul class="type-search-box">
            <li class="active"><a href="javascript:void(0)" class="search-by-house"></a><span>house</span></li>
            <li><a href="javascript:void(0)" class="search-by-office"></a><span>office</span></li>
        </ul>
        <div class="select-box-block clearfix">
            <div class="btn-search pull-right"><a href="javascript:void(0)">検索</a></div>
            <div class="select-item-row pull-left">
                <div>
                    <input type="text" name="" value="" class="search-keyword" placeholder="検索キーワード"/>
                </div>
                <div>
                    <ul class="dropdown-menu-area clearfix">
                        <li>
                            <div>
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span>エリア</span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <li value="0" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="1" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="2" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span>住居タイプ</span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <li value="0" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="1" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="2" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span>間取り</span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <li value="0" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="1" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                                <li value="2" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="select-item-row select-item-row2 pull-left">
                <ul class="dropdown-menu-area">
                    <li>
                        <div>
                            <a class="dropdown-selected" href="javascript:void(0)" title="">
                                <span>賃料</span>
                                <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                        </div>
                        <ul class="sub-menu hidden">
                            <li value="0" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            <li value="1" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            <li value="2" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <a class="dropdown-selected" href="javascript:void(0)" title="">
                                <span>面積</span>
                                <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                        </div>
                        <ul class="sub-menu hidden">
                            <li value="0" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            <li value="1" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                            <li value="2" title="abc"><a href="javascript:void(0)" title="">abc</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- select-box-block -->
        <div class="content-result clearfix">
            <div class="search-reset pull-right">
                <a href="javascript:void(0)">リセット</a>
            </div>
            <div class="search-result pull-right">
                <a>
                    <span>該当物件数</span>
                    <span>1230</span>
                    <span>件</span>
                </a>
            </div>
        </div><!--content-result-->
    </div><!-- container -->
</div><!-- search-box -->

<div class="content-search-block">
    <div class="container">
        <div class="row">
            <div class="breadcums">
                <span>トップページ / 検索 / <a href="#">結果</a></span>
            </div>
        </div>
        <div class="row">
            <div class="condition_content pull-left">
                <span class="text">検索条件 : </span> <span class="text-box">１区</span> <span class="text-box">サービスアパート</span> <span class="text-box">2LDK(2ベットルーム)</span> <span class="text-box">500USD以下</span> <span class="text-box">50m2以下</span>
            </div>
            <div class="count_content pull-right">該当物件数<br> <strong>12</strong> 件</div>
        </div>
        <div class="row">
            <div class="order_condition pull-left">
                <div class="select_order_area">
                    <span>並び替え： </span>
                    <select class="select_order">
                        <option>登録日: 新しい順</option>
                    </select>
                </div>

                <a href="#" class="position-product-normal"></a>
                <a href="#" class="position-product-block"></a>
            </div>
            <div class="paging pull-right">
                <?php
                echo $paging->create_links();
                ?>

                <!--            <p><span>ページ :</span> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> ... <a href="#">7</a> <a href="#" class="next-paging"></a></p>-->
            </div>
        </div>
        <div class="pagin-wap pagin-top">
            <div class="pagination-bottom">
                <!--            --><?php
                //
                //            echo $paging->create_links();
                //            ?>
            </div>
        </div>
        <?php if($info): ?>
        <?php foreach($info as $key=>$item):
        echo "123<br> ".$item->id;
        ?>
        <?php echo vcp_printf($item->deposit, current_lang_())?>
        <!--    --><?php //echo "<pre>";
        //    print_r(json_encode($item));
        //    echo "<pre/>";
        //    die();?>

        <?php
        $lastChild = '';
        if($key == count($info) - 1)
        {
            $lastChild = "last-child";
        }
        ?>
        <div class="row">
            <div class="product-block">
                <div class="product-item">
                    <div class="wrap-img-product">
                        <div class="img-product-item owl-carousel pull-left">
                            <div <?=$lastChild?>>
                                <?php
                                $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb;
                                if(!@file_get_contents($thumb)) {
//                                $thumb = PATH_URL . 'static/images/no-thumb.jpg';
                                }
                                ?>
                                <a href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>">
                                    <img src="<?=$thumb?>" width="172px" />
                                </a>
                            </div>
                            <div>
                                <?php
                                $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb;
                                if(!@file_get_contents($thumb)) {
//                                $thumb = PATH_URL . 'static/images/no-thumb.jpg';
                                }
                                ?>
                                <a href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>">
                                    <img src="<?=$thumb?>" width="172px" />
                                </a>
                            </div>
                        </div>
                        <div class="price_area">
                            <p class="price"><span><?=$item->rent?></span> USD</p>
                            <p class="local"><?= vcp_printf($item->area_name, current_lang_())?></p>
                        </div>
                    </div>

                    <div class="product-detail-right pull-right">
                        <div class="detail-product-item">
                            <a class="name-product-item" href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>"><?php echo vcp_printf($item->name_en, current_lang_())?><br><?php echo vcp_printf($item->name_jp, current_lang_())?></a>
                            <div class="detail-product-left">
                                <ul>
                                    <li>サービスアパート</li>
                                    <li><?=$item->size?><sup>2</sup></li>
                                    <li>2ベッドルーム</li>
                                    <li>1バスルーム</li>
                                    <li><?php echo vcp_printf($item->name_en, current_lang_())?></li>
                                </ul>
                            </div>
                            <div class="detail-product-right">
                                <div class="list-condition">
                                    <div class="title-condition-utilities">家賃に含む<br>サービス等</div>
                                    <div class="list-condition-item">
                                        <?php if (isset($item->aa)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/icon/pool-icon.png">
                                                <p>プール</p>
                                            </div>
                                        <?php }?>

                                        <?php if (isset($item->elevator)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon2.png">
                                                <p>エレベーター</p>
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->kitchen)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon3.png">
                                                <p>キッチン</p>
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->pet)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon4.png">
                                                <p>ペットOK</p>
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->bathtub)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon5.png">
                                                <p>バスタブ</p>
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->aa)){?>
                                            <div class="condition-item bg-gray">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon6.png">
                                                <p>お部屋に洗濯機</p>
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->aa)){?>
                                            <div class="condition-item bg-gray">
                                                <img src="<?= PATH_URL ?>static/images/icon/icon7.png   ">
                                                <p>バルコニー</p>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="list-utilities">
                                     <div class="title-condition-utilities">
                                        設備
                                    </div>
                                    <div class="list-utilities-item">
                                    <?php if (isset($item->other_notice)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/attach-icon.png"><span>TAX</span>
                                            <p>VAT(税金)</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->water_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/swim-icon.png">
                                            <p>プール利用料</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->drink_water_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/pipe-icon.png">
                                            <p>水道代</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->aa)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/sport-person.png">
                                            <p>ジム</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->cleaning)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/mayhutbui.png">
                                            <p>掃除サービス</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->electric_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/battery-icon.png">
                                            <p>電気代</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->aa)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/account-icon.png">
                                            <p>管理費</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->aa)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/bike-icon.png">
                                            <p>ジム利用料</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->internet)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/wifi-icon.png">
                                            <p>インターネット</p>
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->laundry_service)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/icon/icon15.png">
                                            <p>洗濯サービス</p>
                                        </div>
                                    <?php }?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-description">
                            <?php echo vcp_printf($item->introduction, current_lang_())?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>


                <div class="paging pull-right">
                    <?php
                    echo $paging->create_links();
                    ?>
                </div>
            </div>
        </div>
