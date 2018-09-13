<?php
/**
 * The main template file
 */

get_header(); ?>
  
<div id="blog">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;

			the_posts_pagination( array(
				'prev_text'          => esc_html__( 'Previous page', 'riwa' ),
				'next_text'          => esc_html__( 'Next page', 'riwa' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'riwa' ) . ' </span>',
			) );

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
