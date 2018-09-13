<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">


<?php /* if(!isset($redux_ti['show_page_title']) || $redux_ti['show_page_title'] == 1 ) : ?>
     <h2 class="default-title">
<?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ''; } elseif (is_404()) { echo 'Not Found '; } elseif (is_front_page()) { echo bloginfo('name'); } ?>
        </h2>
<?php endif; */ ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
