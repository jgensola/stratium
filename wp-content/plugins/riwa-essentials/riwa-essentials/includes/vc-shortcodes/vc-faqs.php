<?php

/* FAQ */
function ti_faqs( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'faqs' => '',
	  'title' => '',
	  'desc' => '',
   ), $atts ) );
   ob_start(); 
	
   if( isset( $atts['faqs'] ) ) {
		$faqs = vc_param_group_parse_atts( $atts['faqs'] );
   }
	
  ?>	
	

	<div class="faq_wrapper">
          <ul class="items">
            
            <?php 
			 	$count = '0';	
				foreach( $faqs as $faq ) {
				$count++;
			?>
            <li>
              <a href="#" <?php //if($count == 1) : echo 'class="expanded"'; endif; ?>><?php echo esc_html($faq['title']); ?></a>
              <ul class="sub-items">
                <li>
                  <p><?php echo esc_html($faq['desc']); ?></p>
                </li>
              </ul>
            </li>
            <?php } ?>
            
            
          </ul>
        </div>
        

   <?php

	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_faqs', 'ti_faqs');

vc_map( array(
   "name" => esc_html__("FAQs", 'riwa'),
   "base" => "ti_faqs",
   "class" => "",
   "icon" => "custom-vc-icons vc-foodmenu",
   "category" => 'Custom',
   "params" => array(
		
		array(
		'type' => 'param_group',
		'value' => '',
		'param_name' => 'faqs',
		'params' => array(

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title", 'riwa'),
				"param_name" => "title",
				"value" => '',
				"description" => esc_html__("Enter Question", 'riwa')
			),
			array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__("Description", 'riwa'),
				"param_name" => "desc",
				"value" => '',
				"description" => esc_html__("Enter Answer here", 'riwa')
			),

		 ),
	),   
   )
) );