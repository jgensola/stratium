<?php
/**
 * The template for displaying image attachments
 */
global $redux_ti; // Get theme options
get_header(); ?>

<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'riwa' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'riwa' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<?php
								$image_size = apply_filters( 'riwa_attachment_size', 'large' );
								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>

							<?php riwa_excerpt( 'entry-caption' ); ?>

						</div><!-- .entry-attachment -->

						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'riwa' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'riwa' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php riwa_entry_meta(); ?>
						<?php
							// Retrieve attachment metadata.
							$metadata = wp_get_attachment_metadata();
							if ( $metadata ) {
								printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
									esc_html_x( 'Full size', 'Used before full size attachment link.', 'riwa' ),
									esc_url( wp_get_attachment_url() ),
									absint( $metadata['width'] ),
									absint( $metadata['height'] )
								);
							}
						?>
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_attr__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'riwa' ),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => esc_html_x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'riwa' ),
					) );
				// End the loop.
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
</section>
<?php get_footer(); ?>
