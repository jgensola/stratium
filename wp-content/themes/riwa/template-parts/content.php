<?php
/**
 * The template part for displaying content
 */
global $redux_ti; // Get Theme Options
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('padding-bottom'); ?>>
	<div class="blog_item">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <span class="sticky-post"><?php echo esc_html__( 'Featured', 'riwa' ); ?></span>
        <?php endif; ?>
		<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
           <ul class="comments posted-on">
             
             
             <?php if(empty($redux_ti['show_date']) || $redux_ti['show_date'] == "1") : ?> 	
             <li><a><?php the_date(); ?></a></li>
             <?php endif; ?>
             
             <?php if(empty($redux_ti['show_commenntcount']) || $redux_ti['show_commenntcount'] == "1") : ?> 
             <span class="total">
             <li><a href="<?php echo esc_url(the_permalink()); ?>/#comments"><i class="icon-chat-2"></i><?php echo get_comments_number(); ?></a></li>
             </span>
             <?php endif; ?>
             
             <?php if(empty($redux_ti['show_authorname']) || $redux_ti['show_authorname'] == "1") : ?>
             <span class="byauthor">
             <li><a><?php the_author(); ?></a></li>
             </span>
             <?php endif; ?>
           </ul>
            <?php   
			 	if(empty($redux_ti['show_postedin']) || $redux_ti['show_postedin'] == "1") :
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
              
        
		   <?php if(empty($redux_ti['show_posttags']) || $redux_ti['show_posttags'] == "1") : 
                $posttags = get_the_tags(); 
                if($posttags) { 
                    the_tags( '<ul class="comments tag"><li>','</li><li>','</li></ul>'); } 
                 endif; 
            ?>           
           
           
          <div class="image_container">
          	<?php riwa_post_thumbnail(); ?>
          </div>
          
          
          <?php if ( has_excerpt() ) {
				  the_excerpt();
				  echo '<a class="btn-common button3" href="'.get_the_permalink().'">Read more</a>';
			} else { 
				  the_content('<span class="btn-common button3">Read More</span>');
			}
		  ?>

        
        </div>
        
</article><!-- #post-## -->