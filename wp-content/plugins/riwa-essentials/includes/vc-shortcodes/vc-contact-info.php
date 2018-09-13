<?php

/* 	ICON Section */
function ti_contactinfo( $atts ) {
   extract( shortcode_atts( array(
	  'country' => '',
	  'icon'  => '',
	  'details'   => '',
	  'detail'  => '',
   ), $atts ) );
   ob_start(); 
    
   // $href = vc_build_link( $link );
   ?>
                   
	<?php 

	echo '<div class="contactinfo">';

	if(!empty($country)) : echo '<h4>'. esc_html($country) . '</h4>'; endif; 

	if( isset( $atts['details'] ) ) {
		$details = vc_param_group_parse_atts( $atts['details'] );
	}
		echo '<ul class="details one">';
		foreach( $details as $detail ) {
			echo '<li><i class="fa '.esc_html($detail['icon']).'"></i><span>'.esc_html($detail['detail']).'</span></li>';	
		}
		echo '</ul>';
	echo '</div>';

	?>	
                   
    
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_contactinfo', 'ti_contactinfo');

vc_map( array(
   "name" => esc_html__("Contact Info", 'riwa'),
   "base" => "ti_contactinfo",
   "class" => "",
   "icon" => "custom-vc-icons vc-contactinfo",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(

		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Country", 'riwa'),
			"param_name" => "country",
			"value" => '',
		), 
		array(
			'type' => 'param_group',
			'value' => '',
			'param_name' => 'details',
			'params' => array(

			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Icon", 'riwa'),
				"param_name" => "icon",
				"value" => '',
				"description" => 'Enter icon name like ( fa-phone ), http://fontawesome.io/icons/',
			), 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Detail", 'riwa'),
				"param_name" => "detail",
				"value" => '',
			), 


		)),	
		

   )
) );