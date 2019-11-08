<?php
$is_home = $this->router->fetch_class() === 'home' ? true: false ;
$check_house = '';
$module =  $this->router->fetch_class();
$check_office = '';
$check_house = '';
$opt = isset($_GET['opt'])?$_GET['opt']:'';
if($opt == 'house' || $module == 'houses'){
    $check_house = 'checked="checked"';
}elseif($opt == 'office' || $module == 'offices') {
    $check_office = 'checked="checked"';
}
$opt_select = array('house'=>lang('賃貸住宅'), 'office'=>lang('オフィス・店舗'));
$s = isset($s)?$s:'';
?>
<form action="<=create_url() ?><?php echo current_lang()?>search" method="get" id="myform">
    <div class="search-box <?php echo  $is_home === false ? 'common-search-box background-dot-grey': '' ?>">
        <div class="container">
            <input <?php echo $check_house; ?>  id="opt" name="opt" value="house" type="hidden">
            <ul class="type-search-box">
                <li id="house" onclick="myFunction('house')" class="<?php if(($opt =='house') or ($opt =='')){echo 'active';}?>">
                    <a class="search-by-house"></a>
                    <span><?php echo lang('賃貸住宅'); ?></span>
                </li>
                <li id="office" onclick="myFunction('office')" data-id="office" class="<?php if ($opt == 'office'){echo 'active';}?>">
                    <a class="search-by-office"></a>
                    <span><?php echo lang('office_house'); ?></span>
                </li>
            </ul>
            <div class="select-box-block clearfix">
                <div class="btn-search pull-right" >
                    <a href="javascript:void(0)" onclick="document.getElementById('myform').submit();"><?php echo lang('検索') ?></a>
                    <input type="hidden"  value="">
                </div>
                <div class="select-item-row pull-left">
                    <div>
                        <input type="text" name="txtSearch" id="txtSearch" value="<?php echo $this->input->get('txtSearch')?>" class="search-keyword" placeholder="<?php echo lang('検索キーワード') ?>"/>
                    </div>
                    <div>
                        <ul class="dropdown-menu-area clearfix">
                            <li>
                                <?php
                                $cboAreaName=$this->input->get('cboAreaName');
                                ?>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                        <span><?php 
                                            $get_cbo_areaname = lang('エリア');
                                            if ($cboAreaName) {
                                                $get_cbo_areaname = $itemAreas[$cboAreaName];
                                            }
                                            echo $get_cbo_areaname;
                                        ?></span>
                                        <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                        <input type="hidden" name="cboAreaName" value="<?php echo $cboAreaName ?>">
                                    </a>
                                </div>
                                <ul class="sub-menu hidden">
                                    <?php if($areas && $areas=='house'){$itemAreas=$itemAreas_H;}else{$itemAreas=$itemAreas_O;} ?>
                                    <?php foreach($itemAreas as $key=>$item) {
                                    $select = '';
                                    ?>
                                            <li <?php echo $select; ?> data-id="<?php echo $key; ?>" title="<?php echo $item; ?>">
                                                <a href="javascript:void(0)" title=""><?php echo $item; ?></a>
                                            </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <?php
                                $data_option = array(
                                    0 => lang('サービスアパートメント'),
                                    1 => lang('アパートメント'),
                                    2 => lang('戸建')
                                );
                                $cboLayOut=$this->input->get('cboLayOut');
                                ?>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                        <span><?php
                                            $get_cbo_layout = lang('住居タイプ');
                                            if ($cboLayOut) {
                                                $get_cbo_layout = $data_option[$cboLayOut];
                                            }
                                            echo $get_cbo_layout;
                                        ?></span>
                                        <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                        <input type="hidden" name="cboLayOut" value="<?php echo $cboLayOut ?>">
                                    </a>
                                </div>
                                <ul class="sub-menu hidden">
                                   <?php
                                    foreach ($data_option as $key => $item) {
                                        $select = '';
                                        if ($key == $layout) {
                                            $select = 'selected';
                                        }
                                        ?>
                                        <li <?= $select; ?> data-id="<?= $key ?>" title="<?= $item; ?>">
                                            <a href="javascript:void(0)" title=""><?= $item; ?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <?php
                                    $type= $this->input->get('cboType');
                                ?>
                                <div class="border-dropdown">
                                    <a class="dropdown-selected" href="javascript:void(0)" title="">
                                        <span>
                                            <?php if($itemLayouts){
                                                foreach($itemLayouts as $key=>$item) {
                                                $select = '';
                                                if($item->id == $type) {
                                                    echo vcp_printf($item->name, current_lang_());
                                                }
                                                }
                                            }
                                            if($type ==''){
                                                echo lang('間取り');
                                            } ?>
                                        </span>
                                        <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                        <input type="hidden" name="cboType" value="<?php echo $type ?>">
                                    </a>
                                </div>
                                <ul class="sub-menu hidden">
                                    <?php if($itemLayouts)
                                        foreach($itemLayouts as $key=>$item) {
                                        $select = '';
                                        if($item->id == $type){
                                            $select = 'selected';
                                        }
                                        ?>
                                        <li <?= $select; ?> data-id="<?php echo $item->id  ?>" title="<?php echo vcp_printf($item->name, current_lang_()) ?>">
                                            <a href="javascript:void(0)"><?php echo vcp_printf($item->name, current_lang_())  ?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="select-item-row select-item-row2 pull-left">
                    <ul class="dropdown-menu-area">
                        <li>
                            <div class="common-text">賃料</div>
                            <div class="range-bar">
                                <p class="price-numbers" id ="mainMin">0 $</p>
                                <p class="price-numbers-max" id ="mainMax">6000 $</p>
                                <p class="range-numbers clearfix">
                                    <span class="pull-left">0$</span>
                                    <span class="pull-left">1000$</span>
                                    <span class="pull-right">MAX</span>
                                    <span class="pull-right">5000$</span>
                                </p>
                            </div>
                        </li>
                        <input value="<?php if(isset($sort)){echo $sort; }?>" name="txtSort" id="txtSort" type="hidden">
                        <input id="inputMin" name="lblMin" type="hidden" value="<?php if(isset($inputMin)){echo $inputMin; }?>">
                        <input id="inputMax" name="lblMax" type="hidden" value="<?php if (isset($inputMax)){echo $inputMax;}if($inputMax == 0){ echo 6000;}?>">
                        <li>
                            <?php
                            $data_option = array(
                                '50' => lang('50㎡以下'),
                                '51-81' => lang('51㎡～80㎡'),
                                '81-100' => lang('81㎡～100㎡'),
                                '101-150' => lang('101㎡～150㎡'),
                                '151' => lang('151㎡以上')
                            );
                            $cboSize= $this->input->get('cboSize');
                            ?>
                            <div class="border-dropdown">
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span><?php
                                        $get_cbo_size = lang('面積');
                                        if ($cboSize) {
                                            $get_cbo_size = $data_option[$cboSize];
                                        }
                                        echo $get_cbo_size;
                                    ?></span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                    <input type="hidden" name="cboSize" value="<?php echo $cboSize?>">
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <?php
                                foreach ($data_option as $key => $item) {
                                    $select = '';
                                    if ($key == $size) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <li <?= $select; ?> data-id="<?= $key ?>" title="<?= $item; ?>">
                                        <a href="javascript:void(0)" title=""><?= $item; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <?php
                            $data_option = array(
                                    '1'=>'abc',
                                    '2'=>'abc',
                                    '3'=>'abc'
                            );
                            $cboRent=$this->input->get('cboRent');
                            ?>
                            <div class="border-dropdown">
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span><?php
                                        $get_cbo_rent = lang('マンション');
                                        if ($cboRent) {
                                            $get_cbo_rent = $data_option[$cboRent];
                                        }
                                        echo $get_cbo_rent;
                                    ?></span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                    <input type="hidden" name="cboRent" value="<?php echo $cboRent?>">
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <?php
                                foreach ($data_option as $key => $item) {
                                    $select = '';
                                    if ($key == $size) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <li <?= $select; ?> data-id="<?= $key ?>" title="<?= $item; ?>">
                                        <a href="javascript:void(0)" title=""><?= $item; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <?php
                            $data_option = array(
                                '1'=>'abc',
                                '2'=>'abc',
                                '3'=>'abc'
                            );
                            $cboApartment=$this->input->get('cboApartment');
                            ?>
                            <div class="border-dropdown">
                                <a class="dropdown-selected" href="javascript:void(0)" title="">
                                    <span><?php
                                        $get_cbo_apartment = lang('サービスアパート');
                                        if ($cboApartment) {
                                            $get_cbo_apartment = $data_option[$cboApartment];
                                        }
                                        echo $get_cbo_apartment;
                                    ?></span>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                    <input type="hidden" name="cboApartment" value="<?php echo $cboApartment?>">
                                </a>
                            </div>
                            <ul class="sub-menu hidden">
                                <?php
                                foreach ($data_option as $key => $item) {
                                    $select = '';
                                    if ($key == $size) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <li <?= $select; ?> data-id="<?= $key ?>" title="<?= $item; ?>">
                                        <a href="javascript:void(0)" title=""><?= $item; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div><!-- select-box-block -->
            <?php
            if(!$is_home){
                ?>
                <div class="content-result clearfix">
                    <div class="search-reset pull-right">
                        <a href="<?=create_url().'search'?>">リセット</a>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            ?>
        </div><!-- container -->
    </div><!-- search-box -->
</form>
<script>
    function myFunction(seachValue) {
        document.getElementById('opt').value = seachValue ;
    }
</script>