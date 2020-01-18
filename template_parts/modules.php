<?php if (have_rows('module')) { ?>
    <?php while (have_rows('module')) { the_row(); ?>

        <?php $cw = get_row_index(); ?>

        <?php 
            // Scroll animations
            if (get_sub_field('scroll_animation') == 'keine') {
                $scroll_ani = NULL;
            } else {
                $scroll_ani = get_sub_field('scroll_animation');
            }
        ?>

        <?php 
            // Wrapper id
            if ( get_sub_field('wrapper_id') ) : ?>
            <?php $wrapperid = get_sub_field('wrapper_id'); ?>
            <?php else : ?>
            <?php $wrapperid = 0;  ?>
        <?php endif; ?>
        
        <?php
            // ACF image
            if ( get_sub_field('w_bgimg') ) : 
                $image = get_sub_field( 'w_bgimg' );
                $size = 'full';
                $img = wp_get_attachment_image_src( $image, $size );
            else :
                $image = 0;
            endif;
        ?>        

        <?php 
        /**
         * Row options
         */
        ?>
        <?php if (have_rows('columns')) { ?>
            <?php while (have_rows('columns')) { the_row(); ?>
                <?php $col_has_columnbgcolor = get_sub_field('col_bgcolor'); ?> 
            <?php } ?>
        <?php } ?>
        
        <?php if (have_rows('columns')) { ?>
            <section 
                class="
                    <?php echo 'wrapper_'.$cw; ?>
                    wrapper 
                    wrappercolor
                    <?php echo $totop; ?> 
                    <?php echo $rowbgcolor; ?>

                    <?php if ( !empty($col_has_columnbgcolor)) { ?>
                        col_has_columnbgcolor
                    <?php } ?>
                "
            >

                <?php if ( !empty($wrapperid)) { ?>
                    <a href="" id="<?php echo $wrapperid; ?>" class="wrapper_anchor"></a>
                <?php } ?>

                <div 
                    class="wrapper_bginage"

                    <?php if ( !empty($image)) { ?>
                        style="background-image: url('<?php echo $img[0] ?>');"
                    <?php } ?>
                >
                </div>
            
                <div class="container">
                    <div class="row">

                        <?php while (have_rows('columns')) { the_row(); ?>

                            <?php $textalign = get_sub_field('col_text_align'); ?>
                            <?php $desktop = get_sub_field('desktop'); ?>
                            <?php $laptop = get_sub_field('laptop'); ?>
                            <?php $tablet = get_sub_field('tablet'); ?>
                            <?php $smartphones = get_sub_field('smartphones'); ?>
                            <?php $columnbgcolor = get_sub_field('col_bgcolor'); ?> 
                            <?php $columncolor = get_sub_field('col_color'); ?>
                            
                            <?php $cc = get_row_index(); ?>     

                            <?php if ( have_rows('column') ) : ?>          
                                <div class="
                                    col-12
                                    <?php echo 'wrapper_container_'.$cc; ?>
                                    <?php echo 'cw'.$cw.'cc'.$cc; ?>
                                    <?php echo $textalign; ?>
                                    <?php echo $desktop; ?>
                                    <?php echo $laptop; ?>
                                    <?php echo $tablet; ?>
                                    <?php echo $smartphones; ?>
                                " data-aos="<?php echo $scroll_ani; ?>">  

                                    <div 
                                        class="
                                        col_inner
                                        <?php echo 'cw'.$cw.'cc'.$cc; ?>
                                        <?php if ( !empty($columnbgcolor)) { ?>
                                            col_columnbgcolor
                                        <?php } ?>
                                        <?php
                                            // if ($columninnerpaddingbig == '1') {
                                            // echo "columninnerpaddingbig";
                                            // } 
                                        ?>
                                        " 
                                    >   

                                    
                                        <div class="col_inner_bgcolor" style="background-color: <?php echo $columnbgcolor; ?>">
                                            <div class="col_inner_bgcolor_content">
                                                <?php while( have_rows('column') ) : the_row(); ?>
                                                    <?php include 'modules_content.php'; ?>
                                                    <?php // get_template_part( 'template_parts/modules_content' ); ?>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>                   
                            <?php endif; ?>                         

                        <?php } ?>

                    </div>
                </div>
            </section>
        <?php } ?>

    <?php } ?>
<?php } ?>