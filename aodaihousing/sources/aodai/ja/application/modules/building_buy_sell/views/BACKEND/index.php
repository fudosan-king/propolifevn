<input type="hidden" value="<?=$this->session->userdata('start')?>" id="start" />
<input type="hidden" value="<?=$default_func?>" id="func_sort" />
<input type="hidden" value="<?=$default_sort?>" id="type_sort" />
<div id="indexView" class="table">
	<div class="head_table">
		<div class="head_title_table"><?php echo fn_convert_label_module($module); ?></div>
		<div class="head_search">
			<div class="head_search_title fontface" style="margin-top: 9px">Search | </div>
			<div class="head_search_title">From:</div>
			<div class="head_search_input"><input onkeypress="return enterSearch(event)" id="caledar_from" type="text" /></div>
			<div class="head_search_title">To:</div>
			<div class="head_search_input"><input onkeypress="return enterSearch(event)" id="caledar_to" type="text" /></div>
			<div class="head_search_title">Content:</div>
			<div class="head_search_input"><input onkeypress="return enterSearch(event)" id="search_content" onclick="if(this.value=='type here...'){this.value=''}" onblur="if(this.value==''){this.value='type here...'}" class="input_last" type="text" value="type here..." /><div onclick="searchContent(0)" class="bt_search"><img alt="Button search" src="<?=PATH_URL.'static/images/admin/icons/searchSmall.png'?>" /></div></div>
		</div>
	</div>
	<div class="clearAll"></div>
	
	<div id="ajax_loadContent"><img class="loading" alt="Ajax Loader" src="<?=PATH_URL.'static/images/admin/ajax-loader.gif'?>" /></div>
</div>