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
        >