<!doctype html>
<html>

<?php 
$page_info = get_page_by_path('general_addition_info');
$header_info = get_field('header', $page_info);
$body_info = get_field('body', $page_info);

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_url( $custom_logo_id , 'full' );

// SEO Support
$seo_title = !empty(get_field('seo_title', $page_info)) ? get_field('seo_title', $page_info) : sprintf("%s - %s", get_the_title(), get_bloginfo('name'));
$seo_description = !empty(get_field('seo_description', $page_info)) ? get_field('seo_description', $page_info) : get_option( 'blogdescription' );
$seo_keywords = !empty(get_field('seo_keywords', $page_info)) ? get_field('seo_keywords', $page_info) : '';
$seo_image = !empty(get_field('seo_image', $page_info)) ? get_field('seo_image', $page_info)['url'] : $image;

if (is_page() || is_single()){

	$seo_title = !empty(get_field('seo_title')) ? get_field('seo_title') : $seo_title;
	$seo_description = !empty(get_field('seo_description')) ? get_field('seo_description'): $seo_description;
	$seo_keywords = !empty(get_field('seo_keywords')) ? get_field('seo_keywords') : $seo_keywords;
	$seo_image = !empty(get_field('seo_image')) ? get_field('seo_image') : $seo_image;
}

?>

<head>

    <meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">

	<!-- <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="favicons/manifest.json">
	<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5"> -->
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_DIR; ?>/my360/dist/photo-sphere-viewer.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <meta property="og:title" content="<?php echo $seo_title; ?>">
    <meta property="og:description" content="<?php echo $seo_description; ?>">
    <meta property="og:image" content="<?php echo $seo_image; ?>" />

	<meta name="keywords" content="<?php echo $seo_keywords; ?>">
    <meta name="description" content="<?php echo $seo_description; ?>">
	<title><?php echo $seo_title; ?></title>



	<?php wp_head(); ?>

	<?php print_r($header_info['extra_scripts']); ?>
</head>

<body>
	<?php print_r($body_info['extra_scripts']); ?>

    <div id="page">
  		<!-- <div class="se-pre-con"></div> -->
		<header>
			<div class="nav_top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<a href="index.php" class="navbar-brand visible-xs">Chronicle</a>

							<div class="box_tel visible-xs">
								<a class="tel_sp" href="tel:+84-(0)28-3824-1418"><i class="fa fa-volume-control-phone fa-lg" aria-hidden="true"></i> +84-(0)28-3824-1418</a>
							</div>

							<ul class="list_topmenu hidden-xs">
								<li>
									<div class="display_table boxmH">
										<div class="table_content">
											<a href="/" class="navbar-brand">Chronicle</a>
										</div>
									</div>
								</li>

								<!-- DESCRIPTION -->
								<?php 
								$description = $header_info['description'];
								if (!empty($description)):
									echo '<li>
									<div class="display_table boxmH hidden-xs">
									<div class="table_content">
									<p class="specialize">'.$description.'</p>
									</div>
									</div>
									</li>';
								endif;
								?>

								<!-- PHONE LIST MAP -->
								<?php 
								$phone_list_map = $header_info['phone_list_map'];
								$arr = phone_title_map();
								$arrToMap = array_column($arr, 'phone_number', 'phone_name' );

								if (!empty($phone_list_map)):
									echo '<li>
									<div class="display_table boxmH hidden-xs">
									<div class="table_content">
									<p class="call"><i class="i_call"></i> 
									<span>';

									foreach ($phone_list_map as $field){
										$phoneTitle = $field['phone_list_map_title'];
										echo $phoneTitle.': <a href="tel:'.$arrToMap[$phoneTitle].'">'.$arrToMap[$phoneTitle].'</a><br>';
									}

									echo '</span>
									</p>
									</div>
									</div>
									</li>';
								endif;
								?>
												
								<!-- BUTTON LINK -->
								<?php 
								$button_link = $header_info['button_link'];
								if (!empty($button_link)):
									echo '<li>
									<div class="display_table boxmH hidden-xs">
									<div class="table_content">
									<a href="'.$button_link['url'].'" class="btn btnWeb hidden-sm" target="'.$button_link['target'].'">
									<span>'.$button_link['title'].'</span>
									<i class="i_arrow_right"></i>
									</a>
									</div>
									</div>
									</li>';
								endif;
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div id="menuwrap">
				<nav id="menu" class="navbar navbar-default">
					<div class="container">
					    <div class="navbar-header">
					        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					        </button>
					    </div>

					    <div id="navbarCollapse" class="collapse navbar-collapse">
					        <ul class="nav navbar-nav" data-hover="dropdown" data-animations="fadeInDown fadeInLeft fadeInUp fadeInRight">
				           		<?php 

									$navMenu = get_nav_menu_locations();
									$menuId = $navMenu['top'];
									$topMenu = wp_get_nav_menu_items( $menuId );

									foreach($topMenu as $menu){
										if ($menu->menu_item_parent == 0){
											$childMenu = get_nav_child_menu($topMenu, $menu->ID);
											?>
											<li <?php echo ($menu->title == '内装工事について'&&$menu->url=='#') ? 'class="dropdown"': ''; ?> >
												<a href="<?php echo $menu->url; ?>" target="<?php echo $menu->target; ?>"><?php echo $menu->title; ?></a>
												<?php 
													if (count($childMenu)>0){
														echo '<ul class="dropdown-menu" role="menu">';
															foreach($childMenu as $cmenu){
																?>
																<li><a href="<?php echo $cmenu->url; ?>" target="<?php echo $cmenu->target; ?>"><?php echo $cmenu->title; ?></a></li>
																<?php
															}
														echo '</ul>';
													}
												?>
											</li>
											<?php
										}
									}

								?>
					        </ul>
					    </div>
				    </div>
				</nav>

				


			</div>

		</header>
		
      	<main id="content">