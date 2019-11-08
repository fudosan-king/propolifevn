				<div class="left_content" style="background: #fff;">
					<div class="gr_list_news" style="width: 610px;">
						<div class="bg_tag"><?=$this->input->get('t')?></div>
						<?php
							if($result){
								foreach($result as $k=>$v){
									$name_cat = $this->home_model->getDetailCategory($v->cat_id);
									$name_sub = $this->home_model->getDetailCategory($v->parent_cat_id);
						?>
						<div class="gr_item_list_news" <?php if($k==0){ print 'style="margin-top: 15px;"'; } ?>>
							<div class="item_image" onclick="location.href='<?=create_url().SEOHTML($name_sub[0]->name).'/'.SEOHTML($name_cat[0]->name).'/'.$v->id.'/'.SEO($v->title)?>'" style="background: url(<?=PATH_URL.'static/uploads/news/medium/'.$v->image?>) center center no-repeat; width: 150px; height: 90px; cursor: pointer;"></div>
							<h1 style="color: #ed8b0d; padding-bottom: 2px;"><a style="color: #ED8B0D" href="<?=create_url().SEOHTML($name_sub[0]->name).'/'.SEOHTML($name_cat[0]->name).'/'.$v->id.'/'.SEO($v->title)?>"><?=$v->title?></a></h1><span style="color: #D2147F"><?=date('H:i',strtotime($v->created))?></span><span style="color: #848484"> | <?=date('d/m/Y',strtotime($v->created))?></span><br/><br/><?=$v->description?>
						</div>
						<?php }} ?>
						
						<?php if($this->pagination->total_rows > $this->pagination->per_page){ ?>
						<div class="pagination"><?=$this->pagination->create_links();?></div>
						<?php } ?>
					</div>
				</div>
				
				<div class="right_content">
					<?=modules::run('right_content')?>
				</div>