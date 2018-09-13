<?php

/* 	Social Icons*/
function ti_socialicons( $atts ) {
   extract( shortcode_atts( array(
	  'title'   => '',
   ), $atts ) );

   ob_start(); 
   $count=1;
   global $redux_ti; // Get theme options
  ?>

	<ul class="social_icon inpage">
		<?php if(!empty($redux_ti['social_facebook'])) : ?>
			<li><a href="<?php echo esc_url($redux_ti['social_facebook']); ?>" class="facebook"><i class="icon-facebook5"></i></a></li>
		<?php endif; ?>
		<?php if(!empty($redux_ti['social_twitter'])) : ?>
		<li><a href="<?php echo esc_url($redux_ti['social_twitter']); ?>" class="twitter"><i class="icon-twitter4"></i></a></li>
		<?php endif; ?>
		<?php if(!empty($redux_ti['social_googleplus'])) : ?>
		<li><a href="<?php echo esc_url($redux_ti['social_googleplus']); ?>" class="google"><i class="icon-google"></i></a></li>
		<?php endif; ?>
		<?php if(!empty($redux_ti['social_linkedin'])) : ?>
		<li><a href="<?php echo esc_url($redux_ti['social_linkedin']); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
		<?php endif; ?>
		<?php if(!empty($redux_ti['social_instagram'])) : ?>
		<li><a href="<?php echo esc_url($redux_ti['social_instagram']); ?>" class="instagram"><i class="icon-instagram"></i></a></li>
		<?php endif; ?>
	</ul>

	<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_socialicons', 'ti_socialicons');

vc_map( array(
   "name" => esc_html__("Social Icons", 'riwa'),
   "base" => "ti_socialicons",
   "class" => "",
   "icon" => "custom-vc-icons vc-social",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			//"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Social Icons", 'riwa'),
			"param_name" => "social_icons_holder",
			"value" => '',
			"description" => esc_html__("No Settings required", 'riwa')
		), 
   )
) );