<?php
	
/* 	Team */
function ti_team( $atts ) {
   extract( shortcode_atts( array(
	  'records' => '',
	  'dlayout'	=> '',
	  'title'   => '',
	  'links'   => '',
	  'postlink'=> ''
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>


    <div id="specialists">
	    <div class="specialists_wrap_slider">
		    <div id="team-slider" class="owl-carousel">
	<?php
    $r = new WP_Query( array( 'posts_per_page' => $records,  'post_status' => 'publish', 'post_type' => '_team', 'order '=>'ASC', 'orderby '=>'date') );

    if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post(); 
    $content = get_the_content();
	$char_list = ''; 
	$count_content= str_word_count(strip_tags($content), 0, $char_list);
	?>

    <div class="item">
    <div class="specialist_wrap">
          <div class="image">
              <?php if ( has_post_thumbnail() ) : the_post_thumbnail('riwa-listing'); endif; ?>
          </div>
          <div class="overlay">
              <div class="info">
              <?php 
              $acf_doctitle = get_the_title(); if(!empty($acf_doctitle)) : echo "<h4>".esc_html($acf_doctitle)."</h4>"; endif;  
              $acf_docdepart = get_field('department'); if(!empty($acf_docdepart)) : echo "<small>".esc_html($acf_docdepart)."</small>"; endif;
              $trimmed_content = wp_trim_words( $content, 44 ); 
              if(!empty($trimmed_content)) : echo "<p>".esc_html($trimmed_content)."</p>"; endif;
              ?>

              <ul class="social_icon">
                  <?php
                  $acf_facebook  = get_field('facebook'); 
                  $acf_twitter   = get_field('twitter'); 
                  $acf_google    = get_field('googleplus'); 
                  $acf_linkedin  = get_field('linkedin'); 
                  $acf_instagram = get_field('instagram'); 
    
                  if(!empty($acf_facebook)) :
                    echo '<li><a href="'. esc_url($acf_facebook) .'" class="facebook"><i class="fa fa-facebook"></i></a></li>';
                  endif;
    
                  if(!empty($acf_twitter)) :
                    echo '<li><a href="'. esc_url($acf_twitter) .'" class="twitter"><i class="fa fa-twitter"></i></a></li>';
                  endif;
    
                  if(!empty($acf_google)) :
                    echo '<li><a href="'. esc_url($acf_google) .'" class="google"><i class="fa fa-google"></i></a></li>';
                  endif;
    
                  if(!empty($acf_linkedin)) :
                    echo '<li><a href="'. esc_url($acf_linkedin) .'" class="linkedin"><i class="fa fa-linkedin"></i></a></li>';
                  endif;
    
                  if(!empty($acf_instagram)) :
                    echo '<li><a href="'. esc_url($acf_instagram) .'" class="instagram"><i class="fa fa-instagram"></i></a></li>';
                  endif;
    
                  ?>
              </ul>

             </div>
         </div>
    </div>
    </div>


	 <?php  endwhile; endif; ?>
			</div>
		  </div>
		</div>
<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_team', 'ti_team');

vc_map( array(
   "name" => esc_html__("Team", 'riwa'),
   "base" => "ti_team",
   "class" => "",
   "icon" => "custom-vc-icons vc-team",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("No.of Posts", 'riwa'),
			"param_name" => "records",
			"value" => '',
			"description" => esc_html__("Number of Services", 'riwa')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Enable Links", 'riwa'),
			"param_name" => "links",
			"value" => '',
			"description" => esc_html__("Each post will be linked to its details page", 'riwa')
		), 
   )
) );