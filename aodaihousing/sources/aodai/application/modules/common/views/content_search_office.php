<?php
$check_house = 'checked="checked"';
$check_office = '';
if($areas == 'house'){
    $check_house = 'checked="checked"';
}elseif($areas == 'office') {
    $check_office = 'checked="checked"';
    $check_house = '';
}
?>
<div class="content-search">
    <div class="mail-s">
        <a class="f_map" href="<?=PATH_URL?>common/map"><span>ホーチミン地図</span></a>
    </div>  
    
    
    <form action="<?=PATH_URL?>search" method="get" class="search-option-f">
        <div class="content-search-left">
            <div class="step-1">
                <div class="header-step1">
                    <div class="icon-step-1">
                        <span>１．物件の種類をお選びください</span>
                    </div>
                </div>
                <div class="option-s">
                    <div class="option" id="option-2">
                        <div class="option-icon option-icon-2">
                            <span class="name-option">オフィス・店舗</span>
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
                            <span>2．条件をお選びください</span>
                        </div>
                    </div>
                    <div class="option-s">
                        <div class="wrap-opt">
                            <div class="wrap-input">
                                <div id="areas" class="select_option">
                                    <select class="select_p select_option" name="areas" style="width: 134px;">
                                        <option value="">エリア</option>
                                    <?php if(!empty($itemAreas_O)): ?>
                                        <?php foreach($itemAreas_O as $key=>$item): ?>
                                            <?php
                                                $select = '';
                                                if($key == $localtion){
                                                    $select = 'selected';
                                                    
                                                }
                                            ?>
                                            <option <?=$select; ?> value="<?=$key?>"><?=lang($item)?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="select_option">
                                   <select class="select_p" name="size" style="width: 134px;">
                        				<option value="">面積</option>
                                        <?php 
                                            $data_option = array(
                                                '50' => '50㎡以下',
                                                '51-81' => '51㎡～80㎡',
                                                '81-100' => '81㎡～100㎡',
                                                '101-150' => '101㎡～150㎡',
                                                '151' => '151㎡以上'
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
                                <div class="select_option">
                                    <select name="month_rent" style="width: 134px;">
                        				<option value="">賃料（月）</option>
                                        <?php 
                                                $data_option = array(
                                                    '1000' => '1000USD以下',
                                                    '1501-2000' => '1501～2000USD',
                                                    '2001-2500' => '2001～2500USD',
                                                    '2501-3000' => '2501～3000USD',
                                                    '3501-3500' => '3001～3500USD',
                                                    '3501' => '3501USD以上'
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
                                    <select name="size_rent" style="width: 134px;">
                        				<option value="">賃料（USD/m2)</option>
                                        <?php 
                                            $data_option = array(
                                                '10' => '10USD/㎡以下',
                                                '11-25' => '11～25USD/㎡',
                                                '26-49' => '26～49USD/㎡',
                                                '50-99' => '50～99USD/㎡',
                                                '100' => '100USD/㎡以上',
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
                                <span class="submit-icon"><input name="search-opt" type="submit" value="検索" /></span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
				
	</form>      
    
    
    <div class="search-s">
        <form action="<?=PATH_URL?>search" method="get">
            <div class="p111"><span>キーワードから探す</span></div>
            <div class="wrap-s">
                <input type="text" name="s" value="物件検索キーワード" />
            </div>
            <input type="submit" name="send" value="検索" class="send" />
            
        </form>
    </div>
</div>