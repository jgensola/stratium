<?php

/* 	FOOD */
function ti_food( $atts ) {
   extract( shortcode_atts( array(
	  'records' => '',
	  'title'   => '',
	  'links'   => '',
	  'postlink'=> '',
	  'readmore'=> ''
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>

		<div id="services">
	<?php if(!empty($title)) { ?><h2 class="heading"><?php echo $title; ?></h2><hr class="heading_space"><?php } ?>
		<div class="slider_wrap">
		<div id="service-slider" class="owl-carousel">
	<?php

   $r = new WP_Query( array( 'posts_per_page' => $records,  'post_status' => 'publish', 'post_type' => '_food','order '=>'ASC','orderby '=>'date') );
   if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post(); 
		$content = get_the_content();
		$char_list = ''; 
		$count_content= str_word_count(strip_tags($content), 0, $char_list);
		 ?>

	<div class="item">
		<div class="item_inner">
		<?php
			if(!empty($links) && $links == true) { 
				$postlink = get_permalink();
			 }

	echo '<div class="image">';
	if ( has_post_thumbnail() ) {  
		the_post_thumbnail('riwa-food-listing');
	}
	echo '</div>';

		?>
		<?php $trimmed_content = wp_trim_words( $content, 44,'' ); ?>
		<h3><?php echo the_title(); ?></h3>
		<?php if(has_excerpt()) { 
				echo '<p>'. get_the_excerpt().'</p>';
			  } else {
				echo '<p>'.esc_html($trimmed_content).'</p>';
			  }
		?>
		<?php 
			if(isset($readmore) && $readmore == 'true') :
			echo '<a href="'. esc_url(get_permalink()) .'">'.esc_html__('... Read more').'</a>';
			endif;
		?>
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
add_shortcode('ti_food', 'ti_food');

vc_map( array(
   "name" => esc_html__("Food", 'riwa'),
   "base" => "ti_food",
   "class" => "",
   "icon" => "custom-vc-icons vc-food",
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
			"holder" => "div",
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
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Read more", 'riwa'),
			"param_name" => "readmore",
			"value" => '',
			"description" => esc_html__("Will show a read more link with each post", 'riwa')
		),
   )
) );