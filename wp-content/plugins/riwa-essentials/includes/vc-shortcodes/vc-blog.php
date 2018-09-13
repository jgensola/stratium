<?php

/* 	Receipes */
function ti_blog( $atts ) {
   extract( shortcode_atts( array(
        'records' => '',
        'title'   => '',
        'links'   => '',
        'postlink'=> '',
        'date'	=> '',
        'comments'=> '',
        'postorder'=> '',
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>

	<div>
	<?php if(!empty($title)) { ?><h2 class="heading"><?php echo esc_html($title); ?></h2><hr class="heading_space"><?php } ?>
		<div class="specialists_wrap_slider">
		<div id="food-slider" class="owl-carousel">
	<?php

   $r = new WP_Query( array( 'posts_per_page' => $records,  'post_status' => 'publish', 'post_type' => 'post', 'orderby'=>'date') );

   if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post(); 
		$content = get_the_content();
		$char_list = ''; 
		$count_content= str_word_count(strip_tags($content), 0, $char_list);
		 ?>
		 
        <div class="middle-section blog-section wow animated" style="visibility: visible;">
            <?php $doctitle = get_the_title(); if(!empty($doctitle)) { ?>
					<h4><?php if($links != "true") : echo '<a href="'.esc_url(get_the_permalink()).'">'; endif; ?>
						<?php echo the_title(); ?>
						<?php if($links != "true") : echo '</a>'; endif; ?>
					</h4>
            <?php } ?>
            <?php 
                global $post;
                if($post->post_excerpt) {
                    the_excerpt();
                } else {
                    $trimmed_content = wp_trim_words( $content, 20 );
                    if(!empty($trimmed_content)) : echo "<p>".esc_html($trimmed_content)."</p>"; endif;
                }
                
            ?>
            <?php echo '<a href="'.get_the_permalink().'">'.esc_html__('Read More &gt;').'</a>'; ?>
            <div class="user">
                <div class="row">
                    <div class="col-md-6 col-sm-7 col-xs-5">
                        <p><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 );  echo get_the_author(); ?></p>
                    </div>
                    <div class="col-md-6 col-sm-5 col-xs-7">
                        <?php if($date != "true") : 
                            echo '<p class="text-right">'.esc_attr(get_the_date('F d, Y')).'</p>'; 
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>		 
		 

	 <?php  endwhile; endif; 
		echo '</div>
		  </div>
		</div>';

	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_blog', 'ti_blog');

vc_map( array(
   "name" => esc_html__("Blog", 'riwa'),
   "base" => "ti_blog",
   "class" => "",
   "icon" => "custom-vc-icons vc-blog",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Heading", 'riwa'),
			"param_name" => "title",
			"value" => '',
			"description" => esc_html__("Enter Title for section", 'riwa')
		), 
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("No.of Posts", 'riwa'),
			"param_name" => "records",
			"value" => '',
			"description" => esc_html__("Number of Services, Enter -1 for unlimted", 'riwa')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Post Order", 'riwa'),
			"param_name" => "postorder",
			"value" => array(
							'Asending' => 'ASC',
							'Desending' => 'DESC',
						),
			"description" => esc_html__("Select Layout style", 'riwa')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Hide Date", 'riwa'),
			"param_name" => "date",
			"value" => '',
			"description" => esc_html__("Check if you want to hide post date", 'riwa')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Hide Comments Count", 'riwa'),
			"param_name" => "comments",
			"value" => '',
			"description" => esc_html__("Check if you want to hide Comments Count", 'riwa')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Disable Links", 'riwa'),
			"param_name" => "links",
			"value" => '',
			"description" => esc_html__("Check if you want to disable post link to detail page", 'riwa')
		), 
   )
) );