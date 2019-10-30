<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?=PATH_URL.'static/css/'?>styles.css" type="text/css">
<script type="text/javascript" src="<?=PATH_URL.'static/js/'?>jquery-1.4.2.min.js"></script>
<meta name="description" content="<?=$result[0]->description?>" />
<title><?=$result[0]->title.' - 2dep'?></title>
<meta name="keywords" content="<?=$result[0]->tags?>" />
<!--[if ie 6]>
<style>
html, body{
behavior: url('<?php echo PATH_URL.'static/css/' ?>csshover3.htc');
}

.png{
behavior: url('<?php echo PATH_URL.'static/css/' ?>iepngfix.htc');
}
</style>
<script type="text/javascript" src="<?php echo PATH_URL.'static/js/' ?>iepngfix_tilebg.js"></script>
<![endif]-->
<style>
body,html{ background: #ffffff; }
</style>
<script type="text/javascript">
function printPage(){
	//$('#btPrint').hide();
	window.print();
}
</script>
</head>
<body>
<center>
<div id="body">
	<div id="main" style="width: 500px; text-align: left;">
		<div style="float: left; width: 100%; border-bottom: 2px solid #D2147F; padding-bottom: 3px;"><a href="<?=PATH_URL?>"><img width="150" alt="Logo 2dep" src="<?=PATH_URL_IMAGES.'static/uploads/news/medium/default.png'?>" /></a></div>
		<div id="btPrint" style="float: left; width: 100%; margin-top:10px;"><a onclick="printPage();" href="javascript:void(0)"><img alt="Button Print - 2dep" src="<?=PATH_URL_IMAGES.'static/images/bt_print.gif'?>" /></a></div>
		<div class="gr_list_news" style="width: 100%; margin: 5px 0 0 0;">
			<div class="title_detail"><?=$result[0]->title?></div>
			<div class="desc_detail"><?=$result[0]->description?></div>
			<div class="content_detail"><?=parserEditorHTML($result[0]->content)?></div>
			
			<?php
				if($result[0]->tags!=''){
					$arr_tag = explode(',',$result[0]->tags);
			?>
			<div class="bg_tag" style="width: 440px;">
				<?php
					$i = 1;
					foreach($arr_tag as $v){
						if($i==1){
							print '<a style="color: #838486;" href="'.PATH_URL.'tag?t='.trim($v).'">'.$v.'</a>';
						}else{
							print ', <a style="color: #838486;" href="'.PATH_URL.'tag?t='.trim($v).'">'.$v.'</a>';
						}
						$i++;
					}
				?>
			</div>
			<?php } ?>

			<?php if(!empty($other)){ ?>
			<div class="gr_list_other" style="padding: 0px;">
				<div class="title_other_news">Các tin khác</div>
				
				<ul>
					<li class="content_promotions" style="width: 480px;">
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
		<div style="float: left; width: 100%; border-top: 2px solid #D2147F; margin-top: 5px; padding-top: 2px; padding-bottom: 10px;">
			Copyright &copy; 2011 <a style="color: #686E7A" href="http://www.2dep.net/">www.2dep.net</a>. All Rights Reserved. Developed by <a href="http://wst-group.com" style="color: #686E7A" target="_blank">WST-Group</a>
		</div>
	</div>
</div>
</center>
</body>
</html>