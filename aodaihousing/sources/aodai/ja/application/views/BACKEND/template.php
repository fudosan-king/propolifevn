<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?=PATH_URL.'static/images/admin/'?>favicon.png" type="image/x-icon" rel="icon" />
<link href="<?=PATH_URL.'static/images/admin/'?>favicon.png" type="image/x-icon" rel="shortcut icon" />
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?=PATH_URL.'static/css/admin/'?>styles.css?v=<?php echo VERSION_SCRIPT; ?>" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="<?=PATH_URL.'static/'?>plugin/elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?=PATH_URL.'static/'?>plugin/elfinder/css/theme.css">
<link rel="stylesheet" href="<?=PATH_URL.'static/css/admin/'?>validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="http://www.position-relative.net/creation/formValidator/css/template.css" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
var root = '<?=PATH_URL?>';
<?php if($this->uri->segment(2)!='update_profile'){ ?>
var module = '<?=$module?>';
<?php } ?>
</script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/editor/scripts/innovaeditor.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/jquery.ToTop.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/jquery_caledar.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/custom_forms.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/jquery.form.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/jquery.url.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/ajaxupload.3.5.js"></script>
<link rel="stylesheet" href="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.pack.js"></script>

<link href="<?=PATH_URL?>static/plugin/select/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=PATH_URL?>static/plugin/select/select2.js"></script>

<script src="<?=PATH_URL?>static/js/admin/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=PATH_URL?>static/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<!-- CKEditor 4 and CKFinder 3 -->
<script type="text/javascript" src="<?=PATH_URL?>static/plugin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=PATH_URL?>static/plugin/ckfinder/ckfinder.js"></script>

<script type="text/javascript" src="<?=PATH_URL?>static/js/admin/admin.js?v=<?php echo VERSION_SCRIPT; ?>"></script>
<script type="text/javascript" src="<?= PATH_URL ?>static/js/jscopy.js?v=<?php echo VERSION_SCRIPT; ?>"></script>
<title>Admin Control Panel</title>
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
</head>
<body>
<div class="topNav">
	<div class="nameNav"></div>
	<div class="userNav">
		<ul>
			<li class="profile"><a href="<?=PATH_URL.'admincp/update_profile'?>"><img alt="profile" src="<?=PATH_URL.'static/images/admin/userPic.png'?>" /><span><?=$this->session->userdata('userInfo')?></span></a></li>
			<li class="li_last_child"><a href="<?=PATH_URL.'admincp/logout'?>"><img alt="profile" src="<?=PATH_URL.'static/images/admin/logout.png'?>" /><span>Logout</span></a></li>
		</ul>
	</div>
</div>
<div class="header">
	<div class="logo"><img alt="" src="<?=PATH_URL.'static/images/admin/logo.png'?>" /></div>
    
    <div class="midNav">
		<ul>
			<?=$toolbar; ?>
		</ul>
	</div>
	
</div>

<div id="content">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td valign="top" width="237">
				<div class="left_content">
					<ul>
						<li style="margin-top: 0px;"><a <?php if($this->uri->segment(2)==''){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp'?>"><span class="menu_dashboard">Dashboard</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='category'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/category/'?>"><span class="menu_items">Manager Category</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='area'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/area/'?>"><span class="menu_items">Manager Areas</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='equipments'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/equipments/'?>"><span class="menu_items">Manager Equipments</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='common_facilities'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/common_facilities/'?>"><span class="menu_items">Manager Common Facilities</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='tags'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/tags/'?>"><span class="menu_items">Manager Tags</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='offices'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/offices/'?>"><span class="menu_items">Manager Offices</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='houses'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/houses/'?>"><span class="menu_items">Manager Houses</span></a></li>
						<li><a <?php if($this->uri->segment(2)=='news'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/news/'?>"><span class="menu_items">Manager News</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='bannertop'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/bannertop/'?>"><span class="menu_items">Manager Banner Top</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='bannertopoffice'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/bannertopoffice/'?>"><span class="menu_items">Manager Banner Top Office</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='bannertoptext'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/bannertoptext/'?>"><span class="menu_items">Manager Text Banner Top</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='bannersidebar'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/bannersidebar/'?>"><span class="menu_items">Manager Banner Sidebar</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='bannerhome'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/bannerhome/'?>"><span class="menu_items">Manager Banner Home</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='contact'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/contact/'?>"><span class="menu_items">Manager contact</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='contact_request_email'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/contact_request_email/'?>"><span class="menu_items"> Manager Request Mail</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='building'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/building/'?>"><span class="menu_items">Manager Building</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='building_map'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/building_map'?>"><span class="menu_items">Manager Building In Map</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='building_buy_sell'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/building_buy_sell'?>"><span class="menu_items">Manager Building Buy Sell</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='estate_owners'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/estate_owners/'?>"><span class="menu_items">Estate Owners</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='user_estate_owners'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/user_estate_owners/'?>"><span class="menu_items">User Estate Owners</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='setting_equipment_facilities'){?>class="active"<?php }?> href="<?=PATH_URL.'admincp/setting_equipment_facilities/'?>"><span class="menu_items">Setting Equipment Facilities</span></a></li>
                        <li><a <?php if($this->uri->segment(2)=='customer_comment'){?>class="active"<?php }?> href="<?=PATH_URL.'admincp/customer_comment/'?>"><span class="menu_items">Manager Customer Comment</span></a></li>

						<?php /*?>
							<li><a <?php if($this->uri->segment(2)=='media'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/media/'?>"><span class="menu_items">Manager Media</span></a></li>
						<?php */?>
						
						<?php if(checkPermission()): ?>
                        	<li><a <?php if($this->uri->segment(2)=='user'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/user/'?>"><span class="menu_items">Manager Users</span></a></li>
						<?php endif; ?>
                        <li><a <?php if($this->uri->segment(2)=='setting'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/setting/'?>"><span class="menu_setting">Setting</span></a></li>

                        <li><a <?php if($this->uri->segment(2)=='setting_email_system'){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/setting_email_system'?>"><span class="menu_setting">Setting Email System</span></a></li>
					</ul>
				</div>
			</td>

			<td valign="top">
				<div class="right_content">
					<?=$content?>
				</div>
			</td>
		</tr>
	</table>
</div>

<div class="footer"><div class="text_footer">&copy; Copyright 2012. All rights reserved. Developed by <a target="_blank" href="http://jv-it.com.vn">Jv-it</a></div></div>
</body>
</html>