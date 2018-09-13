<?php

/* FAQ */
function ti_pricing( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'title'    => '',
	  'price'    => '',
	  'currency' => '',
	  'duration' => '',
	  'desc'     => '',
	  'features' => '',
	  'icon'     => '',
	  'feaure'   => '',
	  'popular'  => '',
	  'link'     => '',
   ), $atts ) );
   ob_start(); 
	
   if( isset( $atts['features'] ) ) {
		$features = vc_param_group_parse_atts( $atts['features'] );
   }
    
   $href = vc_build_link( $link )
	
  ?>	
	

    
    <div class="pricing-table <?php if(!empty($popular) && $popular == 'true') : echo 'black'; endif; ?>">
      
       <?php if(!empty($title)) : echo '<div class="type"><h4>'.esc_html($title).'</h4></div>'; endif; ?>
       
       <div class="price">
            <div class="row">
                <div class="col-xs-4">
                    <h2>
                    <?php if(!empty($currency)) : echo '<span class="dollar">'.esc_html($currency).'</span>'; endif ?>
                    <?php if(!empty($price)) : echo esc_html($price).'<br>'; endif ?>
                    <?php if(!empty($duration)) : echo '<span class="month">'.esc_html($duration).'</span>'; endif ?>
                    </h2>
                </div>
                <div class="col-xs-8">
                    <?php if(!empty($desc)) : echo '<p>'.esc_html($desc).'</p>'; endif ?>
                </div>
            </div>
        </div>
        <ul class="packages"> 
           <?php 
                foreach( $features as $feature ) :
                       // print_r( $feature);
                    echo '<li><i class="'.esc_html($feature['icon']).'" aria-hidden="true"></i>'.esc_html($feature['feature']).'</li>';
                    
                endforeach; 
            ?>
        </ul>
        <?php if(!empty($link)) : 
                echo '<a href="'.esc_url($href['url']).'" class="btn button btn-block" target="'.esc_html($href['target']).'">'.esc_html($href['title']).'</a>';
              endif;
        ?>
    </div>

   <?php

	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_pricing', 'ti_pricing');

vc_map( array(
   "name" => esc_html__("Pricing", 'riwa'),
   "base" => "ti_pricing",
   "class" => "",
   "icon" => "custom-vc-icons vc-pricing",
   "category" => 'Custom',
   "params" => array(
       
       array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", 'riwa'),
            "param_name" => "title",
            "value" => '',
            "group" => 'General',
        ),
       array(
            "type" => "textfield",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Price", 'riwa'),
            "param_name" => "price",
            "value" => '',
            "group" => 'General',
        ),
       array(
            "type" => "textfield",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Duration", 'riwa'),
            "param_name" => "duration",
            "value" => '',
            "group" => 'General',
            "description" => esc_html__("eg, per month, per year etc", 'riwa')
        ),
       array(
            "type" => "textfield",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Currency", 'riwa'),
            "param_name" => "currency",
            "value" => '',
            "group" => 'General',
        ),
       array(
            "type" => "textarea",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Description", 'riwa'),
            "param_name" => "desc",
            "value" => '',
            "group" => 'General',
        ),
        array(
            "type" => "vc_link",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Link", 'riwa'),
            "param_name" => "link",
            "value" => '',
            "group" => 'General',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Popular", 'riwa'),
			"param_name" => "popular",
			"value" => '',
            "group" => 'General',
			"description" => esc_html__("Check to highlight this table", 'riwa')
		),
		
		array(
		'type' => 'param_group',
		'value' => '',
        "group" => 'Features',
		'param_name' => 'features',
		'params' => array(

			array(
				"type" => "textfield",
				"holder" => "",
				"class" => "",
				"heading" => esc_html__("icon", 'riwa'),
				"param_name" => "icon",
				"value" => 'fa fa-check',
				"description" => esc_html__("use fontawesome icons, eg( fa fa-check )", 'riwa')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Feature", 'riwa'),
				"param_name" => "feature",
				"value" => '',
			),

		 ),
	),   
   )
) );