<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Themes_Industry
 * @since Themes Industry 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    <div class="content-area">
	<aside id="secondary" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
	</div>
<?php endif; ?>
