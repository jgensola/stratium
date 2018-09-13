<?php

/* 	ICON Section */
function ti_iconsection( $atts ) {
   extract( shortcode_atts( array(
	  'layout' => '',
	  'white'  => '',
	  'icon'   => '',
	  'title'  => '',
	  'title2' => '',
	  'desc'   => '',
	  'link'   => ''
   ), $atts ) );
   ob_start(); 
    
   $href = vc_build_link( $link );
   ?>
                   
    <?php if($layout == '' || $layout == 'layout1') { ?>
       
        <?php if(!empty($link)) : echo '<a href="'. esc_url($href['url']) .'">'; endif; ?>
            <div class="service-box">
                <?php if(!empty($icon))  : echo '<div class="icon"><i class="fa '. esc_attr($icon) .'"></i></div>'; endif; ?>
                <?php if(!empty($title)) : echo '<h3>'. esc_html($title) .'</h3>'; endif; ?>
                <hr>
                <?php if(!empty($desc))  : echo '<p>'. esc_html($desc) .'</p>'; endif; ?>
            </div>
        <?php if(!empty($link)) : echo '</a>'; endif; ?>
                   
    <?php } elseif($layout == 'layout2') { ?>
       
        <div class="feature text-center">
        <?php if(!empty($link))  : echo '<a href="'. esc_url($href['url']) .'">'; endif ?>
        <?php if(!empty($icon))  : echo '<i class="fa '. esc_attr($icon) .'"></i>'; endif; ?>
        <?php if(!empty($title)) : echo '<h3>'. esc_html($title) . '</h3>'; endif; ?>
		<?php if(!empty($desc))  : echo '<p>'.esc_html($desc).'</p>'; endif; ?>
		<?php if(!empty($link))  : echo '</a>'; endif; ?>
        </div>
    
    <?php } elseif($layout == 'layout3') { ?>    
    
        <div class="service-box-3">
            <div class="row">
                <div class="col-sm-2">
                   <?php if(!empty($icon))  : echo '<div class="icon"><i class="fa '. esc_attr($icon) .'"></i></div>'; endif; ?>
                </div>
                <div class="col-sm-10">
                    <?php if(!empty($title2)) : echo '<h5>'. esc_html($title2) . '</h5>'; endif; ?>
                    <?php if(!empty($title)) : echo '<h3>'. esc_html($title) . '</h3>'; endif; ?>
                    <?php if(!empty($desc))  : echo '<p>'.esc_html($desc).'</p>'; endif; ?>
                </div>
            </div>
        </div>
    
    <?php } ?>
                    
                    

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_iconsection', 'ti_iconsection');

vc_map( array(
   "name" => esc_html__("Icon Section", 'riwa'),
   "base" => "ti_iconsection",
   "class" => "",
   "icon" => "custom-vc-icons vc-iconsection",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Layout", 'riwa'),
			"param_name" => "layout",
			"value" => array(                            
							'Layout 1 - Centered - With box and background' => 'layout1',
							'Layout 2 - Centered - without box and background' => 'layout2',
							'Layout 3 - Left - without box and background' => 'layout3',
						),
			"description" => esc_html__("Select Layout style", 'riwa')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon", 'riwa'),
			"param_name" => "icon",
			"value" => '',
			"description" => esc_html__("Search and Click Icon to see its code: http://fontawesome.io/icons/", 'riwa')
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
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Second Title", 'riwa'),
			"param_name" => "title2",
			"value" => '',
			"description" => esc_html__("Optional, small text title used in Layout 3", 'riwa')
		), 
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Description", 'riwa'),
			"param_name" => "desc",
			"value" => '',
		), 
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__("Link", 'riwa'),
			"param_name" => "link",
			"value" => '',
			"description" => esc_html__("Enter Link", 'riwa')
		),  
   )
) );