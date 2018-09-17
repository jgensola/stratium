<?php
/**
Template Name: Static Page
 */

get_header('static'); ?>

<body <?php body_class(); ?>>

<div id="primary" class="content-area no-padding">
    <main id="main" class="site-main">
        <h2 class="page-title"><?php the_title(); ?></h2>
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
