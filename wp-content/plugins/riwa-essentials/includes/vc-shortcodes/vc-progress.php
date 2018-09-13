<?php

/* 	Progress Bar */
function ti_progressbar( $atts ) {
   extract( shortcode_atts( array(
	  'title'  => '',
	  'percentage' => '',
   ), $atts ) );
   ob_start(); 
    
   ?>
                   
       <div class="skill-progress">
            <?php if(!empty($title)) : echo '<p>'. esc_html($title) .'</p>'; endif; ?>
            
            <?php if(!empty($percentage)) : ?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo esc_html($percentage); ?>%" aria-valuenow="96" aria-valuemin="0"
                     aria-valuemax="100">
                     <?php echo '<span>'. esc_html($percentage) .'%</span>'; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
            

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_progressbar', 'ti_progressbar');

vc_map( array(
   "name" => esc_html__("Progress Bar", 'riwa'),
   "base" => "ti_progressbar",
   "class" => "",
   "icon" => "custom-vc-icons vc-progressbar",
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
		), 
        array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Percentage", 'riwa'),
			"param_name" => "percentage",
			"value" => '',
			"description" => esc_html__("Enter Digits only", 'riwa')
		), 
 
   )
) );