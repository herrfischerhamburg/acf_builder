
</main>		

<footer class="main_footer wrapper">
	<div class="container-fluid">
		<div class="row">
			<?php if ( !is_front_page() && !is_home() ) { ?>
				<div class="txt __ col-12">
						<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
				</div>
			<?php } ?>
			<div class="links col-12">
				<?php 
					wp_nav_menu( array( 
						'theme_location' => 'footer', 
						'container_class' => 'footer_menu', 
						'container' => 'ul',
						'menu_class' => 'menu' 
					)); 
				?>
			</div>

			<div class="col-12">
				<?php echo acfpb_copyright(); ?> Tanzschuhhaus Hamburg
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- ACF Google Maps -->
<?php $gmkey = get_field('gmkey', 'option'); ?>

<?php if ( get_field('opt_google_maps_style', 'option') ) : ?>
    <?php $mapstyles = get_field('opt_google_maps_style', 'option'); ?>
<?php endif; ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $gmkey; ?>"></script>
<script type="text/javascript">
(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
	function render_map( $el ) {
		// var
		var $markers = $el.find('.marker');
	
		// Custom map styles
		var styles = <?php echo $mapstyles; ?>;
	    
	    var styledMap = new google.maps.StyledMapType(styles, {name: "Hier sind wir"} );
		
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		};
		
		var map = new google.maps.Map($el[0], args);
	
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
		
		// add a markers reference
		map.markers = [];
		
		// add markers
		$markers.each(function(){
	    	add_marker( $(this), map );
		});
	
		// center map
		center_map( map );
	}
	
	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/
	
	function add_marker( $marker, map ) {
	
		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		var icon = $marker.attr('data-icon');
		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon		: icon
		});

		// add to array
		map.markers.push( marker );
	
		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content: $marker.html()
			});
	
			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}
	}
	
	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/
	
	function center_map( map ) {
	
		// vars
		var bounds = new google.maps.LatLngBounds();
	
		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ) {
	
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
	
			bounds.extend( latlng );
	
		});
	
		// only 1 marker?
		if( map.markers.length == 1 ) {
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		} else {
			// fit to bounds
			map.fitBounds( bounds );
	}
}
$(document).ready(function(){
	$('.acf-map').each(function(){
		render_map( $(this) );
	});
});

})(jQuery);
</script>

</body>

</html>