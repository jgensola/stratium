<?php
/**
 * The template part for displaying results in search pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('results-padding'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="search-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php riwa_post_thumbnail(); ?>
   
    <a class="date-in-search" href="<?php echo get_the_permalink(); ?>"><?php the_time('F jS, Y') ?></a>
    
	<?php riwa_excerpt(); ?>
	

	<?php if ( 'post' === get_post_type() ) : ?>


	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit ', 'riwa' ). ' <span class="screen-reader-text"> "%s"</span>',
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-## -->

