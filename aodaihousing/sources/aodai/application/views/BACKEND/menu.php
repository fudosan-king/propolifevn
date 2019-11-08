<?php 
	if(!empty($data_menu))
	{
		foreach($data_menu as $menu)
		{
	?>
		<li><a <?php if($this->uri->segment(2)== "{$menu->name}"){ ?>class="active"<?php } ?> href="<?=PATH_URL.'admincp/'.$menu->name?>"><span class="menu_items"><?=$menu->name?></span></a></li>
	<?php	
		}
	}
?>