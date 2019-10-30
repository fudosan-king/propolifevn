				<div class="left_content" style="background: #fff; width: 520px;">
					<div class="gr_list_news" style="width: 500px;">
						<div class="title_list_news" style="width: 350px; padding-bottom: 0px;"><a href="<?=PATH_URL.SEOHTML($name_catsub[0]->name).'/'.$name_sub[0]->id.'/'.SEO($name_sub[0]->name)?>" style="color: #D2147F"><?=$name_sub[0]->name?></a></div>
						<div class="date_detail_news"><?=date('d/m/Y, H:i',strtotime($result[0]->created))?> GMT+7</div>
						<div class="icon_detail"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?=PATH_URL.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)?>&t=<?=$result[0]->title?>"><img alt="2dep - Share Facebook" src="<?=PATH_URL.'static/images/icon_fb.gif'?>" /></a><a target="_blank" href="<?=PATH_URL.'news/printDetail/'.$result[0]->id?>"><img alt="2dep - Print bản tin" src="<?=PATH_URL.'static/images/icon_print.gif'?>" /></a></div>
						
						<div class="title_detail"><?=$result[0]->title?></div>
						<div class="desc_detail"><?=$result[0]->description?></div>
						<div class="content_detail"><?=parserEditorHTML($result[0]->content,$result[0]->tags)?></div>
						
						<?php
							if($result[0]->tags!=''){
								$arr_tag = explode(',',$result[0]->tags);
						?>
						<div class="bg_tag" style="width: 440px;">
							<?php
								$i = 1;
								foreach($arr_tag as $v){
									if($i==1){
										print '<a style="color: #838486;" href="'.PATH_URL.'tag?t='.str_replace(' ','+',trim($v)).'">'.$v.'</a>';
									}else{
										print ', <a style="color: #838486;" href="'.PATH_URL.'tag?t='.str_replace(' ','+',trim($v)).'">'.$v.'</a>';
									}
									$i++;
								}
							?>
						</div>
						<?php } ?>
						

						<?php
							for($i=0;$i<count($banner_bottom_detail);$i++){
								if($banner_bottom_detail[$i]){
									foreach($banner_bottom_detail[$i] as $k=>$v){
										if(substr($v->image,-3)!='swf'){
						?>
						<div class="banner_bottom_detail">
							<a onclick="clickBanner(<?=$v->id?>)" target="_blank" href="<?=$v->link?>"><img width="468" height="60" alt="2dep Banner Right Detail" src="<?=PATH_URL.'static/uploads/banner/'.$v->image?>" /></a>
						</div>
						<?php }else{ ?>
						<div class="banner_bottom_detail">
							<a href="<?=$v->link?>" target="_blank" onclick="clickBanner(<?=$v->id?>)">
								<object width="468" height="60" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
									<param value="<?=PATH_URL.'static/uploads/banner/'.$v->image?>" name="movie">
									<param value="transparent" name="wmode">
									<param value="high" name="quality">
									<embed width="468" height="60" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" wmode="transparent" allowfullscreen="true" src="<?=PATH_URL.'static/uploads/banner/'.$v->image?>">
								</object>
							</a>
						</div>
						<?php }}}} ?>
						
						<?php if($result[0]->show_comment==1){ ?>
						<div class="gr_comment">
							<script type="text/javascript">
								<?php if($this->session->flashdata('alertcontent')){ ?>
								alert('<?=$this->session->flashdata('alertcontent')?>');
								<?php } ?>

								function reset(){
									$('#comment_name').val('');
									$('#comment_email').val('');
									$('#comment_title').val('');
									$('#comment_content').val('');
									$('#comment_captcha').val('');
									return false;
								}
								
								function checkForm(){
									if($('#comment_name').val()=='' || $('#comment_email').val()=='' || $('#comment_title').val()=='' || $('#comment_content').val()=='' || $('#comment_captcha').val()==''){
										alert('Vui lòng điền đầy đủ thông tin.');
										return false;
									}
									var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
									if (!filter.test($('#comment_email').val())) {
										alert('Email không hợp lệ.');
										$('#comment_email').focus();
										return false;
									}
								}
							</script>
							<div class="title_comment">Ý kiến bạn đọc</div>
							<?php if($comment){ ?>
							<div class="content_comment">
								<div class="comment_auto">
									<?php
										$i = 1;
										foreach($comment as $v){
									?>
									<div class="comment_title"><?=$v->title?></div>
									<div class="comment_info">(<?=$v->name?> - <?=$v->email?>)</div>
									<div class="comment_fullcontent" <?php if($i!=count($comment)){ print 'style="padding-bottom: 15px;"'; } ?>><?=$v->content?></div>
									<?php $i++;} ?>
								</div>
							</div>
							<?php } ?>
							<form action="" method="post">
								<div class="gr_item_comment">
									<div class="item_name">HỌ TÊN</div>
									<div class="item_input"><input value="<?php if($this->session->userdata('name')){ print $this->session->userdata('name'); } ?>" id="comment_name" name="comment_name" type="text" /></div>
								</div>
								<div class="gr_item_comment">
									<div class="item_name">EMAIL</div>
									<div class="item_input"><input value="<?php if($this->session->userdata('email')){ print $this->session->userdata('email'); } ?>" id="comment_email" name="comment_email" type="text" /></div>
								</div>
								<div class="gr_item_comment" style="width: 370px; margin-top: 0px;">
									<div class="item_name">TIÊU ĐỀ</div>
									<div class="item_input"><input value="<?php if($this->session->userdata('title')){ print $this->session->userdata('title'); } ?>" id="comment_title" style="width: 368px;" name="comment_title" type="text" /></div>
								</div>
								<div class="gr_item_comment" style="width: 480px; margin-top: 0px;">
									<div class="item_name">NỘI DUNG</div>
									<div class="item_input"><textarea id="comment_content" name="comment_content"><?php if($this->session->userdata('content')){ print $this->session->userdata('content'); } ?></textarea></div>
								</div>
								<div class="gr_captcha">
									<div class="img_captcha"><img alt="Captcha - 2dep" src="<?=PATH_URL.'news/ImageCaptcha/'.time()?>" /></div>
									<div class="gr_item_comment" style=" margin-top: 0px;">
										<div class="item_name">MÃ XÁC NHẬN</div>
										<div class="item_input"><input style="width: 70px;" id="comment_captcha" name="comment_captcha" type="text" /></div>
									</div>
								</div>
								<div class="bt_comment"><input onclick="return checkForm();" style="margin-right: 10px;" type="image" src="<?=PATH_URL.'static/images/bt_agree.gif'?>" /><input onclick="reset(); return false" type="image" src="<?=PATH_URL.'static/images/bt_reset.gif'?>" /></div>
							</form>
						</div>
						<?php } ?>
						
						<?php if($other){ ?>
						<div class="gr_list_other">
							<div class="title_other_news">Các tin khác</div>
							
							<ul>
								<li class="content_promotions" style="width: 490px;">
									<ul>
										<?php foreach($other as $v){ ?>
										<li class="other_news_middle" style="margin-top: 5px;"><a href="<?=PATH_URL.SEOHTML($name_catsub[0]->name).'/'.SEOHTML($name_sub[0]->name).'/'.$v->id.'/'.SEO($v->title)?>"><?=$v->title?></a> (<?=date('d/m',strtotime($v->created))?>)</li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</div>
						<?php } ?>
					</div>
				</div>
				
				<div class="right_content" style="display: inline; margin-right: 5px; width: 270px;">
					<?=modules::run('right_content',$result[0]->cat_id,1)?>
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
						<a href="<?=$v->link?>" target="_blank" onclick="clickBanner(<?=$v->id?>)">
							<object width="160" height="600" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
								<param value="<?=PATH_URL.'static/uploads/banner/'.$v->image?>" name="movie">
								<param value="transparent" name="wmode">
								<param value="high" name="quality">
								<embed width="160" height="600" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" wmode="transparent" allowfullscreen="true" src="<?=PATH_URL.'static/uploads/banner/'.$v->image?>">
							</object>
						</a>
					</div>
					<?php }}}} ?>
				</div>		