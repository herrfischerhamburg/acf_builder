<?php
    if (have_rows('inhalte_erstellen')) {
        while (have_rows('inhalte_erstellen')) {
        the_row(); ?>

        <?php 
            /**
             * Options
             */
            // widths
            if (get_sub_field('breite') == 'normal') {
                $breite = 'normal';
            } else if (get_sub_field('breite') == 'large') {
                $breite = 'large';
            } else if (get_sub_field('breite') == 'full') {
                $breite = 'full';
            }
        ?>
        <?php 
            // align to top element
            if ( get_sub_field('oben_anschliesen') ) : ?>
            <?php $totop = 'totop'; ?>
            <?php else : ?>
                <?php $totop = 'totop_no'; ?>
        <?php endif; ?>        
  
        <?php 
            // Row bgcolor
            if ( get_sub_field('row_bgcolor') ) : ?>
            <?php $rowbgcolor = 'row_bgcolor'; ?>
            <?php else : ?>
                <?php $rowbgcolor = 'row_bgcolor_no'; ?>
        <?php endif; ?>        
        
        <?php 
            /**
             * Content
             */
            if (have_rows('inhalte')) { ?>
            <section class="wrapper <?php echo $breite; ?> <?php echo $totop; ?> <?php echo $rowbgcolor; ?>">
            <div class="container">
            <div class="row">
            <div class="col-12">

            <?php while (have_rows('inhalte')) {
                the_row(); 
            ?>

                <?php // H2
                if( get_row_layout() == 'headline_h2' ): ?>
                    <div class="flex_inner row_bgcolor_color">
                    <?php if ( get_sub_field('text') ) : ?>
                        <h2 class="center">
                            <?php echo get_sub_field('text'); ?>
                        </h2>
                    <?php endif; ?>
                    </div>

                <?php // H3
                elseif( get_row_layout() == 'headline_h3' ): ?>
                    <div class="flex_inner_s row_bgcolor_color">
                    <?php if ( get_sub_field('text') ) : ?>
                        <h3>
                            <?php echo get_sub_field('text'); ?>
                        </h3>
                    <?php endif; ?>
                    </div>


                <?php // Subline
                elseif( get_row_layout() == 'subline' ): ?>
                    <div class="flex_inner row_bgcolor_color">
                    <?php if ( get_sub_field('text') ) : ?>
                        <div class="txt subline center">
                            <p>
                                <?php echo get_sub_field('text'); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    </div>


                <?php // Text
                elseif( get_row_layout() == 'text' ): ?>
                    <div class="flex_inner row_bgcolor_color">
                    <?php if ( get_sub_field('text') ) : ?>
                        <div class="txt spaces_asusual">
                            <?php echo get_sub_field('text'); ?>
                        </div>
                    <?php endif; ?>
                    </div>

                
                <?php // Bild
                elseif( get_row_layout() == 'bild' ): ?>
                    <div class="flex_inner flex_bild">
                        <?php if ( get_sub_field('bild') ) : $image = get_sub_field('bild'); ?>
                            <img src="<?php echo $image['sizes']['img-m']; ?>" alt="<?php echo $image['alt']; ?>"/>
                        <?php endif; ?>
                    </div>


                <?php // Benefits
                elseif( get_row_layout() == 'benefits' ): ?>
                    <div class="flex_inner flex_benefits">
                    <?php if ( have_rows('benefits') ) : ?>
                        <div class="children_topmargin_s">
                            <?php while( have_rows('benefits') ) : the_row(); ?>
                                <?php if ( get_sub_field('benefit') ) : ?>
                                    <article class="child_topmargin_s">
                                        <span class="genericons-neue genericons-neue-checkmark"></span>
                                        <?php echo get_sub_field('benefit'); ?>
                                    </article>
                                <?php endif; ?>                            
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    </div>


                <?php // Downloads
                elseif( get_row_layout() == 'downloads' ): ?>
                    <div class="flex_inner">
                    <?php if ( have_rows('downloads') ) : ?>
                        <div class="downloads children_topmargin_s">
                        <?php while( have_rows('downloads') ) : the_row(); ?>
                            <?php if ( get_sub_field('download') ) : $file = get_sub_field('download'); ?>
                                <a href="<?php echo $file['url']; ?>" class="button download child_topmargin_s">
                                    <span class="icon_left icon icon-document2"></span> 
                                    <?php echo $file['title']; ?>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    </div>


                <?php // Slider
                elseif( get_row_layout() == 'slider' ): ?>
                    <div class="flex_inner">
                    <?php if ( have_rows('bilder') ) : ?>
                        <div class="slider_content">
                            <?php while( have_rows('bilder') ) : the_row(); ?>
                            <?php
                                $image = get_sub_field( 'bild' );
                                $size = 'img-l';
                                $img = wp_get_attachment_image_src( $image, $size );
                            ?>
                            <div class="loader_wrapper">
                            <figure style="background-image: url('<?php echo $img[0] ?>')"></figure>  
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    </div>


                <?php // Zitat
                elseif( get_row_layout() == 'zitat' ): ?>
                    <div class="flex_inner">
                    <?php if ( get_sub_field('text') ) : ?>
                        <blockquote class="zitat deko h2 txt center">
                            <?php echo get_sub_field('text'); ?>
                        </blockquote>
                        <?php if ( get_sub_field('quelle_name') ) : ?>
                            <cite class="center">
                                <?php echo get_sub_field('quelle_name'); ?>
                            </cite>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>


                <?php // Features
                elseif( get_row_layout() == 'feature' ): ?>
                    <div class="flex_inner flex_features">
                    <?php if ( have_rows('features') ) : ?>
                        <div class="children_topmargin_s __ row">
                        <?php while( have_rows('features') ) : the_row(); ?>

                            <?php
                                $image = get_sub_field( 'bild' );
                                $size = 'img-l';
                                $img = wp_get_attachment_image_src( $image, $size );
                            ?>
                            <div class="
                            flex_feature
                            <?php echo get_sub_field('desktop'); ?>
                            <?php echo get_sub_field('laptop'); ?>
                            <?php echo get_sub_field('tablet'); ?>
                            <?php echo get_sub_field('smartphones'); ?>
                            ">
                                <div class="col_inner">
                                    <div class="row">

                                        <div class="col-5 col-md-12">
                                            <div class="loader_wrapper">
                                                <figure style="background-image: url('<?php echo $img[0] ?>')">
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="col-7 col-md-12">
                                            <div class="feature_text">
                                                <?php if ( get_sub_field('subline') ) : ?>
                                                    <?php echo get_sub_field('subline'); ?>
                                                <?php endif; ?>
                                                
                                                <?php 
                                                    $link = get_sub_field('link');
                                                    if( $link ): 
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                    <a class="link_ghost" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                        <?php echo esc_html( $link_title ); ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if ( get_sub_field('headline') ) : ?>
                                                    <h3>
                                                        <?php echo get_sub_field('headline'); ?>
                                                    </h3>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>  
                            </div>  

                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    </div>

                
                <?php // Google Map
                elseif( get_row_layout() == 'google_map' ): ?>
                    <div class="flex_inner">
                        <div class="acf-map">
                            <div class="acf-map_responsive">
                                <?php echo get_sub_field('iframe_code'); ?>
                            </div>
                        </div>
                    </div>


                <?php // Buttons
                elseif( get_row_layout() == 'buttons' ): ?>
                    <div class="flex_inner">
                    <?php if ( have_rows('buttons') ) : ?>
                        <div class="buttons center children_topmargin_s">
                        <?php while( have_rows('buttons') ) : the_row(); ?>

                            <?php 
                            $link = get_sub_field('button');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button child_topmargin_s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <span class="genericons-neue genericons-neue-next"></span> 
                                    <?php echo esc_html( $link_title ); ?>
                                </a>
                            <?php endif; ?>

                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    </div>




                
                <?php endif; ?>

            <?php } ?>

            </div>
            </div>
            </div>
            </section>

        <?php } ?>
    <?php }
    }
?>