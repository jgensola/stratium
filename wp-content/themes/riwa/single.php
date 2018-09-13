<?php
/**
 * The template for displaying all single posts and attachments
 */
 global $redux_ti; // Get theme options

get_header(); ?>
<div id="blog">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => esc_html__( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'riwa' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				
				if(!empty($redux_ti['show_pagination']) && $redux_ti['show_pagination'] == "1") :
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'riwa' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'riwa' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'riwa' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'riwa' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				endif;
			}

			// End of the loop.
		endwhile;
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
  </div>
</div>
<?php get_footer(); ?>
