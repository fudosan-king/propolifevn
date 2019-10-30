<main class="wrap-search-box">
    <form action="<?=create_url();?>search/list_data" method="get" id="myform">
        <div class="wrapper-content-block">
            <div class="search-box  <?php echo  $is_home === false ? 'common-search-box background-dot-grey': '' ?>">
                <div class="container">
                    <input <?php echo $check_house; ?> id="opt" name="opt" value="<?php echo $opt; ?>" type="hidden" class="product-opt">

                    <ul class="type-search-box">
                        <ul class="type-search-box">
                            <li id="house" onclick="searchBy('house')" class="<?php echo $active_house; ?>">
                                <a href="javascript:void (0)" class="search-by-house"></a>
                                <span><?php echo lang('賃貸住宅'); ?></span>
                            </li>

                            <li id="office" onclick="searchBy('office')" data-id="office" class="<?php echo $active_office; ?>">
                                <a href="javascript:void (0)" class="search-by-office"></a>
                                <span><?php echo lang('office_house'); ?></span>
                            </li>
                        </ul><!-- end .type-search-box -->
                    </ul>

                    <?php
                        $class_office = '';
                        if ($opt == 'office') {
                            $class_office = 'search-box-offices';
                        }
                    ?>
                    <div class="select-box-block clearfix <?php echo $class_office; ?>" data-wow-delay="0s">
                        <div class="select-item-row pull-left">
                            <div class="select-item-row-item">
                                <input type="text" name="txtSearch" id="txtSearch" value="<?php echo $this->input->get('txtSearch')?>" class="search-keyword" placeholder="<?php echo lang('検索キーワード') ?>" />
                            </div>
                            <input value="<?php if(isset($sort)){echo $sort; }?>" name="txtSort" id="txtSort" type="hidden">

                            <?php
                                $pushInputMin = 0;
                                $pushInputMax = 6000;
                                if (isset($inputMin) && is_numeric($inputMin)) {
                                    $pushInputMin = $inputMin;
                                }
                                if (isset($inputMax) && is_numeric($inputMax)) {
                                    $pushInputMax = $inputMax;
                                }
                            ?>

                            <input id="inputMin" name="lblMin" type="hidden" value="<?php echo $pushInputMin; ?>">
                            <input id="inputMax" name="lblMax" type="hidden" value="<?php echo $pushInputMax; ?>">

                            <div class="select-item-row-item boxCondition">
                                <ul class="dropdown-menu-area clearfix">
                                    <select class="dropdown-selected" data-minimum-results-for-search="Infinity" name="cboAreaName" id="areadf">
                                            <option value="" title="<?php echo lang('エリア')?>">
                                                <a href="javascript:void (0)"><?php echo lang('エリア')?></a>
                                            </option>

                                            <?php if ($itemAreas): ?>
                                                <?php foreach($itemAreas as $key => $item): ?>
                                                    <?php $id = vcp_printf($item->id, current_lang_()); ?>
                                                    <?php $name_en = vcp_printf($item->name, current_lang_()); ?>
                                                    <?php
                                                        $selected = '';
                                                        if ($cboAreaId == $id) {
                                                            $selected = 'selected="selected"';
                                                        }
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $id; ?>" title="<?php echo $name_en; ?>">
                                                        <a href="javascript:void(0)" title=""><?php echo $name_en; ?></a>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                    </select>
                                    <?php if($active_house == 'active'){?>
                                        <select class="dropdown-selected" data-minimum-results-for-search="Infinity" name="cboLayOut" id="layoutdf">
                                            <option value="" title="<?php echo lang('住居タイプ')?>">
                                                <a href="javascript:void (0)"><?php echo lang('住居タイプ')?></a>
                                            </option>
                                            <?php if ($data_option_type_house): ?>
                                                <?php foreach ($data_option_type_house as $key => $item): ?>
                                                    <?php
                                                    $selected = '';
                                                    if (($cboLayOut != '') && ($key == $cboLayOut)){
                                                        $selected = 'selected="selected"';
                                                    }
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $key; ?>" title="<?php echo $item; ?>">
                                                        <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php }?>
                                    <?php if($active_house == 'active'){?>
                                        <select class="dropdown-selected" data-minimum-results-for-search="Infinity" name="cboType" id="typedf">
                                            <option value="" title="<?php echo lang('間取り')?>">
                                                <a href="javascript:void (0)"><?php echo lang('間取り')?></a>
                                            </option>

                                            <?php if($itemLayouts): ?>
                                                <?php foreach($itemLayouts as $key=>$item): ?>
                                                    <?php
                                                    $selected = '';
                                                    if($item->id == $type){
                                                        $selected = 'selected="selected"';
                                                    }
                                                    $id = $item->id;
                                                    $name = vcp_printf($item->name, current_lang_());
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $id; ?>" title="<?php echo $name; ?>">
                                                        <a href="javascript:void(0)"><?php echo $name; ?></a>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php }?>
                                    <select class="dropdown-selected price-sub-menu" data-minimum-results-for-search="Infinity" name="cboRentSelect" id="rentdf">
                                            <option value="" title="<?php echo lang('賃料')?>">
                                                <a href="javascript:void (0)"><?php echo lang('賃料')?></a>
                                            </option>

                                            <?php if ($data_option_rentSelect): ?>
                                                <?php foreach ($data_option_rentSelect as $key => $item): ?>
                                                    <?php
                                                    $selected = '';
                                                    if ($key == $cboRentSelect) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $key; ?>" title="<?php echo $item; ?>">
                                                        <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                    </select>
                                    <?php if($active_office == 'active'): ?>
                                        <select class="dropdown-selected" data-minimum-results-for-search="Infinity" name="cboSizeRentSelect" id="sizeRentdf">
                                            <option value="" title="<?php echo lang('㎡単価（USD/㎡）')?>">
                                                <a href="javascript:void (0)"><?php echo lang('㎡単価（USD/㎡）')?></a>
                                            </option>

                                            <?php if ($data_option_sizeRentSelect): ?>
                                                <?php foreach ($data_option_sizeRentSelect as $key => $item): ?>
                                                    <?php
                                                    $selected = '';
                                                    if ($key == $cboSizeRentSelect) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $key ?>" title="<?php echo $item; ?>">
                                                        <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php endif; ?>
                                    <select class="dropdown-selected" data-minimum-results-for-search="Infinity" name="cboSize" id="sizedf">
                                        <option value="" title="<?php echo lang('面積')?>">
                                            <a href="javascript:void (0)"><?php echo lang('面積')?></a>
                                        </option>

                                        <?php if ($data_option_areas): ?>
                                            <?php foreach ($data_option_areas as $key => $item): ?>
                                                <?php
                                                $selected = '';
                                                if ($key == $cboSize) {
                                                    $selected = 'selected="selected"';
                                                }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $key ?>" title="<?php echo $item; ?>">
                                                    <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </ul>
                            </div>

                            <?php
                                $hide_slide_price = '';
                                $css_when_hide_slide_price = '';
                                if (is_smartphone() == 'sp') {
                                    $hide_slide_price = 'hide';
                                    $css_when_hide_slide_price = 'style="margin-top: 20px;"';
                                }
                            ?>

                            <div class="select-item-row-item select-item-row-item3 <?php echo $hide_slide_price;?>">
                                <div class="common-text common-repair">賃料</div>
                                <div class="range-bar">
                                    <p class="price-numbers">0 $</p>
                                    <p class="price-numbers-max">6000 $</p>
                                    <p class="range-numbers clearfix">
                                        <span class="pull-left">0$</span>
                                        <span class="pull-left">1000$</span>
                                        <span class="pull-right">MAX</span>
                                        <span class="pull-right">5000$</span>
                                    </p>
                                </div>
                            </div>
                            <ul class="btn-group-search clearfix" <?php echo $css_when_hide_slide_price; ?>>
                                <li class="btn-search">
                                    <a href="javascript:void(0)" onclick="document.getElementById('myform').submit();">
                                        <?php echo lang('検索') ?>
                                    </a>
                                </li>
                            </ul>

                            <div class="select-item-row-item">
                                <?php if(!$is_building):?>
                                    <ul class="dropdown-menu-area dropdown-submit clearfix">
                                        <?php if($active_house == 'active'){?>
                                        <select class="dropdown-selected-cnt" data-minimum-results-for-search="Infinity" name="cboCondo" id="summitCondo">
                                            <option value="" title="<?php echo lang('特集マンション名から探す')?>">
                                                <a href="javascript:void (0)"><?php echo lang('特集マンション名から探す')?></a>
                                            </option>

                                            <?php foreach($itemCondo as $key => $item): ?>
                                                <?php
                                                    $selected = '';
                                                    if ($item->id == $cboCondo) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                ?>
                                                <?php $name = vcp_printf($item->name,current_lang_()); ?>
                                                <option data-dist='<?php echo $item->district;?>' <?php echo $selected; ?> value="<?php echo $item->id; ?>" title="<?php echo $name; ?>">
                                                    <a  href="javascript:void(0)" title=""><?php echo $name; ?></a>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select class="dropdown-selected-cnt" data-minimum-results-for-search="Infinity" name="cboService_aprtment" id="summitService">
                                            <option value="" title="<?php echo lang('特集サービスアパート名から探す')?>">
                                                <a href="javascript:void (0)"><?php echo lang('特集サービスアパート名から探す')?></a>
                                            </option>

                                            <?php foreach($itemService_aprtment as $key => $item): ?>
                                                <?php
                                                    $selected = '';
                                                    if ($item->id == $service_aprtment) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                ?>
                                                <?php $name = vcp_printf($item->name, current_lang_()); ?>
                                                <option data-dist='<?php echo $item->district;?>' <?php echo $selected; ?> value="<?php echo $item->id; ?>" title="<?php echo $name; ?>">
                                                    <a href="javascript:void(0)" title=""><?php echo $name; ?></a>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php }?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- select-box-block -->
                     <?php if(!$is_home): ?>
                    <ul class="content-result clearfix">
                        <li class="search-reset pull-right">
                            <a href="javascript:void(0)" id="btnReset" onclick='resetSearchForm();'>リセット</a>
                        </li><!-- end .search-reset -->
                    </ul><!-- end .content-result -->
                    <?php endif; ?>
                </div><!-- container -->
            </div><!-- search-box -->
        </div>    <!-- wrapper-content-block -->
    </form>
</main>

<script>
    function searchBy(houseOrOffice) {
        var path_url = "<?php echo PATH_URL; ?>";
        var get_controller = "<?php echo helper_get_module_current(); ?>";
        var get_action = "<?php echo helper_get_action_current(); ?>";
        var get_lang = "<?php echo current_lang(); ?>";
        var is_home = "<?php echo $this->router->fetch_class(); ?>";
        var set_url_lang = '';
        if (get_lang == 'vn') {
            set_url_lang = 'vn/';
        }

        var old_opt = $('#opt').val();
        $('#opt').val(houseOrOffice);

        var is_redirect_page = false;
        if (get_controller == 'houses' && get_action == 'detail' && houseOrOffice == 'office') {
            // In house detail page click tab office in box search
            is_redirect_page = true;
        } else if (get_controller == 'offices' && get_action == 'detail' && houseOrOffice == 'house') {
            // In office detail page click tab house in box search
            is_redirect_page = true;
        } else if (get_controller == 'search' && get_action == 'list_data' && old_opt != houseOrOffice) {
            // Search page
            is_redirect_page = true;
        } else if (is_home == 'home' && old_opt != houseOrOffice) {
            // Top page
            is_redirect_page = true;
        } else if (get_controller == 'building' && old_opt != houseOrOffice) {
            // Building page
            is_redirect_page = true;
        } else if (get_controller == 'houses' && old_opt != houseOrOffice) {
            // Building page
            is_redirect_page = true;
        }

        if (is_redirect_page == false) {
            return false;
        }

        var txtSearch = '';
        var txtSort = '';
        var lblMin = '';
        var lblMax = '';
        var cboAreaName = '';
        var cboSize = '';
        var cboRentSelect = '';
        
        if (houseOrOffice == 'house') {
            var cboLayOut = $('input[name="cboLayOut"]').val();
            var cboType = $('input[name="cboType"]').val();
            var cboCondo = $('input[name="cboCondo"]').val();
            var cboService_aprtment = $('input[name="cboService_aprtment"]').val();
            if (!cboLayOut) {
                cboLayOut = '';
            }
            if (!cboType) {
                cboType = '';
            }
            if (!cboCondo) {
                cboCondo = '';
            }
            if (!cboService_aprtment) {
                cboService_aprtment = '';
            }
        }
        
        if (houseOrOffice == 'office') {
            var cboSizeRentSelect = $('input[name="cboSizeRentSelect"]').val();
            var cboChairSelect = $('input[name="cboChairSelect"]').val();
            if (!cboSizeRentSelect) {
                cboSizeRentSelect = '';
            }
            if (!cboChairSelect) {
                cboChairSelect = '';
            }
        }
        
        var url = '?' + 'opt=' + houseOrOffice + '&txtSearch=' + txtSearch + '&txtSort=' + txtSort + '&lblMin=' + lblMin + '&lblMax=' + lblMax + '&cboAreaName=' + cboAreaName + '&cboSize=' + cboSize + '&cboRentSelect=' + cboRentSelect;
        
        if (houseOrOffice == 'house') {
            url += '&cboLayOut=' + cboLayOut;
            url += '&cboType=' + cboType;
            url += '&cboCondo=' + cboCondo;
            url += '&cboService_aprtment=' + cboService_aprtment;
        }
        
        if (houseOrOffice == 'office') {
            url += '&cboSizeRentSelect=' + cboSizeRentSelect;
            url += '&cboChairSelect=' + cboChairSelect;
        }

        if (is_redirect_page == true) {
            var pathname = set_url_lang + 'search/list_data';
            var url_redirect =  path_url + pathname + url;
            window.location.href = url_redirect;
        }
    }
</script>