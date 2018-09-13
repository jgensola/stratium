<?php

/* 	Custom Heading*/
function ti_heading( $atts ) {
   extract( shortcode_atts( array(
	  'style'    => '',
	  'vtext'    => '',
	  'title'    => '',
	  'position' => '',
	  'color'    => '',
	  'color1'  => '',
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>

	<?php if($style == 'default' || $style == '' ) { ?>
		<div class="<?php echo esc_attr($position); ?>">
		    <span class="vertical-text" <?php if(!empty($color1)) : echo 'style="color:'.$color1.';"'; endif; ?>>
		        <?php echo esc_html($vtext); ?>
		    </span>
			<h2 class="heading" <?php if(!empty($color)) : echo 'style="color:'.$color.';"'; endif; ?>>
			    <?php echo wp_kses($title, array( 'br' => array(), 'em' => array(), 'strong' => array() )); ?>
			</h2>	
		</div>
		
	<?php } if(!empty($title) && $style == 'simple') { ?>
	
	    <div class="<?php echo esc_attr($position); ?>">
		    <span class="heading-small-text" <?php if(!empty($color1)) : echo 'style="color:'.$color1.';"'; endif; ?>>
		        <?php echo esc_html($vtext); ?>
		    </span>
			<h2 class="heading-simple" <?php if(!empty($color)) : echo 'style="color:'.$color.';"'; endif; ?>>
			    <?php echo wp_kses($title, array( 'br' => array(), 'em' => array(), 'strong' => array() )); ?>
			</h2>	
		</div>
	
	<?php } ?>

	<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_heading', 'ti_heading');

vc_map( array(
   "name" => esc_html__("Custom Heading", 'riwa'),
   "base" => "ti_heading",
   "class" => "",
   "icon" => "custom-vc-icons vc-customheading",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
       array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'riwa'),
			"param_name" => "style",
			"value" => array(
							'Default' => 'default',
							'Simple' => 'simple',
						),
			"description" => esc_html__("Default: with vertical text - Simple: horizontal text", 'riwa')
		),
       array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Vertical / Small Text", 'riwa'),
			"param_name" => "vtext",
			"value" => '',
		),
        array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Heading", 'riwa'),
			"param_name" => "title",
			"value" => '',
			"description" => esc_html__("Allowed HTML Tags: <br>, <em>, <strong> ", 'riwa')
		), 
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Position", 'riwa'),
			"param_name" => "position",
			"value" => array(
							'Left' => 'text-left',
							'Center' => 'text-center',
							'Right' => 'text-right',
						),
			"description" => esc_html__("Select Heading Position ( only works with simple heading style )", 'riwa')
		),
		array(
			"type" => "colorpicker",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Custom Heading Color", 'riwa'),
			"param_name" => "color",
			"value" => '',
			"description" => esc_html__("Overwrite the default color", 'riwa')
		),
        array(
			"type" => "colorpicker",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Custom Small Text Color", 'riwa'),
			"param_name" => "color1",
			"value" => '',
			"description" => esc_html__("Overwrite the default color", 'riwa')
		),
   )
) );