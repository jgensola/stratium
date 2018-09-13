<?php

/* 	FOOD */
function ti_food_price( $atts ) {
   extract( shortcode_atts( array(
	  'image'	=> '', 
	  'title'   => '',
	  'price'   => '',
	  'desc'	=> '',
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>
  
  
	<div class="popular-food top40 text-center">
		<div class="image">
		<?php
			if (!empty($image) ) :  
				$food_img = wp_get_attachment_image_src($image, 'full'); 
				echo '<img src="'. esc_url($food_img[0]) .'" alt="" />';
			endif;
		?>
			<div class="overlay">
				<?php if (!empty($image) ) :  ?>
				<a class="fancybox overlay-inner" href="<?php echo esc_url($food_img[0]); ?>" data-fancybox-group="gallery">
					<i class="fa fa-search"></i>
				</a>
				<?php endif; ?> 
			</div>
		</div>
		<?php if(!empty($title)) : echo '<h4>'.esc_html($title).'</h4>'; endif; ?>
		<?php if(!empty($price)) : echo '<span class="dish">'.esc_html($price).'</span>'; endif; ?>
		<?php if(!empty($desc))  : echo '<p>'.esc_html($desc).'</p>'; endif; ?>
		
	</div>


<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_food_price', 'ti_food_price');

vc_map( array(
   "name" => esc_html__("Food with Price", 'riwa'),
   "base" => "ti_food_price",
   "class" => "",
   "icon" => "custom-vc-icons vc-food",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'riwa'),
			"param_name" => "title",
			"value" => '',
			"description" => esc_html__("Enter Food Name", 'riwa')
		), 
		array(
			"type" => "attach_image",
			"holder" => "img",
			"class" => "",
			"heading" => esc_html__("Image", 'riwa'),
			"param_name" => "image",
			"value" => '',
			//"description" => esc_html__("Number of Services", 'riwa')
		),
		array(
			"type" => "textfield",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Price", 'riwa'),
			"param_name" => "price",
			"value" => '',
			//"description" => esc_html__("Number of Services", 'riwa')
		),
		array(
			"type" => "textfield",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Description", 'riwa'),
			"param_name" => "desc",
			"value" => '',
			//"description" => esc_html__("Number of Services", 'riwa')
		),
		
   )
) );