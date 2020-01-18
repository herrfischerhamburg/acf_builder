<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="description" content="Die description steht in Google unter dem Titel - bitte anpassen und un-commenten" /> -->
	<meta name="page-topic" content="Dienstleistung">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Roboto+Condensed:400,700,900&display=swap" rel="stylesheet"> 

	<style>
		
	</style>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="main_header">
		<span id="moby-button">
			<span>Menü</span>
		</span>
		
		<div class="header_top_wrapper">
			<div class="header_top cf __ container-fluid">
				<div class="row">
					<div class="col-12 p-0">
						<nav id="main-nav" class="cf">		
							<?php 
								// Custom Menu "primary"
								wp_nav_menu( array( 
									'theme_location' => 'primary', 
									'container_class' => 'mainmenu', 
									'container' => 'ul',
								)); 
							?>
							<div class="menu_phone">
								<strong>Fon:</strong> 0151 52564226
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main> <!-- Main content start -->
