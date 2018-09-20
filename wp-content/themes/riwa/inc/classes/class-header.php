<?php
// Theme Headers

if (!class_exists('Riwa_Header_Layouts')) {

    class Riwa_Header_Layouts {

        function __construct() {
            add_action('riwa_preloader' ,    array ( &$this , 'riwa_loader' ));
            add_action('riwa_topbar' ,       array ( &$this , 'riwa_header_topbar' ));
            add_action('riwa_header' , 	     array ( &$this , 'riwa_selected_header' ));
			add_action('riwa_side_panel' ,   array ( &$this , 'riwa_side_panel' )); 
			add_action('riwa_static_header_mobile_layout' ,   array ( &$this , 'riwa_static_header_mobile_layout' ));
			add_action('riwa_social_links' , array ( &$this , 'riwa_social_links' ));
        }

        function riwa_selected_header($layout) {
            switch ($layout) {
                case '01':
                    Riwa_Header_Layouts::riwa_header_layout_01();
                    break;
                case '02':
                    Riwa_Header_Layouts::riwa_header_layout_02();
                    break;
                case '03':
                    Riwa_Header_Layouts::riwa_header_layout_03();
                    break;
                case '04':
                    Riwa_Header_Layouts::riwa_static_header_layout();
                    break;
                
                default:
                    echo "HEADER NOT SET";
                    break;
            }
        }

        static function riwa_loader() {
			global $redux_ti;
        ?>

	<!-- LOADER -->
	<div class="loader" style="display: block;">
        <div class="loader-container">
            <div class="content">
                <img src="<?php echo site_url() ?>/wp-content/themes/riwa/images/logo.svg">
                <div class="lds-ellipsis">
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
	</div>
	<!--LOADER Ends-->
	<?php    
        }

		// HeaderTop Bar
        static function riwa_header_topbar() {
			global $redux_ti;
		?>
		
		<div class="topbar">
		  <div class="container">
			<div class="row">
			  <div class="col-md-12">
				<p class="pull-left hidden-xs"><?php echo wp_kses($redux_ti['topbar_left_text'], array('a' => array('href' => array()))); ?></p>
				<p class="pull-right"><?php echo wp_kses($redux_ti['topbar_right_text'],  array('i' => array('class' => array()), 'a' => array('href' => array())));
				?></p>
			  </div>
			</div>
		  </div>
		</div>
		
		<?php	
		}
		
        // Header Layout 01
        static function riwa_header_layout_01() {
			global $redux_ti;
        ?>

		<div id="navigation" data-spy="affix" data-offset-top="20">
		  <div class="container-fluid">
		    <div class="row">
			  <div class="col-md-12">
                 
                  <?php 
                         if(isset($redux_ti['sidbebar_on_desktop']) && $redux_ti['sidbebar_on_desktop'] == 1) {
                             $menu_status = 'menu-desktop';
                         } else {
                             $menu_status = 'menu-mobile';
                         }
                    ?>
			      <div id="menu_bars" class="right <?php echo esc_attr($menu_status); ?>">
                      <span class="t1"></span>
                      <span class="t2"></span>
                      <span class="t3"></span>
                  </div>
                  
				<nav class="navbar navbar-default" id="primary_nav_wrap">
				    <div class="navbar-header">
				    <?php if(!empty($redux_ti['logo']['url'])) : $redux_sitelogo = $redux_ti['logo']['url']; ?>
				    
							<a class="navbar-brand logo" href="<?php echo esc_url(home_url( '/' )); ?>">
							<img src="<?php echo esc_url($redux_sitelogo); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive main_logo">
							</a>

                            <div class="contact-details">
                                <a href="tel:+639177721017" class="mobile">+63 (917) 772-1017</a>
                                <a href="tel:+63344457065" class="phone">+63 (34) 445-7065</a>
                                <a href="mailto:+63344457065" class="email">info@stratiumsoftware.com</a>
                            </div>
							
					<?php else : ?>
							<div class="site-title">
							<a class="navbar-brand sitename" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
							</a></div>
					<?php endif; ?>
					</div>
					<div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
				    <?php if ( has_nav_menu( 'primary' ) ) : 
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu nav navbar-nav',
								'walker' 		 => new riwa_bootstrap_navwalker(),
							 ) );
						  else : echo "<div class='define_menu'>". esc_html__('Define Your Primary Menu','riwa')."</div>"; 
					endif; ?>
					</div>
				</nav>
			  </div>
	 	    </div>
		  </div>
		</div>



		<?php	
		}

        // Header Layout 02
        static function riwa_header_layout_02() {	
			global $redux_ti;
        ?>
			<div id="navigation" data-spy="affix" data-offset-top="20">
			  <div class="container">
				<div class="row">
				  <div class="col-md-12">
				  
                  <?php $menu_status = 'menu-mobile'; ?>
			      <div id="menu_bars" class="right <?php echo esc_attr($menu_status); ?>">
                      <span class="t1"></span>
                      <span class="t2"></span>
                      <span class="t3"></span>
                  </div>
				  
					<nav class="navbar navbar-default" id="primary_nav_wrap">
						<div class="navbar-header">
						</div>
						<div class="navbar-left-1">
						  <div id="fixed-collapse-navbar" class="navbar-collapse collapse">
						  <?php if ( has_nav_menu( 'left-half' ) ) : 
								wp_nav_menu( array(
								'theme_location' => 'left-half',
								'menu_class'     => 'primary-menu nav navbar-nav',
								'walker' 		 => new riwa_bootstrap_navwalker(),
								 ) );
								else : echo "<div class='define_menu'>". esc_html__('Define Left Half Menu','riwa')."</div>"; endif; ?>
						  </div>
						</div>

						<?php // Logo Start
							if(!empty($redux_ti['logo']['url'])) : $redux_sitelogo = $redux_ti['logo']['url']; ?>
								<a class="navbar-brand logo-center" href="<?php echo esc_url(home_url( '/' )); ?>">
								<img src="<?php echo esc_url($redux_sitelogo); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive main_logo">
						 		</a>
						<?php else : ?>
						   <div class="site-title">
						   <a class="navbar-brand logo-center sitename" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
						   </a></div>
						<?php endif; // Logo END ?>

						<div class="navbar-right-1">
						  <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
							<?php if ( has_nav_menu( 'right-half' ) ) : 
									wp_nav_menu( array(
										'theme_location' => 'right-half',
										'menu_class'     => 'primary-menu nav navbar-nav',
										'walker' 		 => new riwa_bootstrap_navwalker(),
									 ) );
								  else : echo "<div class='define_menu'>". esc_html__('Define Right Half Menu','riwa')."</div>"; endif; ?>
						  </div>
						</div>
					</nav>
				  </div>
			    </div>
			  </div>
			</div>

			<?php	
        }
        
        // Header Layout 03
        static function riwa_header_layout_03() {	
			global $redux_ti;
        ?>
			<div id="navigation" data-spy="affix" data-offset-top="20">
		  <div class="container-fluid">
		    <div class="row">
			  <div class="col-md-12">
                 
                  <?php $menu_status = 'menu-desktop'; ?>
			      <div id="menu_bars" class="right <?php echo esc_attr($menu_status); ?>">
                      <span class="t1"></span>
                      <span class="t2"></span>
                      <span class="t3"></span>
                  </div>
                  
				<nav class="navbar navbar-default" id="primary_nav_wrap">
				    <div class="navbar-header">
				    <?php if(!empty($redux_ti['logo']['url'])) : $redux_sitelogo = $redux_ti['logo']['url']; ?>
				    
							<a class="navbar-brand logo" href="<?php echo esc_url(home_url( '/' )); ?>">
							<img src="<?php echo esc_url($redux_sitelogo); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive main_logo">
							</a>
							
					<?php else : ?>
							<div class="site-title">
							<a class="navbar-brand sitename" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
							</a></div>
					<?php endif; ?>
					</div>
					
				</nav>
			  </div>
	 	    </div>
		  </div>
		</div>

			<?php	
        }
		
		// Header Layout 02
        static function riwa_side_panel() {
			global $redux_ti;
        ?>


			<div class="pushmenu pushmenu-right" data-in="slideIn" data-out="fadeOut">

				<?php 
					if(isset($redux_ti['show_sidebar_logo']) && $redux_ti['show_sidebar_logo'] == 1) {

						if(!empty($redux_ti['sidebar_logo']['url'])) :
							echo '<a class="push-logo" href="'. esc_url(home_url( '/' )).'">
							<img src="'. esc_url($redux_ti['sidebar_logo']['url']) .'" alt="'. get_bloginfo('name').'" class="img-responsive sidebar_logo" />
							</a>';
						else :
							echo '<h3><a class="push-logo" href="'.esc_url(home_url( '/' )).'">'. get_bloginfo('name') .'</a></h3>';
						endif;

					} else { 
						echo '<div>&nbsp;<br />&nbsp;</div>';
					}
				?>

				<div id="dl-menu" class="dl-menuwrapper clearfix">
					<!--<button class="dl-trigger">Open Menu</button> -->
					<?php if ( has_nav_menu( 'right-sidebar-menu' ) ) : 
							wp_nav_menu( array(
							'theme_location' => 'right-sidebar-menu',
							'container' 	 => false,
							'menu_class'     => 'dl-menu dl-menuopen',
							'walker	' 		 => new Riwa_Sidebar_Nav_Menu(),
							) );
							else : echo "<div class='define_menu'>". esc_html__('Define Mobile Menu','riwa')."</div>"; endif; ?>
				</div>

				<div class="sidebar-copyright clearfix">
					<?php if(isset($redux_ti['sidbebar_social']) && $redux_ti['sidbebar_social'] == 1) :
						echo Riwa_Common_Features::riwa_social();
					endif; ?>

					<?php if(!empty($redux_ti['sidebar_footer_txt'])) :
						echo '<p class="copyright-text">'. $redux_ti['sidebar_footer_txt'] . '</p>';
					endif; ?>
				</div>



			</div>

		<?php
		}

		// Static Page Header
        static function riwa_static_header_layout() {
            global $redux_ti;
            ?>

            <div id="navigation" data-spy="affix" data-offset-top="20">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                            if(isset($redux_ti['sidbebar_on_desktop']) && $redux_ti['sidbebar_on_desktop'] == 1) {
                                $menu_status = 'menu-desktop';
                            } else {
                                $menu_status = 'menu-mobile';
                            }
                            ?>
                            <div id="menu_bars" class="right <?php echo esc_attr($menu_status); ?>">
                                <span class="t1"></span>
                                <span class="t2"></span>
                                <span class="t3"></span>
                            </div>

                            <nav class="navbar navbar-default" id="primary_nav_wrap">
                                <div class="navbar-header">
                                    <?php if(!empty($redux_ti['logo']['url'])) : $redux_sitelogo = $redux_ti['logo']['url']; ?>

                                        <a class="navbar-brand logo" href="<?php echo esc_url(home_url( '/' )); ?>">
                                            <img src="<?php echo esc_url($redux_sitelogo); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive main_logo">
                                        </a>

                                        <div class="contact-details">
                                            <a href="tel:+639177721017" class="mobile">+63 (917) 772-1017</a>
                                            <a href="tel:+63344457065" class="phone">+63 (34) 445-7065</a>
                                            <a href="mailto:+63344457065" class="email">info@stratiumsoftware.com</a>
                                        </div>

                                    <?php else : ?>
                                        <div class="site-title">
                                            <a class="navbar-brand sitename" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home">
                                                <?php bloginfo( 'name' ); ?>
                                            </a></div>
                                    <?php endif; ?>
                                </div>
                                <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
                                    <?php if ( has_nav_menu( 'static' ) ) :
                                        wp_nav_menu( array(
                                            'theme_location' => 'static',
                                            'menu_class'     => 'primary-menu nav navbar-nav',
                                            'walker' 		 => new riwa_bootstrap_navwalker(),
                                        ) );
                                    else : echo "<div class='define_menu'>". esc_html__('Define Your Primary Menu','riwa')."</div>";
                                    endif; ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <?php
        }

        // Static Page Mobile Header
        static function riwa_static_header_mobile_layout() {
            global $redux_ti;
            ?>


            <div class="pushmenu pushmenu-right" data-in="slideIn" data-out="fadeOut">

                <?php
                if(isset($redux_ti['show_sidebar_logo']) && $redux_ti['show_sidebar_logo'] == 1) {

                    if(!empty($redux_ti['sidebar_logo']['url'])) :
                        echo '<a class="push-logo" href="'. esc_url(home_url( '/' )).'">
							<img src="'. esc_url($redux_ti['sidebar_logo']['url']) .'" alt="'. get_bloginfo('name').'" class="img-responsive sidebar_logo" />
							</a>';
                    else :
                        echo '<h3><a class="push-logo" href="'.esc_url(home_url( '/' )).'">'. get_bloginfo('name') .'</a></h3>';
                    endif;

                } else {
                    echo '<div>&nbsp;<br />&nbsp;</div>';
                }
                ?>

                <div id="dl-menu" class="dl-menuwrapper clearfix">
                    <!--<button class="dl-trigger">Open Menu</button> -->
                    <?php if ( has_nav_menu( 'static-mobile' ) ) :
                        wp_nav_menu( array(
                            'theme_location' => 'static-mobile',
                            'container' 	 => false,
                            'menu_class'     => 'dl-menu dl-menuopen',
                            'walker	' 		 => new Riwa_Sidebar_Nav_Menu(),
                        ) );
                    else : echo "<div class='define_menu'>". esc_html__('Define Mobile Menu','riwa')."</div>"; endif; ?>
                </div>

                <div class="sidebar-copyright clearfix">
                    <?php if(isset($redux_ti['sidbebar_social']) && $redux_ti['sidbebar_social'] == 1) :
                        echo Riwa_Common_Features::riwa_social();
                    endif; ?>

                    <?php if(!empty($redux_ti['sidebar_footer_txt'])) :
                        echo '<p class="copyright-text">'. $redux_ti['sidebar_footer_txt'] . '</p>';
                    endif; ?>
                </div>



            </div>

            <?php
        }

		
    }

    new Riwa_Header_Layouts();
}