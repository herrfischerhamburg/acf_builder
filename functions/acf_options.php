<?php
	// Options pages
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page("Options");	
		acf_add_options_page("Text");	
		acf_add_options_page("Images");	
	}

	// Color fields
	function acfpb_acf_input_admin_footer() { ?>
		<script type="text/javascript">
			(function($) {
				acf.add_filter('color_picker_args', function( args, $field ){
					// add the hexadecimal codes here for the colors you want to appear as swatches
					args.palettes = ['#111b3c', '#ef8520', '#111111', '#FFFFFF', '#aaaaaa', '#efefef']
					// return colors
					return args;
				});
			})(jQuery);
		</script>
		<?php }
	add_action('acf/input/admin_footer', 'acfpb_acf_input_admin_footer');
?>