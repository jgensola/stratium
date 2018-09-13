<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div id="blog">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( 'Previous page', 'riwa' ),
				'next_text'          => esc_html__( 'Next page', 'riwa' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'riwa' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

    </div>
    
    <!-- Sidebar -->
    <div class="col-md-4 col-sm-5">
        <aside class="sidebar">
	        <?php get_sidebar(); ?>
        </aside>
    </div>
    <!-- End Sidebar -->


    </div>
  </div>
<?php get_footer(); ?>
