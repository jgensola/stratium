<?php
/**
 * The template for displaying the header
 */
 global $redux_ti; // Get theme options
?><!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (! function_exists('has_site_icon') || ! has_site_icon()) {
			if(!empty($redux_ti['favicon']['url'])) : $redux_favicon = $redux_ti['favicon']['url'];
	?>
    <link rel="icon" href="<?php echo esc_url($redux_favicon); ?>">
    <?php endif; } ?>
    <?php wp_head(); ?>
    <style>
        html {
            position: relative;
            height: 100%;
            width: 100%;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        body {
            overflow-x: hidden;
            position: relative;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-size: 14px;
            font-family: 'Titillium Web', sans-serif;
        }

        .pushmenu-push {
            overflow-x: hidden;
            position: relative;
            left: 0;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            -o-transition: all .4s ease;
            -webkit-transition: all .4s ease;
            transition: all .4s ease;
        }

        .loader {
            position: fixed;
            z-index: 1200;
            left: 0;
            top: 0;
            right: 0;
            overflow: hidden;

            width: 100%;
            height: 100%;

            background: #000;
        }

        .loader img {
            display: block;
            width: 100%;
            max-width: 300px;
            min-width: 220px;
        }

        .loader .animation {
            width: 100px;
            margin: 20px auto 0;
        }

        .loader .content {
            text-align: center;
        }

        .loader-container {
            height: 100%;
            padding: 50px;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -ms-flex;
            display: flex;
            -webkit-align-items: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
        }

        .loader-container .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 64px;
            height: 64px;
        }

        .loader-container .lds-ellipsis div {
            position: absolute;
            top: 27px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: #fff;
            -webkit-animation-timing-function: cubic-bezier(0, 1, 1, 0);
            -moz-animation-timing-function: cubic-bezier(0, 1, 1, 0);
            -o-animation-timing-function: cubic-bezier(0, 1, 1, 0);
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .loader-container .lds-ellipsis div:nth-child(1) {
            left: 6px;
            -webkit-animation: lds-ellipsis1 0.6s infinite;
            -moz-animation: lds-ellipsis1 0.6s infinite;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .loader-container .lds-ellipsis div:nth-child(2) {
            left: 6px;
            -webkit-animation: lds-ellipsis2 0.6s infinite;
            -moz-animation: lds-ellipsis2 0.6s infinite;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .loader-container .lds-ellipsis div:nth-child(3) {
            left: 26px;
            -webkit-animation: lds-ellipsis2 0.6s infinite;
            -moz-animation: lds-ellipsis2 0.6s infinite;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .loader-container .lds-ellipsis div:nth-child(4) {
            left: 45px;
            -webkit-animation: lds-ellipsis3 0.6s infinite;
            -moz-animation: lds-ellipsis3 0.6s infinite;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @-webkit-keyframes lds-ellipsis1 {
            0% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-moz-keyframes lds-ellipsis1 {
            0% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-ms-keyframes lds-ellipsis1 {
            0% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-o-keyframes lds-ellipsis1 {
            0% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
        }

        @keyframes lds-ellipsis1 {
            0% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-webkit-keyframes lds-ellipsis3 {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-moz-keyframes lds-ellipsis3 {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-ms-keyframes lds-ellipsis3 {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-o-keyframes lds-ellipsis3 {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                -ms-transform: scale(0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-webkit-keyframes lds-ellipsis2 {
            0% {
                -webkit-transform: translate(0, 0);
                -moz-transform: translate(0, 0);
                -o-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: translate(19px, 0);
                -moz-transform: translate(19px, 0);
                -o-transform: translate(19px, 0);
                -ms-transform: translate(19px, 0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-moz-keyframes lds-ellipsis2 {
            0% {
                -webkit-transform: translate(0, 0);
                -moz-transform: translate(0, 0);
                -o-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: translate(19px, 0);
                -moz-transform: translate(19px, 0);
                -o-transform: translate(19px, 0);
                -ms-transform: translate(19px, 0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-ms-keyframes lds-ellipsis2 {
            0% {
                -webkit-transform: translate(0, 0);
                -moz-transform: translate(0, 0);
                -o-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: translate(19px, 0);
                -moz-transform: translate(19px, 0);
                -o-transform: translate(19px, 0);
                -ms-transform: translate(19px, 0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @-o-keyframes lds-ellipsis2 {
            0% {
                -webkit-transform: translate(0, 0);
                -moz-transform: translate(0, 0);
                -o-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: translate(19px, 0);
                -moz-transform: translate(19px, 0);
                -o-transform: translate(19px, 0);
                -ms-transform: translate(19px, 0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                -webkit-transform: translate(0, 0);
                -moz-transform: translate(0, 0);
                -o-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                -webkit-font-smoothing: antialiased;
            }
            100% {
                -webkit-transform: translate(19px, 0);
                -moz-transform: translate(19px, 0);
                -o-transform: translate(19px, 0);
                -ms-transform: translate(19px, 0);
                -webkit-font-smoothing: antialiased;
            }
        }

        @media  only screen and (min-width: 768px) {
            .loader img {
                min-width: 300px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="150">

<!-- LOADER -->
<?php
global $redux_ti;
if(!empty($redux_ti['enable_preloader']) && $redux_ti['enable_preloader'] == "1") :
    do_action('riwa_preloader');
endif;
?>
<!--LOADER Ends-->

<div class="dark-screen"></div>
<div class="wrapper" id="top">

<!--Header-->
<header id="main-navigation">

    <?php 
        // Topbar
        if(!empty($redux_ti['show_top_bar']) && $redux_ti['show_top_bar'] == "1") :
            do_action('riwa_topbar');
        endif;

        // Navigation
        if(!empty($redux_ti['nav_layout'])) :
            $riwa_header_layout = $redux_ti['nav_layout'];
        else :
            $riwa_header_layout = '01';
        endif;
        do_action('riwa_header', $riwa_header_layout);
    ?>

</header>
<?php 
	// Sidebar Menu
	do_action('riwa_side_panel');
	
	// Sub headers
	$riwa_selected_sub_header = '01';
	do_action('riwa_subheader', $riwa_selected_sub_header);

?>
<div class="container">