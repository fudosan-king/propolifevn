				<div class="left_content" style="background: #fff; width: 520px;">
					<div class="gr_list_news">
						<div class="title_list_news"><?=$name_cat[0]->name?></div>
						<?php
							if($result){
								foreach($result as $v){
								$name_sub = $this->home_model->getDetailCategory($v->cat_id);
						?>
						<div class="gr_item_list_news">
							<div class="item_image" onclick="location.href='<?=create_url().SEOHTML($name_cat[0]->name).'/'.SEOHTML($name_sub[0]->name).'/'.$v->id.'/'.SEO($v->title)?>'" style="background: url(<?=PATH_URL.'static/uploads/news/medium/'.$v->image?>) center center no-repeat; width: 150px; height: 90px; cursor: pointer;"></div>
							<h1 style="color: #ed8b0d; padding-bottom: 2px;"><a style="color: #ED8B0D" href="<?=create_url().SEOHTML($name_cat[0]->name).'/'.SEOHTML($name_sub[0]->name).'/'.$v->id.'/'.SEO($v->title)?>"><?=$v->title?></a></h1><span style="color: #D2147F"><?=date('H:i',strtotime($v->created))?></span><span style="color: #848484"> | <?=date('d/m/Y',strtotime($v->created))?></span><br/><br/><?=$v->description?>
						</div>
						<?php } ?>
						
						<?php if($this->mypagination->total_rows > $this->mypagination->per_page){ ?>
						<div class="pagination"><?=$this->mypagination->create_links();?></div>
						<?php }} ?>
					</div>
				</div>
				
				<div class="right_content" style="display: inline; margin-right: 5px; width: 270px;">
					<?=modules::run('right_content',$id,1)?>
				</div>
				
				<div style="float: left; width: 160px;">
					<?php
						for($i=0;$i<count($banner_right_detail);$i++){
							if($banner_right_detail[$i]){
								foreach($banner_right_detail[$i] as $k=>$v){
									if(substr($v->image,-3)!='swf'){
					?>
					<div class="img_banner_right">
						<a onclick="clickBanner(<?=$v->id?>)" target="_blank" href="<?=$v->link?>"><img alt="2dep Banner Right Detail" src="<?=PATH_URL.'static/uploads/banner/'.$v->image?>" /></a>
					</div>
					<?php }else{ ?>
					<div class="img_banner_right">
						<object onclick="clickBanner(<?=$v->id?>)" width="160" height="600" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
							<param value="<?=PATH_URL.'static/uploads/banner/'.$v->image?>" name="movie">
							<param value="transparent" name="wmode">
							<param value="high" name="quality">
							<embed width="160" height="600" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" wmode="transparent" allowfullscreen="true" src="<?=PATH_URL.'static/uploads/banner/'.$v->image?>">
						</object>
					</div>
					<?php }}}} ?>
				</div>