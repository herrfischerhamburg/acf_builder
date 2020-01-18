<?php
    /*
     * Template Name: News Archiv
     */
    get_header();
?>

<section class="wrapper normal">
	<div class="container">
		<div class="row">
			<div class="spaces_asusual __ col-md-12">				
				<!-- <h1 class="entry">
                    <?php the_title(); ?>
                </h1> -->

				<?php
					$args = array(
						'post_type'      => array( 'post' ),
						'post_status'    => array( 'publish' ),
						'posts_per_page' => 6,
						'orderby'  		 => 'date',
						'paged'			 => $paged
					);

					$wp_query = new WP_Query($args); ?>

					<?php // The Loop
					if ( $wp_query->have_posts() ) : ?>

					<section class="row">
						<?php while ( $wp_query->have_posts() ) :
						$wp_query->the_post(); ?>
						
							<article class="col-12">
                                <h2 class="h3">
									<span><?php echo get_the_date(); ?> /</span> <?php the_title(); ?>		
								</h2>
								
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'img-l' ); $image = $image[0]; ?>
									<div class="loader_wrapper">
									<figure>
										<img src="<?php echo $image; ?>" alt="">
									</figure>
									</div>

                                <?php } else { ?>
									<div class="loader_wrapper">
									<figure>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/news_placeholder.jpg" alt="">
									</figure>
									</div>

                                <?php } ?>

                                <?php the_excerpt(); ?>

                                <a href="<?php the_permalink(); ?>" class="button">Zum Artikel</a>
							</article>

						<?php endwhile; ?>                  
						<?php endif; ?>

						<div class="col-12">
							<?php
								global $wp_query;
								$num_of_pages = (int)$wp_query->max_num_pages;
								if ($num_of_pages > 1) :
									echo '<div class="pagination_bottom">' . pagination(6, true, true) . '</div>'; ?>
								<?php else: ?>
								<br />
							<?php endif; ?>
						</div>
					</section>

				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
