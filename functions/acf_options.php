<?php
	// Options pages
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page("Template");	
		acf_add_options_page("Texte");	
		acf_add_options_page("Bilder");	
	}

	// Color fields
	function acfpb_acf_input_admin_footer() { ?>
		<script type="text/javascript">
			(function($) {
				acf.add_filter('color_picker_args', function( args, $field ){
					// add the hexadecimal codes here for the colors you want to appear as swatches
					args.palettes = ['#0074D9', '#7FDBFF', '#39CCCC', '#FF4136', '#8914c9', '#111111', '#FFFFFF', '#AAAAAA', '#DDDDDD']
					// return colors
					return args;
				});
			})(jQuery);
		</script>
		<?php }
	add_action('acf/input/admin_footer', 'acfpb_acf_input_admin_footer');
?>