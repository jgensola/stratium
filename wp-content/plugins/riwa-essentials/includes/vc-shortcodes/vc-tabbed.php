<?php

/* FAQ */
function ti_tabbed( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'tabname'   => '',
	  'image' => '',
	  'tabnumber' => '',
	  'title'     => '',
	  'desc'      => '',
	  'btnurl'    => '',
   ), $atts ) );
   ob_start(); 
	
   if( isset( $atts['tabbed'] ) ) {
		$tabbed = vc_param_group_parse_atts( $atts['tabbed'] );
   }
	
  ?>	
	
	
<div id="service-2" class="mid-level-padding">
        <div id="responsiveTabsDemo">
            <ul class="text-center">
               
            <?php $count = 0; foreach( $tabbed as $tab ) : $count++; ?>
                <li><a href="#tab-<?php echo $count; ?>"><?php echo esc_html($tab['tabname']); ?></a></li>
            <?php endforeach; ?>
               
            </ul>
            
            
            <?php $count = 0; foreach( $tabbed as $tab ) : $count++; ?>
            <div id="tab-<?php echo $count; ?>">
                <div class="container">
                    <div class="row is-flex">
                      
                      <?php 
                            $image = isset( $tab['image'] ) ? $tab['image'] : '';
                            $large_img  = wp_get_attachment_image_src($image, 'full') ;
                      ?>
                       
                       <?php if(!empty($large_img)) : ?>
                        <div class="col-md-6">
                            <?php 
                                if(!empty($large_img)) :
                                    echo '<img src="'.esc_url($large_img[0]).'" alt="pineapple" class="element-center">';
                                endif;
                            ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="<?php if(!empty($large_img)) : echo 'col-md-6'; else : echo 'col-md-12'; endif; ?> tabs-bg">
                            <div class="tabs-bg">
                                <h2><?php echo esc_html($tab['tabnumber']); ?></h2>
                                <h3><?php echo esc_html($tab['title']); ?></h3>
                                <p><?php  echo esc_html($tab['desc']); ?></p>
                                <a href="#" class="btn button hvr-shutter-out-horizontal">Get In Touch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            
        </div>

    </div>
	
	

   <?php

	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_tabbed', 'ti_tabbed');

vc_map( array(
   "name" => esc_html__("Tabbed Content", 'riwa'),
   "base" => "ti_tabbed",
   "class" => "",
   "icon" => "custom-vc-icons vc-tabbed",
   "category" => 'Custom',
   "params" => array(
		
		array(
		'type' => 'param_group',
		'value' => '',
		'param_name' => 'tabbed',
		'params' => array(

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Tab Name", 'riwa'),
				"param_name" => "tabname",
				"value" => '',
				"description" => esc_html__("Will be used in tabs navigation", 'riwa')
			),
            array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Image", 'riwa'),
				"param_name" => "image",
				"value" => '',
			),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Tab Number", 'riwa'),
				"param_name" => "tabnumber",
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
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__("Description", 'riwa'),
				"param_name" => "desc",
				"value" => '',
			),
            array(
				"type" => "href",
				"class" => "",
				"heading" => esc_html__("Button URL", 'riwa'),
				"param_name" => "btnurl",
				"value" => '',
			),

		 ),
	),   
   )
) );