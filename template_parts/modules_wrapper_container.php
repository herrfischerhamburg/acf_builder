<?php if ( have_rows( 'container' ) ): ?>
	<?php while ( have_rows( 'container' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'container' ) : ?>
        <?php $gr_container = get_row_index(); ?>

        <?php 
            // Wrapper bgcolor
            if ( get_sub_field('w_bgcolor') ) : ?>
            <?php $w_bgcolor = get_sub_field('w_bgcolor'); ?>
            <?php else : ?>
            <?php $w_bgcolor = "wrapper_nobgcolor"; ?>
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
        
        <section 
            <?php /* Wrapper */ ?>
            class="
            wrapper
            <?php if ($w_bgcolor == 'wrapper_nobgcolor') { ?>
                wrapper_nobgcolor
            <?php } ?>
            "
            <?php if ($w_bgcolor !== "wrapper_nobgcolor") { ?>
                style="background-color: <?php echo $w_bgcolor; ?>";
            <?php } ?>
        >

        <div 
            class="w_bgimg"
            <?php if ( !empty($image)) { ?>
                style="background-image: url('<?php echo $img[0] ?>');"
            <?php } ?>
        >
        </div>

        <?php /* Container */ ?>
        <div class="container">

        
        <?php if ( have_rows( 'rows' ) ) : ?>
            <?php while ( have_rows( 'rows' ) ) : the_row(); ?>
            <?php $gr_row = get_row_index(); ?>

                <?php if ( have_rows( 'row_regular' ) ) : ?>
                    
                    <div class="row">

                    <?php while ( have_rows( 'row_regular' ) ) : the_row(); ?>
                    <?php $gr_col = get_row_index(); ?>

                        <?php $smartphones = get_sub_field('smartphones'); ?>
                        <?php $tablet = get_sub_field('tablet'); ?>
                        <?php $laptop = get_sub_field('laptop'); ?>
                        <?php $desktop = get_sub_field('desktop'); ?>
                        <?php $offset_smartphones = get_sub_field('offset_smartphones'); ?>
                        <?php $offset_tablet = get_sub_field('offset_tablet'); ?>
                        <?php $offset_laptop = get_sub_field('offset_laptop'); ?>
                        <?php $offset_desktop = get_sub_field('offset_desktop'); ?>
                        <?php $textalign = get_sub_field('col_text_align'); ?>
                        <?php $columnbgcolor = get_sub_field('col_bgcolor'); ?> 
                        <?php $columncolor = get_sub_field('col_color'); ?>
                        <?php $columnnopadding = get_sub_field('no_padding'); ?>
                        <?php $col_aos = get_sub_field('mcos_aos'); ?>

                        <?php if ( have_rows( 'column' ) ): ?>

                            <div class="<?php echo $smartphones; ?>
                                <?php if ( $offset_smartphones !== '0') { echo $offset_smartphones; } ?>
                                <?php echo $tablet; ?>
                                <?php if ( $offset_tablet !== '0') { echo $offset_tablet; } ?>
                                <?php echo $laptop; ?>
                                <?php if ( $offset_laptop !== '0') { echo $offset_laptop; } ?>
                                <?php echo $desktop; ?>
                                <?php if ( $offset_desktop !== '0') { echo $offset_desktop; } ?>
                                <?php echo $textalign; ?>                                
                                <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">  

                            <div class="
                                col_inner
                                <?php if ( !empty($columnbgcolor)) { ?>col_inner_bgcolor<?php } ?>
                                "
                                <?php if ( !empty($columnbgcolor)) { ?>style="background-color: <?php echo $columnbgcolor; ?>"<?php } ?>
                            >
                                <div class="
                                col_inner_content
                                <?php if ($columnnopadding != '0') { echo "p-0"; } ?> 
                                ">
                                    <div <?php if( $col_aos != '0') { echo 'data-aos="fade-up"'; }; ?>>
                                        <?php while( have_rows('column') ) : the_row(); ?>
                                            <?php $gr_column = get_row_index(); ?>
                                            <?php include 'modules_content_regular.php'; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            </div>  

                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found ?>
                <?php endif; ?>
                </div> <!-- / row -->
            <?php endwhile; ?>
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>

        </div>
        </div>
        </section>




		
        

        <?php elseif ( get_row_layout() == 'container_fw' ) : ?>
        <?php $gr_container = get_row_index(); ?>
        <section
        <?php /* Wrapper */ ?>
            class="wrapper_fw"
        >
        <div class="container-fluid">

        
        <?php if ( have_rows( 'rows_fw' ) ) : ?>
            <?php while ( have_rows( 'rows_fw' ) ) : the_row(); ?>
            <?php $gr_row = get_row_index(); ?>

                <?php if ( have_rows( 'row' ) ) : ?>
                    
                    <div class="row">

                    <?php while ( have_rows( 'row' ) ) : the_row(); ?>
                    <?php $gr_col = get_row_index(); ?>

                        <?php $smartphones = get_sub_field('smartphones'); ?>
                        <?php $tablet = get_sub_field('tablet'); ?>
                        <?php $laptop = get_sub_field('laptop'); ?>
                        <?php $desktop = get_sub_field('desktop'); ?>
                        <?php $offset_smartphones = get_sub_field('offset_smartphones'); ?>
                        <?php $offset_tablet = get_sub_field('offset_tablet'); ?>
                        <?php $offset_laptop = get_sub_field('offset_laptop'); ?>
                        <?php $offset_desktop = get_sub_field('offset_desktop'); ?>
                        <?php $textalign = get_sub_field('col_text_align'); ?>
                        <?php $columnbgcolor = get_sub_field('col_bgcolor'); ?> 
                        <?php $columncolor = get_sub_field('col_color'); ?>
                        <?php $columnnopadding = get_sub_field('no_padding'); ?>
                        <?php $col_aos = get_sub_field('mcos_aos'); ?>
                        <?php $paddingY_xs = get_sub_field('mdodrh_xs'); ?>
                        <?php $paddingY_sm = get_sub_field('mdodrh_sm'); ?>
                        <?php $paddingY_md = get_sub_field('mdodrh_md'); ?>
                        <?php $paddingY_lg = get_sub_field('mdodrh_lg'); ?>

                        <?php
                            // ACF image
                            if ( get_sub_field('rfc_col_bgimg') ) : 
                                $image = get_sub_field( 'rfc_col_bgimg' );
                                $size = 'full';
                                $img = wp_get_attachment_image_src( $image, $size );
                            else :
                                $image = 0;
                            endif;
                        ?>
                        <?php $rfc_col_bgimg_fo = get_sub_field('rfc_col_bgimg_fo'); ?>
                        
                        <?php if ( have_rows( 'column' ) ): ?>

                            <div class="<?php echo $smartphones; ?>
                                <?php if ( $offset_smartphones !== '0') { echo $offset_smartphones; } ?>
                                <?php echo $tablet; ?>
                                <?php if ( $offset_tablet !== '0') { echo $offset_tablet; } ?>
                                <?php echo $laptop; ?>
                                <?php if ( $offset_laptop !== '0') { echo $offset_laptop; } ?>
                                <?php echo $desktop; ?>
                                <?php if ( $offset_desktop !== '0') { echo $offset_desktop; } ?>
                                p-0
                                <?php echo $textalign; ?>
                                <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">  

                            <div class="
                                col_inner
                                <?php if ( !empty($columnbgcolor)) { ?>col_columnbgcolor<?php } ?>
                            ">

                            <div class="
                            col_inner_bgcolor
                            <?php echo 'paddingY_xs_'.$paddingY_xs; ?>
                            <?php echo 'paddingY_sm_'.$paddingY_sm; ?>
                            <?php echo 'paddingY_md_'.$paddingY_md; ?>
                            <?php echo 'paddingY_lg_'.$paddingY_lg; ?>
                            <?php if ($columnnopadding != '0') { echo "p-0"; } ?> 
                            " 
                            style="background-color: <?php echo $columnbgcolor; ?>">
                                
                                <div class="
                                col_inner_bgimg
                                <?php if ($rfc_col_bgimg_fo != '0') { echo "row_fw_col_bgimg_o1"; } ?> 
                                "
                                
                                <?php if ( !empty($image)) { ?>
                                    style="background-image: url('<?php echo $img[0] ?>');"
                                <?php } ?>
                                ></div>
                                <div class="col_inner_bgcolor_content">
                                    <div <?php if( $col_aos != '0') { echo 'data-aos="fade-up"'; }; ?>>
                                        <?php while( have_rows('column') ) : the_row(); ?>
                                            <?php $gr_column = get_row_index(); ?>
                                            <?php include 'modules_content_fw.php'; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>

                            </div>
                            </div>  
                            

                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found ?>
                <?php endif; ?>
                </div> <!-- / row -->
            <?php endwhile; ?>
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>

        </div>
        </div>
        </section>
	







        <?php endif; ?>




	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
