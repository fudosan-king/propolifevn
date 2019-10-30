<?php
$data_name =array(
    $result->name, $result->name_hiragana,$result->name_alphabet
);

?>
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
	<div class="clearAll"></div>
    <div class="body">
        <?php if($result->name != ''): ?>
            <div class="list tipBlue">
                <span class="legend">Name: </span><span><?=$result->name;?></span><br />
            </div>
        <?php endif; ?>

        <?php if($result->name_hiragana != ''): ?>
            <div class="list tipBlue">
                <span class="legend">Name hiragana: </span><span><?=$result->name_hiragana != '0'?$result->name_hiragana:'';?></span><br />
            </div>
        <?php endif; ?>

        <div class="list tipBlue">
            <span class="legend">Name alphabet: </span><span><?=$result->name_alphabet != '0'?$result->name_alphabet:'';?></span><br />
        </div>

        <div class="list tipBlue">
            <span class="legend">Email: </span><span><?=$result->email;?></span><br />
        </div>

        <div class="list tipBlue">
            <span class="legend">Phone: </span><span><?=$result->tel;?></span><br />
        </div>

        <div class="list tipBlue">
            <span class="legend">Address: </span><span><?=$result->address;?></span><br />
        </div>

        <div class="list tipBlue">
            <span class="legend">Date: </span><span><?=$result->contents_4_value;?></span><br />
        </div>

        <div class="list tipBlue">
            <span class="legend">Content: </span><span><?=$result->content;?></span><br />
        </div>

        <?php if($result->type != '' && $result->type !='building'): ?>
            <div class="list tipBlue">
            <?php if($result->current_lang && $result->current_lang == 'vn'):?>
                    <span class="legend">Link site: </span><span><a target="_blank" href="<?=PATH_URL . 'vn/'.$result->type . '/detail/' . $result->id_client;?>">click here</a></span><br />
                <?php else:?>
                    <span class="legend">Link site: </span><span><a target="_blank" href="<?=PATH_URL .$result->type . '/detail/' . $result->id_client;?>">click here</a></span><br />
                <?php endif;?>
            </div>
        <?php endif; ?>

        <?php if($result->type == 'building'): ?>
            <div class="list tipBlue">
                <?php if($result->current_lang && $result->current_lang == 'vn'): ?>
                    <span class="legend">Link site: </span><span><a target="_blank" href="<?=PATH_URL .'vn/'.$result->type . '/' .$result->building_type.'/'. $result->id_client.'/'.$building_name;?>">click here</a></span><br />
                <?php else: ?>
                    <span class="legend">Link site: </span><span><a target="_blank" href="<?=PATH_URL .$result->type . '/' .$result->building_type.'/'. $result->id_client.'/'.$building_name;?>">click here</a></span><br />
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="list tipBlue">
            <span class="legend">Time: </span><span><?php echo date("Y-m-d H:i:s", strtotime($result->created))?></span><br />
        </div>
    </div>

</div>
<style type="text/css">
.body{
    padding: 12px 14px;
}
.list .legend{
    padding-bottom: 4px;
    font-weight: bold;
}
.list{
    padding: 5px 0;
}
</style>

