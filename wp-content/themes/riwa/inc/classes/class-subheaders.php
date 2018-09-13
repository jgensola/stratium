<?php
// Theme Sub Headers

if (!class_exists('Riwa_Sub_Headers')) {

    class Riwa_Sub_Headers {

        function __construct() {
            add_action('riwa_subheader' ,    array ( &$this , 'riwa_selected_sub_header' ));
			
        }

        function riwa_selected_sub_header($layout) {
            switch ($layout) {
                case '01':
                    Riwa_Sub_Headers::riwa_subheader_01();
                    break;
                case '02':
                    Riwa_Sub_Headers::riwa_subheader_02();
                    break;
                
                default:
                    echo "SUB HEADER NOT SET";
                    break;
            }
        }


        // Sub Header Layout 01
        static function riwa_subheader_01() {
			global $redux_ti;
			$acf_header_style = '';
				
			if( class_exists('acf') ) {
			$acf_header_style   = get_field('choose_header');
				$acf_sub_img      = get_field('header_image');
				$acf_sub_title    = get_field('show_title'); 
				$acf_sub_bread    = get_field('show_breadcrumb');
				$acf_rev_slider   = get_field('revolution_slider');
				$acf_app_btntxt   = get_field('app_button_text');
				$acf_app_code     = get_field('app_form_code');
			}
			
        ?>	

		<?php 
			
			switch ($acf_header_style) {
				case 'header_def':

					global $redux_ti;
										
					if(!empty($redux_ti['sub_header_style']) && $redux_ti['sub_header_style'] == 'default') :

					if(!empty($redux_ti['default_subheader_img'])) : $redux_sub_head_img = $redux_ti['default_subheader_img']['url']; endif; ?>
					
					<section id="page_header" style="background-image:url(<?php echo esc_url($redux_sub_head_img) ?>);">
					<div class="page_title">
					  <div class="container">
						<div class="row">
						  <div class="col-md-12">
							 <h2 class="title">
								<?php Riwa_Sub_Headers::riwa_page_titles(); ?>
								</h2>
							 <?php if(function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
						  </div>
						</div>
					  </div>
					</div>  
					</section>
					<?php endif;

					if(!empty($redux_ti['sub_header_style']) && $redux_ti['sub_header_style'] == 'title_bread') :
					?>
										
					<section id="page_header_one">
					<div class="page_title">
					  <div class="container">
						<div class="row">
						  <div class="col-md-12">
							 <h2 class="title"><?php Riwa_Sub_Headers::riwa_page_titles(); ?></h2>
								<?php if(!empty($redux_ti['breadcrumb_status']) && $redux_ti['breadcrumb_status'] == '1') :
										if(function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
									  endif; ?>
						  </div>
						</div>
					  </div>
					</div>  
					</section>
					<?php endif;
					
				break;
					
				case 'header_rev':
				        ?>
                        
                        <div class="slider-main" <?php if(is_front_page()) : echo 'id="top"'; endif; ?> >
                        <?php echo do_shortcode($acf_rev_slider); ?>
                        </div>
                        
                        <?php
				break;

				case 'header_sub':
					?>
					<section id="page_header" style="background-image:url(<?php 
                    if(!empty($acf_sub_img)) : echo esc_url($acf_sub_img); 
                    elseif(!empty($redux_ti['default_subheader_img']['url'])) : echo $redux_ti['default_subheader_img']['url']; 
                    else : echo get_template_directory_uri().'/images/page-header-1.jpg'; 
                    //echo $subheading;
                    //echo esc_url($subhedimg); 
                    endif; ?>);">
					<div class="page_title">
					  <div class="container">
						<div class="row">
						  <div class="col-md-12">
							 <?php 
									if(!empty($acf_sub_title) && $acf_sub_title == "show") : 
										echo '<h2 class="title">';
							 			Riwa_Sub_Headers::riwa_page_titles();
										echo '</h2>';
									endif;
							 		if(!empty($acf_sub_bread) && $acf_sub_bread == "show") : 
							 			 dimox_breadcrumbs();
									endif;
							 ?>
						  </div>
						</div>
					  </div>
					</div>  
					</section>
					<?php
				break;
					
				case 'hide':
					echo '<div class="header_default_bg">&nbsp;</div>';
				break;
					
				default:
                case '':
					//echo '<div class="header_default_bg">&nbsp;</div>';
					?>
					<section id="page_header" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/page-header-1.jpg);">
					<div class="page_title">
					  <div class="container">
						<div class="row">
						  <div class="col-md-12">
							 <?php 
                                echo '<h2 class="title">';
                                Riwa_Sub_Headers::riwa_page_titles();
                                echo '</h2>';
                                dimox_breadcrumbs();
							 ?>
						  </div>
						</div>
					  </div>
					</div>  
					</section>
					<?php
				break;
			}
		
			

				
				
		}
        // Sub Header Layout 02
        static function riwa_subheader_02() {
			global $redux_ti;
          
			echo 'Subheader 1';
			
		}
		
		static function riwa_page_titles() {
            wp_title( ' ' ); 
		}
			
				 

		
		
    }

    new Riwa_Sub_Headers();
}