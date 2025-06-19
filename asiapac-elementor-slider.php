<?php
/**
Plugin Name: Asiapac Elementor Slider
Plugin URI: https://github.com/mobarakali/Asiapac-Elementor-Slider
Description: Display Elementor templates as slider slides via shortcode.
Version: 1.0
Author: Mobarak Ali
Author URI: https://github.com/mobarakali/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: asiapac-elementor-slider

This plugin uses the Slick Slider library (https://kenwheeler.github.io/slick/),
which is MIT licensed. Copyright (c) Ken Wheeler.
*/

// Prevent direct access to the file

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// Enqueue Slick slider CSS and JS
function aes_enqueue_slider_assets() {
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null, true);

    // Slider Source  Slider GitHub URL
   // https://kenwheeler.github.io/slick/


    // Init script
wp_add_inline_script('slick-js', "
    jQuery(window).on('load', function(){
        jQuery('.asiapac-elementor-slider').slick({
            dots: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 4000,
            adaptiveHeight: true,
            prevArrow: '<button type=\"button\" class=\"slick-prev \"></button>',
            nextArrow: '<button type=\"button\" class=\"slick-next \"></button>'
        });
    });
");
    // Custom CSS for slider
    wp_add_inline_style('slick-css', "
        .asiapac-elementor-slider {
                visibility: hidden;
            }
        .asiapac-elementor-slider.slick-initialized {
            visibility: visible;
        }

        .asiapac-elementor-slider .slide {
            min-height: 400px;
            width: 100%;
            padding: 0;
        }
        .asiapac-elementor-slider .slick-arrow {
            margin: 0  30px;
            z-index: 9999;
            height: 45px;
            line-height: 1;
            padding: 10px;
            font-size: 20px;
        }

		.asiapac-elementor-slider .slick-prev:before,
		.asiapac-elementor-slider .slick-next:before
		{
			font-family: 'slick';
			font-size: 30px;
			line-height: 1;
			opacity: .75;
			color: white;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		.asiapac-elementor-slider [type=button],
		.asiapac-elementor-slider button {
			border: 0 solid #d60c11;
		}
		.asiapac-elementor-slider [type=button]:focus,
		.asiapac-elementor-slider [type=button]:hover,
		.asiapac-elementor-slider button:focus,
		.asiapac-elementor-slider button:hover {
			background-color: #d60c11;
		}

    ");

}
add_action('wp_enqueue_scripts', 'aes_enqueue_slider_assets');

// Shortcode to display Elementor templates in a slider
function aes_slider_shortcode($atts) {
    $atts = shortcode_atts([
        'ids' => '',
    ], $atts);

    if (empty($atts['ids'])) {
        return '<p>No template IDs provided.</p>';
    }

    $ids = array_map('intval', explode(',', $atts['ids']));
    $output = '<div class="asiapac-elementor-slider">';

    foreach ($ids as $id) {
        $output .= '<div class="slide">';
        $output .= do_shortcode('[elementor-template id="' . $id . '"]');
        $output .= '</div>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode('asiapac_elementor_slider', 'aes_slider_shortcode');
