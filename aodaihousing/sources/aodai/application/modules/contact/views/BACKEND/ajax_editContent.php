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
        <?php if($result->type != ''): ?>
        <div class="list tipBlue">
            <span class="legend">Link site: </span><span><a target="_blank" href="<?=PATH_URL .$result->type . '/detail/' . $result->id_client;?>">click here</a></span><br />
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

