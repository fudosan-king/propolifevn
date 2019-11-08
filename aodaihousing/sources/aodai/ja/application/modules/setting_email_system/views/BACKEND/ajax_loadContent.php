<input type="hidden" value="<?php echo $start?>" id="start" />
<div class="content_table">
	<?php
		$oneTo = false;
		if ($result && count($result) == 1 && $result[0]->type == 'to') {
			$oneTo = true;
		}
	?>
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<th class="th_no_cursor" width="40">No.</th>
			<?php if (!$oneTo):?>
				<th class="th_no_cursor" width="31">
					<input type="checkbox" class="custom_chk" id="selectAllItems" onclick="selectAllItems(<?php echo count($result)?>)" />
				</th>
			<?php endif; ?>
			<th class="th_left" onclick="sort('name')"><div id="name" class="sort icon_no_sort">Name</div></th>
			<th class="th_left" onclick="sort('email')"><div id="email" class="sort icon_no_sort">Email</div></th>
			<th width="70" onclick="sort('type')"><div id="type" class="sort icon_no_sort">Type</div></th>
			<th class="th_last" width="100" onclick="sort('modified')"><div id="modified" class="sort icon_sort_asc">Modified</div></th>
		</tr>
		<?php
			if($result){
				$i=0;
				foreach($result as $k=>$v) {
		?>
		<tr class="item_row<?php echo $i?> <?php ($k%2==0) ? print 'row1' : print 'row2' ?>">
			<td class="td_center"><?php echo $k+1+$start?></td>
			<?php if (!$oneTo):?>
				<td class="td_no_padd">
					<input type="checkbox" class="custom_chk" id="item<?php echo $i?>" onclick="selectItem(<?php echo $i?>)" value="<?php echo $v->id?>" />
				</td>
			<?php endif; ?>

			<td class="th_left td_action">
				<div class="td_relative">
					<div class="action" <?php if ($oneTo) { echo 'style="width: 20px;"'; }?>>
						<a href="<?=PATH_URL.'admincp/'.$module.'/update/'.$v->id?>">
							<img class="action_first" alt="Edit item" src="<?=PATH_URL.'static/images/admin/icons/edit.png'?>" />
						</a>
						<?php if (!$oneTo):?>
							<img onclick="deleteItem(<?=$v->id?>)" alt="Delete item" src="<?=PATH_URL.'static/images/admin/icons/delete.png'?>" />
						<?php endif; ?>
					</div>
					<?php echo $v->name?>
				</div>
			</td>

			<td class="th_left td_action">
				<div class="td_relative">
					<?php echo $v->email?>
				</div>
			</td>

			<td class="td_center"><?php echo fn_type_email($v->type); ?></td>
			<td class="th_last td_center"><?php echo date('d-m-Y',strtotime($v->modified))?></td>
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
		<select id="per_page" onchange="searchContent(<?php echo $start?>,this.value)">
			<option <?php ($per_page==10) ? print 'selected="selected"' : print '' ?> value="10">10</option>
			<option <?php ($per_page==25) ? print 'selected="selected"' : print '' ?> value="25">25</option>
			<option <?php ($per_page==50) ? print 'selected="selected"' : print '' ?> value="50">50</option>
			<option <?php ($per_page==100) ? print 'selected="selected"' : print '' ?> value="100">100</option>
		</select>
	</div>
	
	<div class="pagination"><?php echo $this->adminpagination->create_links();?></div>
</div>
<div class="clearAll"></div>
<?php } ?>