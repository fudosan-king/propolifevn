<?php

function move_submenu(&$parent_menu, $menu_item, $index)
{ // Reorder menu item.
	$currentIndex = array_search($menu_item, $parent_menu);
	unset($parent_menu[$currentIndex]);
	array_splice($parent_menu, $index - 1, 0, array($menu_item));
}

function add_shop_submenu()
{ // Add lunch-box products to Product Menu
	global $menu, $submenu;
	add_submenu_page('edit.php?post_type=product', __('お弁当', 'elt'), __('お弁当', 'elt'), 'manage_product_terms', 'edit.php?&post_type=product&product_cat=lunch-box');
	move_submenu($submenu['edit.php?post_type=product'], end($submenu['edit.php?post_type=product']), 2);
}

function menu_highlight()
{ // Add highlight for custom
	global $parent_file, $submenu_file, $post_type;

	switch ($post_type) {
		case 'product' :
			$product_cat = !isset($_REQUEST['product_cat']) ? "" : $_REQUEST['product_cat'];
			if ($product_cat == 'lunch-box') {
				$submenu_file = 'edit.php?&post_type=product&product_cat=lunch-box';
			}
			break;
	}
}

add_action('admin_menu', 'add_shop_submenu');
add_action('admin_head', 'menu_highlight');
?>