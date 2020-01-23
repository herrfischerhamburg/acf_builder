<?php get_header(); ?>

<?php if ( have_rows('column') ) : ?> 
    <div class="wrapper wrapper_subpage">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        <?php while( have_rows('column') ) : the_row(); ?>
            <div class="row">
                <div class="col-12">
                    <div class="flex_inner">
                        <?php get_template_part( 'template_parts/modules_content_regular' ); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
 
<?php get_footer(); ?>
