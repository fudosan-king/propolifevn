<!doctype html>
<html class="no-js">

	<head>
		<?php get_template_part('template-parts/headers/content', 'head'); ?>
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-525GQWZ"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!-- Google Tag Manager (noscript) for account minh@fudosan-king.jp-->
		<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7483RD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
		<!-- End Google Tag Manager (noscript) -->
	    <div id="page">
	    	<?php 
	    		get_template_part('template-parts/headers/content', 'header'); 
	    	?>
	    	<div class="container" <?php if(is_front_page()) { echo 'style="display:none;"';} ?>>
	    	<?php
	    	//Show breadcrumb
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?>
			</div>