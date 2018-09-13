<?php

/* 	Quote */
function ti_quote( $atts ) {
   extract( shortcode_atts( array(
	  'title'  => '',
	  'quote'  => '',
	  'titlecolor' => '',
	  'quotecolor' => '',
	  'quotesigns' => '',
   ), $atts ) );
   ob_start(); 
    
   ?>
  
    <div class="quote">
        <?php if(!empty($quote)) : ?>
        <h2 class="text-center" <?php if(!empty($quotecolor)) : echo 'style="color:'.esc_attr($quotecolor).'"'; endif; ?>>
           <i class="fa fa-quote-left" <?php if(!empty($quotecolor)) : echo 'style="color:'.esc_attr($quotesigns).'"'; endif; ?>></i>
               <?php echo wp_kses($quote, array( 'br' => array(), 'em' => array(), 'strong' => array() )); ?>   
           <i class="fa fa-quote-right" <?php if(!empty($quotecolor)) : echo 'style="color:'.esc_attr($quotesigns).'"'; endif; ?>></i>
        </h2> 
        <?php endif; ?>
        <?php if(!empty($title)) : ?>
            <p class="text-center" <?php if(!empty($titlecolor)) : echo 'style="color:'.esc_attr($titlecolor).'"'; endif; ?>>
                <?php echo esc_html($title); ?>
            </p>
        <?php endif; ?>
    </div>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_quote', 'ti_quote');

vc_map( array(
   "name" => esc_html__("Quote", 'riwa'),
   "base" => "ti_quote",
   "class" => "",
   "icon" => "custom-vc-icons vc-quote",
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
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("quote", 'riwa'),
			"param_name" => "quote",
			"value" => '',
		), 
        array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Title Color", 'riwa'),
			"param_name" => "titlecolor",
			"value" => '',
            "description" => esc_html__("Select if needs to be different from default color", 'riwa')
		),
        array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Quote Color", 'riwa'),
			"param_name" => "quotecolor",
			"value" => '',
            "description" => esc_html__("Select if needs to be different from default color", 'riwa')
		),
        array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Quote Signs Color", 'riwa'),
			"param_name" => "quotesigns",
			"value" => '',
            "description" => esc_html__("Select if needs to be different from default color", 'riwa')
		),
 
   )
) );