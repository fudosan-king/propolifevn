<div class="search-box <?php echo  $is_home === false ? 'common-search-box background-dot-grey': '' ?> slideInUp">
    <div class="container">
        <div class="row">
            <form action="<?=create_url(); ?>search/list_data" method="get" id="myform">
                <input <?php echo $check_house; ?> id="opt" name="opt" value="<?php echo $opt; ?>" type="hidden">

                <ul class="type-search-box">
                    <li id="house" onclick="searchBy('house')" class="<?php echo $active_house; ?>">
                        <a class="search-by-house"></a>
                        <span><?php echo lang('賃貸住宅'); ?></span>
                    </li>

                    <li id="office" onclick="searchBy('office')" data-id="office" class="<?php echo $active_office; ?>">
                        <a class="search-by-office"></a>
                        <span><?php echo lang('office_house'); ?></span>
                    </li>
                </ul><!-- end .type-search-box -->

                <div class="select-box-block clearfix">
                    <div class="select-item-row pull-left">
                        <div>
                            <input type="text" name="txtSearch" id="txtSearch" value="<?php echo $this->input->get('txtSearch')?>" class="search-keyword" placeholder="<?php echo lang('検索キーワード') ?>" />
                        </div>

                        <input value="<?php if(isset($sort)){echo $sort; }?>" name="txtSort" id="txtSort" type="hidden">
                        <input id="inputMin" name="lblMin" type="hidden" value="<?php if(isset($inputMin)){echo $inputMin; }if($inputMin == ''){echo 0;}?>">
                        <input id="inputMax" name="lblMax" type="hidden" value="<?php if (isset($inputMax)){echo $inputMax;}if($inputMax == 0){ echo 6000;}?>">
                        <div>
                            <ul class="dropdown-menu-area clearfix">
                                <li>
                                    <div class="border-dropdown">
                                        <a class="dropdown-selected" href="javascript:void(0)" title="">
                                            <span class="text-dropdown line-clamp-search" id="areadf">
                                                <?php  if(isset($cboAreaId)): ?>
                                                    <?php echo lang('エリア'); ?>
                                                <?php else: ?>
                                                    <?php if ($itemAreas):?>
                                                        <?php foreach ($itemAreas as $area): ?>
                                                            <?php if ($area->id == $cboAreaId): ?>
                                                                <?php echo vcp_printf($area->name, current_lang_()); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </span>
                                            <span></span>
                                            <input type="hidden" name="cboAreaName" value="<?php echo $cboAreaId ?>">
                                        </a>
                                    </div><!-- end .border-dropdown -->

                                    <ul class="sub-menu scrollbar style-3 hidden">
                                        <li data-id="" title="<?php echo lang('エリア')?>">
                                            <a><?php echo lang('エリア')?></a>
                                        </li>

                                        <?php if ($itemAreas): ?>
                                            <?php foreach($itemAreas as $key => $item): ?>
                                                <?php $id = vcp_printf($item->id, current_lang_()); ?>
                                                <?php $name_en = vcp_printf($item->name, current_lang_()); ?>
                                                <li data-id="<?php echo $id; ?>" title="<?php echo $name_en; ?>">
                                                    <a href="javascript:void(0)" title=""><?php echo $name_en; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </li>

                                <li>
                                    <div class="border-dropdown">
                                        <a class="dropdown-selected" href="javascript:void(0)" title="">
                                            <span class="text-dropdown line-clamp-search" id="layoutdf"><?php echo $layoutdf; ?></span>
                                            <span></span>
                                            <input type="hidden" name="cboLayOut" value="<?php echo $cboLayOut; ?>">
                                        </a>
                                    </div>

                                    <ul class="sub-menu scrollbar style-3 hidden">
                                        <li data-id="" title="<?php echo lang('住居タイプ')?>">
                                            <a><?php echo lang('住居タイプ')?></a>
                                        </li>

                                        <?php if ($data_option_type_house): ?>
                                            <?php foreach ($data_option_type_house as $key => $item): ?>
                                                <?php
                                                $select = '';
                                                if ($key == $layout) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <li <?php echo $select; ?> data-id="<?php echo $key ?>" title="<?php echo $item; ?>">
                                                    <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </li>

                                <li>
                                    <div class="border-dropdown">
                                        <a class="dropdown-selected" href="javascript:void(0)" title="">
                                            <span class="text-dropdown line-clamp-search" id="typedf">
                                                <?php if ($type): ?>
                                                    <?php if($itemLayouts): ?>
                                                        <?php foreach($itemLayouts as $key=>$item): ?>
                                                            <?php if($item->id == $type): ?>
                                                                <?php echo vcp_printf($item->name, current_lang_()); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach;?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo lang('間取り'); ?>
                                                <?php endif; ?>
                                            </span>
                                            <span></span>
                                            <input type="hidden" name="cboType" value="<?php echo $type ?>">
                                        </a>
                                    </div><!-- end .border-dropdown -->

                                    <ul class="sub-menu scrollbar style-3 hidden">
                                        <li data-id="" title="<?php echo lang('間取り')?>">
                                            <a><?php echo lang('間取り')?></a>
                                        </li>

                                        <?php if($itemLayouts): ?>
                                            <?php foreach($itemLayouts as $key=>$item): ?>
                                                <?php
                                                $select = '';
                                                if($item->id == $type){
                                                    $select = 'selected';
                                                }
                                                $id = $item->id;
                                                $name = vcp_printf($item->name, current_lang_());
                                                ?>
                                                <li <?php echo $select; ?> data-id="<?php echo $id; ?>" title="<?php echo $name; ?>">
                                                    <a href="javascript:void(0)"><?php echo $name; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul><!-- end .sub-menu scrollbar style-3 hidden -->
                                </li>
                            </ul>
                        </div>
                    </div><!-- end .select-item-row -->

                    <div class="select-item-row select-item-row2 pull-left">
                        <ul class="dropdown-menu-area">
                            <li>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                        <span class="text-dropdown line-clamp-search" id="sizedf"><?php echo $sizedf; ?></span>
                                        <span></span>
                                        <input type="hidden" name="cboSize" value="<?php echo $cboSize?>">
                                    </a>
                                </div><!-- end .border-dropdown -->

                                <ul class="sub-menu scrollbar style-3 hidden">
                                    <li data-id="" title="<?php echo lang('面積')?>">
                                        <a><?php echo lang('面積')?></a>
                                    </li>

                                    <?php if ($data_option_areas): ?>
                                        <?php foreach ($data_option_areas as $key => $item): ?>
                                            <?php
                                            $select = '';
                                            if ($key == $size) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <li <?php echo $select; ?> data-id="<?php echo $key ?>" title="<?php echo $item; ?>">
                                                <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul><!-- end .sub-menu scrollbar style-3 hidden -->
                            </li>

                            <li>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                            <span class="text-dropdown line-clamp-search" id="condodf">
                                                <?php if(!$cboCondo): ?>
                                                    <?php echo lang('マンション'); ?>
                                                <?php else: ?>
                                                    <?php foreach ($itemCondo as $condo): ?>
                                                        <?php if ($condo->id == $cboCondo): ?>
                                                            <?php echo vcp_printf($condo->name, current_lang_()); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </span>
                                        <span></span>
                                        <input type="hidden" name="cboCondo" value="<?php echo $cboCondo ?>">
                                    </a>
                                </div><!-- end .border-dropdown -->

                                <ul class="sub-menu scrollbar style-3 hidden">
                                    <li data-id="" title="<?php echo lang('マンション')?>">
                                        <a><?php echo lang('マンション')?></a>
                                    </li>

                                    <?php foreach($itemCondo as $key => $item): ?>
                                        <?php $name = vcp_printf($item->name,current_lang_()); ?>
                                        <li data-id="<?php echo $item->id; ?>" title="<?php echo $name; ?>">
                                            <a href="javascript:void(0)" title=""><?php echo $name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul><!-- end .sub-menu scrollbar style-3 hidden -->
                            </li>

                            <li>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                            <span class="text-dropdown line-clamp-search" id="servicedf">
                                                <?php if(!$service_aprtment): ?>
                                                    <?php echo lang('サービスアパート'); ?>
                                                <?php else: ?>
                                                    <?php foreach ($itemService_aprtment as $service): ?>
                                                        <?php if ($service->id == $service_aprtment): ?>
                                                            <?php echo vcp_printf($service->name, current_lang_()); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </span>
                                        <span></span>
                                        <input type="hidden" name="cboService_aprtment" value="<?php echo $service_aprtment ?>">
                                    </a>
                                </div><!-- end .border-dropdown -->

                                <ul class="sub-menu scrollbar style-3 hidden">
                                    <li data-id="" title="<?php echo lang('サービスアパート')?>">
                                        <a><?php echo lang('サービスアパート')?></a>
                                    </li>

                                    <?php foreach($itemService_aprtment as $key => $item): ?>
                                        <?php $name = vcp_printf($item->name, current_lang_()); ?>
                                        <li data-id="<?php echo $item->id; ?>" title="<?php echo $name; ?>">
                                            <a href="javascript:void(0)" title=""><?php echo $name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul><!-- end .sub-menu scrollbar style-3 hidden -->
                            </li>
                        </ul>
                    </div><!-- end .select-item-row -->

                    <div class=" select-item-row select-item-row3 pull-left">
                        <div class="common-text">賃料</div><!-- end .common-text -->

                        <div class="range-bar">
                            <p class="price-numbers" id="mainMin">0 $</p>
                            <p class="price-numbers-max" id="mainMax">6000 $</p>
                            <p class="range-numbers clearfix">
                                <span class="pull-left">0$</span>
                                <span class="pull-left">1000$</span>
                                <span class="pull-right">MAX</span>
                                <span class="pull-right">5000$</span>
                            </p>
                        </div><!-- end .range-bar -->

                        <div class="btn-search">
                            <a href="javascript:void(0)" onclick="document.getElementById('myform').submit();">
                                <?php echo lang('検索') ?>
                            </a>
                        </div><!-- end .btn-search -->
                    </div><!-- end .select-item-row -->
                </div><!-- end .select-box-block -->

                <?php if(!$is_home): ?>
                    <div class="content-result clearfix">
                        <div class="search-reset pull-right">
                            <a href="javascript:void(0)" id="btnReset" onclick='resetSearchForm();'>リセット</a>
                        </div><!-- end .search-reset -->
                    </div><!-- end .content-result -->
                <?php endif; ?>
            </form>
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- search-box slideInUp -->