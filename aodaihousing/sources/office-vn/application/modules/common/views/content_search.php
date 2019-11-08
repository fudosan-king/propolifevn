<?php
$check_house = '';
$module =  $this->router->fetch_class();
$check_office = '';
$check_house = '';
$opt = isset($_GET['opt'])?$_GET['opt']:'';

if($opt == 'house' || $module == 'houses'){
    $check_house = 'checked="checked"';
}elseif($opt == 'office' || $module == 'offices') {
    $check_office = 'checked="checked"';
    ?>
    <script type="text/javascript">
    $(document).ready(function(){
       $('.option-icon-2').trigger('click'); 
    });
    </script>
    <?php
}
$opt_select = array('house'=>lang('賃貸住宅'), 'office'=>lang('オフィス・店舗'));
$s = isset($s)?$s:'';
?>
<div class="content-search">
    <div class="mail-s">
        <a class="f_map" href="<?=PATH_URL?>common/map"><span><?php echo lang('ホーチミン地図'); ?></span></a>
    </div>  
    
    
    <form action="<?=PATH_URL?><?php echo current_lang();?>search" method="get" class="search-option-f">
        <div class="content-search-left">
            <div class="step-1">
                <div class="header-step1">
                    <div class="icon-step-1">
                        <span><?php echo lang('１．物件の種類をお選びください'); ?></span>
                    </div>
                </div>
                <div class="option-s">
                    <div class="option">
                        <div class="option-icon option-icon-1">
                            <span class="name-option"><?php echo lang('賃貸住宅'); ?></span>
                            <span class="radio-opt"><input <?=$check_house; ?> checked="checked" type="radio" name="opt" value="house" /></span>
                        </div>
                    </div>
                    <div class="option" id="option-2">
                        <div class="option-icon option-icon-2">
                            <span class="name-option"><?php echo lang('office_house'); ?></span>
                            <span class="radio-opt"><input <?=$check_office; ?> type="radio" name="opt" value="office" /></span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
	   <div class="content-search-right">
            <div class="step-1 step-2">
                    <div class="header-step1">
                        <div class="icon-step-1">
                            <span><?php echo lang('2．条件をお選びください'); ?></span>
                        </div>
                    </div>
                    <div class="option-s">
                        <div class="wrap-opt">
                            <div class="wrap-input">
                                <div id="areas" class="select_option">
                                    <select id="s1" class="select_p" name="areas" style="width: 165px;">
                                            <option value=""><?php echo lang('エリア'); ?></option>
                                    <?php if(!empty($areas)&& $areas=='house'){$itemAreas=$itemAreas_H;}else{$itemAreas=$itemAreas_O;} ?>
                                        <?php foreach($itemAreas as $key=>$item): ?>
                                            <?php
                                                $select = '';
                                                if($key == $localtion){
                                                    $select = 'selected="selected"';
                                                }
                                            ?>
                                            <option <?=$select?> value="<?=$key?>"><?php echo lang($item);?></option>
                                        <?php endforeach; ?>
                                    <?php //endif; ?>
                                   	</select>
                                </div>
                                <div class="select_hide select_option">
                                    <select id="s2" class="select_p" name="layout" style="width: 165px;">
                                            <option value=""><?php echo lang('間取り'); ?></option>
                                    <?php if(!empty($itemLayouts)): ?>
                                        <?php foreach($itemLayouts as $key=>$item): ?>
                                            <?php
                                                $select = '';
                                                if($item->id == $layout){
                                                    $select = 'selected';
                                                    
                                                }
                                            ?>
                                            <option <?=$select?> value="<?=$item->id?>"><?php echo vcp_printf($item->name, current_lang_())?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                   	</select>
                                </div>
                                <div class="select_hide select_option">
                                    <select id="s3" class="select_p" name="type" style="width: 165px;">
                                        <option value=""><?php echo lang('タイプ') ?></option>
                                        <?php 
                                            $data_option = array(
                                                0 => lang('サービスアパートメント'),
                                                1 => lang('アパートメント'),
                                                2 => lang('戸建')
                                            );
                                            foreach($data_option as $key=>$item){
                                                $select = '';
                                                if($key == $type && $type != ''){
                                                    $select = 'selected';
                                                    
                                                }
                                                ?>
                                                <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                                <?php
                                            }
                                        ?>
                        			</select>
                                </div>
                                <div class="select_option">
                                   <select id="s4" class="select_p" name="size" style="width: 165px;">
                        				<option value=""><?php echo lang('面積'); ?></option>
                                        <?php 
                                            $data_option = array(
                                                '50' => lang('50㎡以下'),
                                                '51-81' => lang('51㎡～80㎡'),
                                                '81-100' => lang('81㎡～100㎡'),
                                                '101-150' => lang('101㎡～150㎡'),
                                                '151' => lang('151㎡以上')
                                            );
                                            foreach($data_option as $key=>$item){
                                                $select = '';
                                                if($key == $size){
                                                    $select = 'selected';
                                                    
                                                }
                                                ?>
                                                <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                                <?php
                                            }
                                        ?>
                        			</select>
                                </div>
                                
                                <div class="select_hide select_option">
                                    <select id="s5" class="select_p" name="rent" style="width: 165px;">
                        				<option value=""><?php echo lang('賃料'); ?></option>
                                        <?php 
                                            $data_option = array(
                                                
                                                '500' => lang('500USD以下'),
                                                '501-1000' => lang('501～1000USD'),
                                                '1001-1500' => lang('1001～1500USD'),
                                                '1501-2000' => lang('1501～2000USD'),
                                                '2001-2500' => lang('2001～2500USD'),
                                                '2501-3000' => lang('2501～3000USD'),
                                                '3001' => lang('3001USD以上')
                                                
                                            );
                                            foreach($data_option as $key=>$item){
                                                $select = '';
                                                if($key == $rent){
                                                    $select = 'selected';
                                                    
                                                }
                                                ?>
                                                <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                                <?php
                                            }
                                        ?>
                        			</select>
                                </div>
                            </div>
                            <div class="wrap-input ofice-option" style="display: none;"> 
                                <div class="select_option">
                                    <select id="s6" name="month_rent" style="width: 165px;">
                        				<option value=""><?php echo lang('賃料（月）'); ?></option>
                                        <?php 
                                                $data_option = array(
                                                    '1000' => lang('1000USD以下'),
                                                    '1001-1500' => '1001～1500USD',
                                                    '1501-2000' => lang('1501～2000USD'),
                                                    '2001-2500' => lang('2001～2500USD'),
                                                    '2501-3000' => lang('2501～3000USD'),
                                                    '3001-3500' => lang('3001～3500USD'),
                                                    '3501' => lang('3501USD以上')
                                                );
                                                foreach($data_option as $key=>$item){
                                                    $select = '';
                                                    if($key == $month_rent){
                                                        $select = 'selected';
                                                        
                                                    }
                                                    ?>
                                                    <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                                    <?php
                                                }
                                            ?>
                        			</select>
                                
                                </div>
                                
                                <div class="select_option">
                                    <select id="s7" name="size_rent" class="select_option" style="width: 165px;">
                        				<option value=""><?php echo lang('賃料（USD/m2)'); ?></option>
                                        <?php 
                                            $data_option = array(
                                                '10' => lang('10USD/㎡以下'),
                                                '11-25' => lang('11～25USD/㎡'),
                                                '26-49' => lang('26～49USD/㎡'),
                                                '50-99' => lang('50～99USD/㎡'),
                                                '100' => lang('100USD/㎡以上'),
                                            );
                                            foreach($data_option as $key=>$item){
                                                $select = '';
                                                if($key == $size_rent){
                                                    $select = 'selected';
                                                    
                                                }
                                                ?>
                                                <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                                <?php
                                            }
                                        ?>
                        			</select>
                                </div>
                            </div>
                            <div class="clearAll"></div>
                            <div class="submit">
                                <span class="submit-icon"><input name="search-opt" type="submit" value="<?php echo lang('検索'); ?>" /></span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
				
	</form>      
    
    <div class="clear"></div>
    <div class="search-s">
        <form action="<?=PATH_URL?>search" method="get">
            <div class="p111"><span><?php echo lang('キーワードから探す'); ?></span></div>
            <span class="select-custom" id="select-customcategory-1"><?=$opt == ''?lang('賃貸住宅'):(isset($opt_select[$opt])?$opt_select[$opt]:lang('賃貸住宅')); ?></span>
            <div class="opt-wap">
                
                <select name="opt" class="opt-1">
                <?php foreach($opt_select as $k=>$v):?>
                <?php
                $select = '';
                if($k == $opt){
                    $select = 'selected';
                    
                }
                ?>
                    <option <?=$select;?> value="<?=$k;?>"><?=$v;?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="wrap-s">
                <input placeholder="<?php echo lang('物件検索キーワード'); ?>" type="text" name="s" value="<?=$s==''?'':$s; ?>" />
                <input type="submit" name="send" value="<?php echo lang('検索') ?>" class="send_bg" />
            </div>
            <input type="submit" name="send" value="<?php echo lang('検索'); ?>" class="send" />
            
        </form>
    </div>
</div>