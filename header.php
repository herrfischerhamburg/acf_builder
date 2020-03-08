<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="TANZSCHUHHAUS HAMBURG - Ihr Spezialist in Hamburg, traditionsreiches Geschäft in der Talstraße Nr. 17 in Hamburg St. Pauli. Hervorragende Qualität zu vernünftigen Preisen und Service. Wir zeigen Ihnen in unserem Geschäft die große Auswahl an Tanzschuhen in Hamburg. Bei uns finden Sie ausserdem Tanzschuhe in Übergrößen sowohl für Damen als auch für Herren." />
	<meta name="page-topic" content="Dienstleistung">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link href="https://fonts.googleapis.com/css?family=Lato:400,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header class="main_header">

		<div class="menu_phone_mobile __ d-lg-none">
			<strong>Fon:</strong> 040 / 31 39 65
		</div>
		
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
							<div class="menu_phone d-none d-lg-block">
								<strong>Fon:</strong> 040 / 31 39 65
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main> <!-- Main content start -->
