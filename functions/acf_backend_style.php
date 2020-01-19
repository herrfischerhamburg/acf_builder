<?php
function acfpb_acf_admin_head() {
	?>
	<style type="text/css">
		.acf-flexible-content .layout .acf-fc-layout-handle {
			background-color: #0073aa;
			color: #eee;
		}
	
		.acf-repeater.-row > table > tbody > tr > td,
		.acf-repeater.-block > table > tbody > tr > td {
			border-top: 2px solid #0073aa;
		}
	
		.acf-repeater .acf-row-handle {
			vertical-align: top !important;
			padding-top: 16px;
		}
	
		.acf-repeater .acf-row-handle span {
			font-size: 20px;
			font-weight: bold;
			color: #0073aa;
		}
	
		.imageUpload img {
			width: 75px;
		}
	
		.acf-repeater .acf-row-handle .acf-icon.-minus {
			top: 30px;
		}

		/* Icons */
		@font-face {
			font-family: 'icomoon';
			src:  url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.eot?r8rtdx');
			src:  url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.eot?r8rtdx#iefix') format('embedded-opentype'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.ttf?r8rtdx') format('truetype'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.woff?r8rtdx') format('woff'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.svg?r8rtdx#icomoon') format('svg');
			font-weight: normal;
			font-style: normal;
			font-display: block;
		}
		.oc_icons .acf-input .acf-checkbox-list li {
			background-color: #efefef;
			padding: 3px 10px;
			padding-bottom: 8px;
			margin-bottom: 3px;
		}
		.oc_icons .acf-input .acf-checkbox-list li label span[class*="icon-"] {
			/* use !important to prevent issues with browser extensions that change fonts */
			font-family: 'icomoon' !important;
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			font-size: 1.5em;
			top: 4px;
			position: relative;

			/* Better Font Rendering =========== */
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.icon-home4:before {
		content: "\e900";
		}
		.icon-bathtub:before {
		content: "\e901";
		}
		.icon-toothbrush:before {
		content: "\e902";
		}
		.icon-bed:before {
		content: "\e903";
		}
		.icon-couch:before {
		content: "\e904";
		}
		.icon-cloud-windy:before {
		content: "\e905";
		}
		.icon-key:before {
		content: "\e906";
		}
		.icon-joystick:before {
		content: "\e907";
		}
		.icon-heart:before {
		content: "\e908";
		}
		.icon-guitar:before {
		content: "\e909";
		}
		.icon-socks:before {
		content: "\e90a";
		}
		.icon-flip-flops:before {
		content: "\e90b";
		}
		.icon-hanger:before {
		content: "\e90c";
		}
		.icon-laundry:before {
		content: "\e90d";
		}
		.icon-ice-cream:before {
		content: "\e90e";
		}
		.icon-bowling-pins:before {
		content: "\e90f";
		}
		.icon-refund:before {
		content: "\e910";
		}
	</style>
	<?php
	}
add_action('acf/input/admin_head', 'acfpb_acf_admin_head');
?>