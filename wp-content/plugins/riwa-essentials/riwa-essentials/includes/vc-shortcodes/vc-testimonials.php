<?php

/* 	Testimonials */
function ti_testimonials( $atts ) {
   extract( shortcode_atts( array(
	  'records' => '',
   ), $atts ) );

   ob_start(); 
   $count=1;
    ?>
    
<div id="client-slider" class="owl-carousel owl-theme">
   <?php 
   $r = new WP_Query( array( 
       'posts_per_page' => $records,  
       'post_status' => 'publish', 
       'post_type' => '_testimonials',
       'order '=>'ASC',
       'orderby '=>'date'
   ) );
    
   if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post(); 
   ?>
   
    <div class="item">
        <div class="row">
            <div class="col-xs-6">
                <h3><?php echo get_the_title(); ?></h3>
            </div>
            <div class="col-xs-6">
                <h3 class="text-right small stars">
                    <?php 
                        if( class_exists('acf') ) {
			                 $stars = get_field('rating_stars');
                        } else {
                             $stars = '0';    
                        }
    
                        for ($i = 0; $i < $stars; $i++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i>';        
                        }
                     ?>        
                    
                    <span class="sr-only">Rating Stars</span>
                </h3>
            </div>
        </div>
        <p class="long"><?php echo get_the_content(); ?></p>
        <div class="client">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <?php
                        $width=83; $height=83; $thumb = get_post_thumbnail_id();
                        if(!empty($thumb)) :
                        $imgsize = vt_resize( $thumb, '', $width, $height, true );
                            echo "<img class='client-picture' src='" . esc_url($imgsize['url']) . "' style='width:".$imgsize['width']."px; height:".$imgsize['height']."px;' />";
                        endif;
                    ?>
                </div>
                <div class="col-md-10 col-sm-3">
                    <div class="client-name">
                        <p><?php echo esc_html(get_field('testimonial_reviewer')); ?></p>
                        <p><?php echo esc_html(get_field('subtitle')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php  endwhile; endif; ?>
    
    
</div>  

<?php

	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_testimonials', 'ti_testimonials');

vc_map( array(
   "name" => esc_html__("Testimonials", 'riwa'),
   "base" => "ti_testimonials",
   "class" => "",
   "icon" => "custom-vc-icons vc-testimonials",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("No.of Records", 'riwa'),
			"param_name" => "records",
			"value" => '',
			"description" => esc_html__("Enter -1 for all records", 'riwa')
		),  
   )
) );