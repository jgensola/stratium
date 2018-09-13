<?php
/**
* The template for the content bottom widget areas on posts and pages
*/
global $redux_ti; // Get theme options


if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) && ! is_active_sidebar( 'sidebar-5' ) ) {
	return;
}
// If we get this far, we have widgets. Let's do this.
?>

	<?php
	$widget_columns = '';
	if(!empty($redux_ti['widget_cols'])) : $widget_columns = $redux_ti['widget_cols']; endif;
	    if($widget_columns == 1) : $sidebar_class = 'col-md-12 col-sm-6 footer_column'; 
    elseif($widget_columns == 2) : $sidebar_class = 'col-md-6 col-sm-6 footer_column';
    elseif($widget_columns == 3) : $sidebar_class = 'col-md-4 col-sm-6 footer_column';
    elseif($widget_columns == 4) : $sidebar_class = 'col-md-3 col-sm-6 footer_column';
    endif;
?>

<div class="row widget-area-padding">

    <?php if($widget_columns >= 1) { ?>

        <aside class="content-bottom-widgets <?php echo $sidebar_class; ?>">
            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                <div class="widget-area">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
                <!-- .widget-area -->
                <?php endif; ?>
        </aside>

        <?php } if($widget_columns >= 2) { ?>

        <aside class="content-bottom-widgets <?php echo $sidebar_class; ?>">
            <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                <div class="widget-area">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
                <!-- .widget-area -->
                <?php endif; ?>
        </aside>

        <?php } if($widget_columns >= 3) { ?>

        <aside class="content-bottom-widgets <?php echo $sidebar_class; ?>">
            <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <div class="widget-area">
                    <?php dynamic_sidebar( 'sidebar-4' ); ?>
                </div>
                <!-- .widget-area -->
                <?php endif; ?>
        </aside>

        <?php } if($widget_columns == 4) { ?>

        <aside class="content-bottom-widgets <?php echo $sidebar_class; ?>">
            <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                <div class="widget-area">
                    <?php dynamic_sidebar( 'sidebar-5' ); ?>
                </div>
                <!-- .widget-area -->
                <?php endif; ?>
        </aside>

    <?php } ?>
    
</div>