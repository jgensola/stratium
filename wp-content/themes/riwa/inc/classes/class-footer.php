<?php
// Theme Footer

if (!class_exists('Riwa_Footer_Layouts')) {

    class Riwa_Footer_Layouts {

        function __construct() {
            add_action('riwa_footer_layout' , array ( &$this , 'riwa_footer_layout' ));
        }

        function riwa_footer_layout($layout) {
            switch ($layout) {
                case '01':
                    Riwa_Footer_Layouts::riwa_footer_layout_01();
                    break;
                case '02':
                    Riwa_Footer_Layouts::riwa_footer_layout_02();
                    break;
                
                default:
                    echo "FOOTER NOT SET";
                    break;
            }
        }

        // Footer Layout 01
        static function riwa_footer_layout_01() {
			
			global $redux_ti;
            ?>
			
			<footer class="<?php if(!empty($redux_ti['footer_bg_color'])) : echo $redux_ti['footer_bg_color']; else : echo "dark"; endif; ?>">
				<div class="container">

					<?php if(!empty($redux_ti['show_widgets']) && $redux_ti['show_widgets'] == 1 ) : ?>
					
						<?php require get_template_directory() . '/sidebar-content-bottom.php'; ?>        

					<?php endif; ?>

					<div class="row">
					<div class="col-md-12">
					<div class="copyright clearfix">
					  <p><?php if(!empty($redux_ti['copyright_text'])) : echo esc_html($redux_ti['copyright_text']); endif; ?>
					 </p>
					  
				     <?php echo Riwa_Common_Features::riwa_social(); ?>
					  
					</div>
				  </div>
				</div>
				</div>
			</footer>
			
            <?php   
        }

        // Footer Layout 02
        static function riwa_footer_layout_02() {
            echo "FOOTER 2";
        }
                
    }

    new Riwa_Footer_Layouts();
}