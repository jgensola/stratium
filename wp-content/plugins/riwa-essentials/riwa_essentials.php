<?php
/**
 * Plugin Name: Riwa Essentials
 * Plugin URI: http://www.themesindustry.com/plugins/riwa-essentials/
 * Description: Essential code required for the theme
 * Version: 1.2
 * Author: ThemesInudustry
 * Author URI: http://www.themesindustry.com
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

require 'includes/theme-options.php';
require 'includes/post_types.php';
require 'includes/extend_vc.php';
require 'includes/meta-fields.php';

if ( class_exists( 'ReduxFramework' ) ) {
    require 'loader.php';
}

// Update Check
require 'update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'http://themesindustry.com/plugins/riwa-essentials.json',
    __FILE__,
    'riwa-essentials'
);