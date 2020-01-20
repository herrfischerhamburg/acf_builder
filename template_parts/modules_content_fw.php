
<style>
    .<?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?> .columncolor {
        color: <?php echo $columncolor; ?>
    }
</style>

<?php // H2
if( get_row_layout() == 'headline_h2' ): ?>
    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( get_sub_field('text') ) : ?>
        <h2 class="flex_inner_element columncolor">
            <?php echo get_sub_field('text'); ?>
        </h2>
    <?php endif; ?>
    </div>


<?php // H3
elseif( get_row_layout() == 'headline_h3' ): ?>
    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( get_sub_field('text') ) : ?>
        <h3 class="flex_inner_element columncolor">
            <?php echo get_sub_field('text'); ?>
        </h3>
    <?php endif; ?>
    </div>


<?php // Subline
elseif( get_row_layout() == 'subline' ): ?>
    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( get_sub_field('text') ) : ?>
        <div class="flex_inner_element txt subline columncolor">
            <p>
                <?php echo get_sub_field('text'); ?>
            </p>
        </div>
    <?php endif; ?>
    </div>


<?php // Text
elseif( get_row_layout() == 'text' ): ?>
    <div class="flex_inner flex_editor <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( get_sub_field('text') ) : ?>
        <div class="flex_inner_element txt spaces_asusual columncolor">
            <?php echo get_sub_field('text'); ?>
        </div>
    <?php endif; ?>
    </div>


<?php // Bild
elseif( get_row_layout() == 'bild' ): ?>
    <?php $imgsize = get_sub_field('img_size'); ?>
    <?php $imgmaxsize = get_sub_field('img_mh'); ?>

    <?php
        $image = get_sub_field( 'bild' );
        $size = $imgmaxsize;
        $img = wp_get_attachment_image_src( $image, $size );
    ?>
    <style>
        .<?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?> figure {
            height: <?php echo $imgmaxsize . 'px'; ?>;
            background-size: cover;
            background-position: center;
        }
    </style>
    <div class="flex_inner flex_bild <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
        <figure class="flex_inner_element" style="background-image: url('<?php echo $img[0] ?>')">
            sss
            <?php if ( get_sub_field('img_subline') ) : ?>
                <figcaption class="img_subline columncolor">
                    <?php echo get_sub_field('img_subline'); ?>
                </figcaption>
            <?php endif; ?>
        </figure>
    </div>
    

<?php // Buttons
elseif( get_row_layout() == 'buttons' ): ?>
    <?php if ( get_sub_field('button_fw') ) : ?>
        <?php $button_fw = '1'; ?>
    <?php else : ?>
        <?php $button_fw = '0'; ?>
    <?php endif; ?>

    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( have_rows('buttons') ) : ?>
        <div class="flex_inner_element buttons children_topmargin_xxs">
        <?php while( have_rows('buttons') ) : the_row(); ?>

            <?php 
            $link = get_sub_field('button');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="
                <?php if ($button_fw == '1') { echo 'button_fw'; } ?>
                    button 
                    child_topmargin_xxs
                    <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>  
                " 
                href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <span class="genericons-neue genericons-neue-next"></span> 
                    <?php echo esc_html( $link_title ); ?>
                </a>
            <?php endif; ?>

        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>


<?php // Slider
elseif( get_row_layout() == 'slider' ): ?>
    <?php $height_xs = get_sub_field('mcodryh_xs'); ?>
    <?php $height_sm = get_sub_field('mcodryh_sm'); ?>
    <?php $height_md = get_sub_field('mcodryh_md'); ?>
    <?php $height_lg = get_sub_field('mcodryh_lg'); ?>    

    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">

        
    <div class="flex_inner_element flex_slider">
        <?php if ( get_sub_field('title') || get_sub_field('subline') ) : ?>
            <div class="wrap_slider_text">
                <div class="wrap_slider_text_inner">
                    <h3>
                        <?php echo get_sub_field('title'); ?>
                    </h3>
                </div>
                <?php if ( get_sub_field('subline') ) : ?>
                    <p class="wrap_slider_text_subline">
                        <?php echo get_sub_field('subline'); ?>
                    </p>
                <?php endif; ?>					
            </div>
        <?php endif; ?>

        <?php if ( have_rows('images') ) : ?>        
            <div class="
                slider_content
                <?php echo 'height_xs_'.$height_xs; ?>
                <?php echo 'height_sm_'.$height_sm; ?>
                <?php echo 'height_md_'.$height_md; ?>
                <?php echo 'height_lg_'.$height_lg; ?>
            ">
                <?php while( have_rows('images') ) : the_row(); ?>
                <?php
                    $image = get_sub_field( 'image' );
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
    </div>


<?php // Zitat
elseif( get_row_layout() == 'zitat' ): ?>
    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
    <?php if ( get_sub_field('text') ) : ?>
        <div class="flex_inner_element">
            <blockquote class="zitat h2 txt columncolor">
                <?php echo get_sub_field('text'); ?>
            </blockquote>
            <?php if ( get_sub_field('quelle_name') ) : ?>
                <cite class="columncolor">
                    <?php echo get_sub_field('quelle_name'); ?>
                </cite>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>


<?php // Divider
elseif( get_row_layout() == 'divider' ): ?>
    <div class="flex_inner <?php echo 'gr_container'.$gr_container.'gr_row'.$gr_row.'gr_col'.$gr_col; ?>">
        <div class="flex_inner_element">
            <hr />
        </div>
    </div>



<?php endif; ?>