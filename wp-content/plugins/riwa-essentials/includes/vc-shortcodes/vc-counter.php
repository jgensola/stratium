<?php

/* COUNTER	*/
function ti_counter( $atts ) {
   extract( shortcode_atts( array(
	  'icon'     => '',
	  'title'    => '',
	  'cvalue'   => '',
	  'iconcolor'  => '',
   ), $atts ) );

   ob_start(); 
   $count=1;
  ?>
    
	<div class="counters-item">
		<?php if(!empty($icon)) : ?>
            <i class="fa <?php echo esc_attr($icon); ?>" <?php if(!empty($iconcolor)) : echo 'style="color:'.esc_attr($iconcolor).'"'; endif; ?>></i>
        <?php endif; ?>
		<?php if(!empty($cvalue)) : ?>
		    <h2><strong data-to="<?php echo esc_attr($cvalue); ?>"><?php echo esc_attr($cvalue); ?></strong></h2>
        <?php endif; ?>
		<?php if(!empty($title))  : echo '<p>'.esc_html($title).'</p>'; endif; ?>
	</div>

	<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_counter', 'ti_counter');

vc_map( array(
   "name" => esc_html__("Counter", 'riwa'),
   "base" => "ti_counter",
   "class" => "",
   "icon" => "custom-vc-icons vc-counter",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "textfield",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Icon", 'riwa'),
			"param_name" => "icon",
			"value" => '',
			"description" => esc_html__("Search and Click Icon to see its code: http://fontawesome.io/icons/
", 'riwa')
		), 
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Counter Value", 'riwa'),
            "param_name" => "cvalue",
            "value" => '',
        ), 
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'riwa'),
            "param_name" => "title",
            "value" => '',
        ), 
        array(
			"type" => "colorpicker",
			"holder" => "",
			"class" => "",
			"heading" => esc_html__("Custom Icon Color", 'riwa'),
			"param_name" => "iconcolor",
			"value" => '',
			"description" => esc_html__("Overwrite the default color", 'riwa')
		),
   )
) );