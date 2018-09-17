<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header('static'); ?>

	<div id="primary" class="content-area padding">
		<main id="main" class="site-main">

			<article class="error-404 not-found">
				<div class="page-content">
					<h2 class="page-title">Oops!</h2>
                    <h3>Error Code: 404</h3>
                    <p>The page you were looking for appears to have been moved, deleted, or does not exist. Click <a title="Homepage" href="<?php echo site_url() ?>">here</a> to go back to the homepage.</p><br />
				</div><!-- .page-content -->
			</article><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
