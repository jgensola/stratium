<?php
// Theme Footer

if (!class_exists('Riwa_Common_Features')) {

    class Riwa_Common_Features {

        function __construct() {
            add_action('riwa_social' , array ( &$this , 'riwa_social' ));
        }

        // Footer Layout 01
        static function riwa_social($class_name = '') {
			
			global $redux_ti;
            if($class_name == '') : $class_name = 'social_icon'; endif;
            ?>
			
              <ul class="<?php echo $class_name; ?>">
                <?php if(!empty($redux_ti['social_facebook'])) : ?>
                    <li><a href="<?php echo esc_url($redux_ti['social_facebook']); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <?php endif; ?>
                <?php if(!empty($redux_ti['social_twitter'])) : ?>
                <li><a href="<?php echo esc_url($redux_ti['social_twitter']); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <?php endif; ?>
                <?php if(!empty($redux_ti['social_googleplus'])) : ?>
                <li><a href="<?php echo esc_url($redux_ti['social_googleplus']); ?>" class="google"><i class="fa fa-google"></i></a></li>
                <?php endif; ?>
                <?php if(!empty($redux_ti['social_linkedin'])) : ?>
                <li><a href="<?php echo esc_url($redux_ti['social_linkedin']); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                <?php endif; ?>
                <?php if(!empty($redux_ti['social_instagram'])) : ?>
                <li><a href="<?php echo esc_url($redux_ti['social_instagram']); ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                <?php endif; ?>
              </ul>

			
            <?php   
        }

        // Footer Layout 02
        static function riwa_another_common() {
            echo "Another Common";
        }
                
    }

    new Riwa_Common_Features();
}