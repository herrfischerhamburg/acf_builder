<?php get_header(); ?>

<?php if ( is_front_page() || is_home() ) { ?>
    <?php get_template_part( 'template_parts/modules_wrapper_container' ); ?>

<?php } else { ?>

    <?php if ( have_rows('column') ) : ?> 
        <?php while( have_rows('column') ) : the_row(); ?>
            <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="flex_inner">
                            <?php get_template_part( 'template_parts/modules_content' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

<?php } ?>
 
<?php get_footer(); ?>
