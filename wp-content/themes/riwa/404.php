<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<div id="primary" class="content-area padding">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html__( '404', 'riwa' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
				<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'riwa' ); ?></p><br />
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'riwa' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	            <button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'riwa' ); ?></button>
    		    </form>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
