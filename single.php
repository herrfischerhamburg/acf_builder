<?php get_header(); ?>

	<div class="wrapper wrapper_single">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h1 class="h1_single">
						<span><?php echo get_the_date(); ?> /</span> <?php the_title(); ?>
					</h1>

					<?php if ( has_post_thumbnail() ) { ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'img-l' ); $image = $image[0]; ?>
						<div class="loader_wrapper postthumb">
							<figure>
								<img src="<?php echo $image; ?>" alt="">
							</figure>
						</div>

					<?php } else { ?>
						<hr />

					<?php } ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="single_content spaces_asusual">
							<div class="entry">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; endif; ?>

					<div class="single_more children_topmargin_s">
						<h3>
							Weitere News
						</h3>
						
						<?php
							// WP_Query arguments
							$args = array(
								'posts_per_page'         => 5,
								'post_type'              => 'post',
								'post_status'            => 'publish',
								'nopaging'               => false,
								'ignore_sticky_posts'    => true,
								'order'                  => 'DESC',
								'orderby'                => 'date'
							);
		
							// The Query
							$query = new WP_Query( $args );
		
							// The Loop
							if ( $query->have_posts() ) { ?>
								<?php while ( $query->have_posts() ) { ?>
									<?php $query->the_post(); ?>
										<a href="<?php the_permalink(); ?>" class="button child_topmargin_s"><?php the_title(); ?></a>
								<?php } ?>
							<?php } else {
								// no posts found
							}
		
							// Restore original Post Data
							wp_reset_postdata();
						?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
 
<?php get_footer(); ?>
