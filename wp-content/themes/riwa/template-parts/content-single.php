<?php
/**
 * The template part for displaying single posts
 */
 global $redux_ti; // Get Theme Options
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php riwa_excerpt(); ?>

	<?php riwa_post_thumbnail(); ?>
	
	<div class="entry-content">
          <?php the_content(); ?>
    </div>
	<div>
		<?php

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'riwa' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => ' ',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>

       <div class="post-bottom-content clearfix">
        
        <div class="blog_item">

            <?php   
			 	if(empty($redux_ti['show_categories']) || $redux_ti['show_categories'] == "1") :
			 	$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
						$output .= '<ul class="comments postedin postedin-detail">';
					foreach( $categories as $category ) {
						$output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
					}
					$output .= '</ul>';
					echo trim( $output, $separator );
				}
				endif; 
			  ?>
              
        
		   <?php if(empty($redux_ti['show_tags']) || $redux_ti['show_tags'] == "1") : 
                $posttags = get_the_tags(); 
                if($posttags) { 
                    the_tags( '<ul class="comments tag"><li>','</li><li>','</li></ul>'); } 
                 endif; 
            ?>           

        </div>       
                        
                                
		<?php if(!empty($redux_ti['show_social']) && $redux_ti['show_social'] == "1") : ?>
        <div class="share-options clearfix">
            <?php echo riwa_social_sharing_buttons(); ?>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($redux_ti['show_author']) && $redux_ti['show_author'] == "1") : ?>
        <div class="author-bio clearfix">							
            <?php echo get_avatar( get_the_author_meta('user_email'), '70', '' ); ?>
            <div class="authorp vcard author">
                <h2><?php esc_html__('Author: ', 'riwa'); ?><span class="fn"><?php the_author_link(); ?></span></h2>
                <p><?php the_author_meta('description'); ?></p>							
            </div>
        </div>
        <?php endif; ?>
        
        </div>
        
                            
                            
        
	<?php // riwa_entry_meta(); ?>
    </div><!-- .entry-content -->
    

</article><!-- #post-## -->
