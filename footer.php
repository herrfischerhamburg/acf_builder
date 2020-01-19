
</main>		

<footer class="main_footer wrapper">
	<div class="container">
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
				<?php echo comicpress_copyright(); ?> Kickstart projects
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>

</body>

</html>