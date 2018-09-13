<?php

/* 	Food Menu */
function ti_foodmenu( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'title' => '',
	  'dishes' => '',
	  'layout' => '',
	  'name' => '',
	  'price' => '',
   ), $atts ) );
   ob_start(); 
	
		if(!empty($title)) { 
			echo '<h2 class="heading">'; 
			echo esc_html($title);
			echo '</h2><hr class="heading_space">';
		}		
	$simple = '';
	if(!empty($layout) && $layout == 'simple') : $simple = 'class="simple"'; endif;
	
		echo '<div class="menu_widget"><ul '.$simple.'>';
	if( isset( $atts['dishes'] ) ) {
		$dishes = vc_param_group_parse_atts( $atts['dishes'] );
	}
		foreach( $dishes as $dish ) {
			echo '<li>'.esc_html($dish['name']).'<span>'.esc_html($dish['price']).'</span></li>';	

		}
		echo '</ul></div>';


	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_foodmenu', 'ti_foodmenu');

vc_map( array(
   "name" => esc_html__("Food Menu", 'riwa'),
   "base" => "ti_foodmenu",
   "class" => "",
   "icon" => "custom-vc-icons vc-foodmenu",
   "category" => 'Custom',
   "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'riwa'),
			"param_name" => "title",
			"value" => '',
			"description" => esc_html__("Enter Title", 'riwa')
		), 
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Layout", 'riwa'),
			"param_name" => "layout",
			"value" => array(
							'Default' => 'default',
							'Simple' => 'simple',
						),
			"description" => esc_html__("Select Layout", 'riwa')
		),
		array(
		'type' => 'param_group',
		'value' => '',
		'param_name' => 'dishes',
		'params' => array(

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Name", 'riwa'),
				"param_name" => "name",
				"value" => '',
				"description" => esc_html__("Enter Dish name", 'riwa')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Price", 'riwa'),
				"param_name" => "price",
				"value" => '',
				"description" => esc_html__("Enter Dish Price", 'riwa')
			),

		 ),
	),   
   )
) );