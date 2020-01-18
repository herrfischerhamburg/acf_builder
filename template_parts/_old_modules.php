<?php if ( have_rows( 'container' ) ): ?>
	<?php while ( have_rows( 'container' ) ) : the_row(); ?>

        <?php $gr_container = get_row_index(); ?>

		<?php if ( get_row_layout() == 'row' ) : ?>

            <?php 
                // Wrapper bgcolor
                if ( get_sub_field('wrapper_bgcolor') ) : ?>
                <?php $wrapperbgcolor = get_sub_field('wrapper_bgcolor'); ?>
                <?php else : ?>
                <?php $wrapperbgcolor = 0; ?>
            <?php endif; ?>   

			<?php if ( have_rows( 'module' ) ) : ?>
				<?php while ( have_rows( 'module' ) ) : the_row(); ?>

                    <?php include 'modules_container_options.php'; ?>

					<?php if ( have_rows( 'columns' ) ) : ?>

                        <section 
                            class="
                                <?php echo 'wrapper_'.$cw; ?>
                                wrapper 
                                wrappercolor
                                <?php echo $breite; ?> 
                                <?php echo $totop; ?> 
                                <?php echo $rowbgcolor; ?>

                                <?php if ( !empty($ausfuellend)) { ?>
                                    container_filling
                                <?php } ?>

                                <?php if ( !empty($col_has_columnbgcolor)) { ?>
                                    col_has_columnbgcolor
                                <?php } ?>
                            "

                            style="
                                background-color: <?php echo $wrapperbgcolor; ?>; 
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
                    
                        <div class="container                
                            <?php if ( !empty($rowborder)) { ?>
                                rowborder
                            <?php } ?>
                        ">
                        <div 
                            class="row"

                            <?php if ( !empty($rowborder) && !empty($rowbordercolor) ) { ?>
                                style="border-color: <?php echo $rowbordercolor; ?>"
                            <?php } ?>

                            data-aos="<?php echo $scroll_ani; ?>"
                        >

						<?php while ( have_rows( 'columns' ) ) : the_row(); ?>

                            <?php $textalign = get_sub_field('col_text_align'); ?>
                            <?php $desktop = get_sub_field('desktop'); ?>
                            <?php $laptop = get_sub_field('laptop'); ?>
                            <?php $tablet = get_sub_field('tablet'); ?>
                            <?php $smartphones = get_sub_field('smartphones'); ?>
                            <?php $columnbgcolor = get_sub_field('col_bgcolor'); ?> 
                            <?php $columncolor = get_sub_field('col_color'); ?>
                            
                            <?php $gr_row = get_row_index(); ?>

							<?php if ( have_rows( 'column' ) ): ?>

                                <div class="
                                    <?php echo 'wrapper_container_'.$cc; ?>
                                    <?php echo 'cw'.$cw.'cc'.$cc; ?>
                                    <?php echo $textalign; ?>
                                    <?php echo $desktop; ?>
                                    <?php echo $laptop; ?>
                                    <?php echo $tablet; ?>
                                    <?php echo $smartphones; ?>
                                ">  

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

                                            <?php $gr_column = get_row_index(); ?>

                                            <?php include 'modules_content.php'; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                                </div>
                                </div>  

							<?php else: ?>
								<?php // no layouts found ?>
							<?php endif; ?>
						<?php endwhile; ?>
                        </div>
                </div>
                        </section>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>







		
        

            <?php elseif ( get_row_layout() == 'row_kacheln' ) : ?>
			<?php if ( have_rows( 'module' ) ) : ?>
				<?php while ( have_rows( 'module' ) ) : the_row(); ?>

                    <?php include 'modules_container_options.php'; ?>

					<?php if ( have_rows( 'columns' ) ) : ?>

                        <section 
                            class="
                                <?php echo 'wrapper_'.$cw; ?>
                                wrapper 
                                wrappercolor
                                <?php echo $breite; ?> 
                                <?php echo $totop; ?> 
                                <?php echo $rowbgcolor; ?>

                                <?php if ( !empty($ausfuellend)) { ?>
                                    container_filling
                                <?php } ?>

                                <?php if ( !empty($col_has_columnbgcolor)) { ?>
                                    col_has_columnbgcolor
                                <?php } ?>
                            "

                            style="
                                background-color: <?php echo $wrapperbgcolor; ?>; 
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
                    
                        <div class="container                
                            <?php if ( !empty($rowborder)) { ?>
                                rowborder
                            <?php } ?>
                        ">
                        <div 
                            class="row"

                            <?php if ( !empty($rowborder) && !empty($rowbordercolor) ) { ?>
                                style="border-color: <?php echo $rowbordercolor; ?>"
                            <?php } ?>

                            data-aos="<?php echo $scroll_ani; ?>"
                        >
                            
						<?php while ( have_rows( 'columns' ) ) : the_row(); ?>

                            <?php $textalign = get_sub_field('col_text_align'); ?>
                            <?php $desktop = get_sub_field('desktop'); ?>
                            <?php $laptop = get_sub_field('laptop'); ?>
                            <?php $tablet = get_sub_field('tablet'); ?>
                            <?php $smartphones = get_sub_field('smartphones'); ?>
                            <?php $columnbgcolor = get_sub_field('col_bgcolor'); ?> 
                            <?php $columncolor = get_sub_field('col_color'); ?>
                            
                            <?php $gr_row = get_row_index(); ?>

							<?php if ( have_rows( 'column' ) ): ?>

                                <div class="
                                    <?php echo 'wrapper_container_'.$cc; ?>
                                    <?php echo 'cw'.$cw.'cc'.$cc; ?>
                                    <?php echo $textalign; ?>
                                    <?php echo $desktop; ?>
                                    <?php echo $laptop; ?>
                                    <?php echo $tablet; ?>
                                    <?php echo $smartphones; ?>
                                ">  

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

                                            <?php $gr_column = get_row_index(); ?>

                                            <?php include 'modules_content.php'; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                                </div>
                                </div>  

							<?php else: ?>
								<?php // no layouts found ?>
							<?php endif; ?>
						<?php endwhile; ?>
                        </div>
                </div>
                        </section>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
	







        <?php endif; ?>




	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
