<input type="hidden" value="<?=$start?>" id="start" />
<div class="content_table">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<th class="th_no_cursor" width="40">No.</th>
			<th class="th_no_cursor" width="31"><input type="checkbox" class="custom_chk" id="selectAllItems" onclick="selectAllItems(<?=count($result)?>)" /></th>
			<th class="th_left" onclick="sort('title')"><div id="title" class="sort icon_no_sort">Title</div></th>
            <th class="th_left" onclick="sort('title')"><div id="title" class="sort icon_no_sort">Images</div></th>
			<th width="70" onclick="sort('status')"><div id="status" class="sort icon_no_sort">Status</div></th>
			<th class="th_last" width="100" onclick="sort('created')"><div id="created" class="sort icon_sort_asc">Created</div></th>
		</tr>
		<?php
			if($result){
				$i=0;
				foreach($result as $k=>$v){
		?>
		<tr class="item_row<?=$i?> <?php ($k%2==0) ? print 'row1' : print 'row2' ?>">
			<td class="td_center"><?=$k+1+$start?></td>
			<td class="td_no_padd"><input type="checkbox" class="custom_chk" id="item<?=$i?>" onclick="selectItem(<?=$i?>)" value="<?=$v->id?>" /></td>
			<td class="th_left td_action"><div class="td_relative"><div class="action"><a href="<?=PATH_URL.'admincp/'.$module.'/update/'.$v->id?>"><img class="action_first" alt="Edit item" src="<?=PATH_URL_IMAGES.'static/images/admin/icons/edit.png'?>" /></a><img onclick="deleteItem(<?=$v->id?>)" alt="Delete item" src="<?=PATH_URL_IMAGES.'static/images/admin/icons/delete.png'?>" /></div><?=$v->title?></div></td>
            <td class="th_left td_action"><img height="150" src="<?=PATH_URL_IMAGES?>static/uploads/bannerhome/<?=$v->images;?>" /></td>
			<td class="td_center" id="loadStatusID_<?=$v->id?>"><a href="javascript:void(0)" onclick="updateStatus(<?=$v->id?>,<?=$v->status?>,'<?=$module?>')"><img alt="Checked item" src="<?=PATH_URL_IMAGES.'static/images/admin/icons/'?><?php ($v->status==0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" /></a></td>
			<td class="th_last td_center"><?=date('d-m-Y',strtotime($v->created))?></td>
		</tr>
		<?php $i++;}}else{ ?>
		<tr class="row1">
			<td class="th_last td_center" colspan="50" style="font-size: 20px; padding: 50px 0">No data</td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php if($result){ ?>
<div class="footer_table">
	<div class="item_per_page">Items per page:</div>
	<div class="select_per_page">
		<select id="per_page" onchange="searchContent(<?=$start?>,this.value)">
			<option <?php ($per_page==10) ? print 'selected="selected"' : print '' ?> value="10">10</option>
			<option <?php ($per_page==25) ? print 'selected="selected"' : print '' ?> value="25">25</option>
			<option <?php ($per_page==50) ? print 'selected="selected"' : print '' ?> value="50">50</option>
			<option <?php ($per_page==100) ? print 'selected="selected"' : print '' ?> value="100">100</option>
		</select>
	</div>
	
	<div class="pagination"><?=$this->adminpagination->create_links();?></div>
</div>
<div class="clearAll"></div>
<?php } ?>