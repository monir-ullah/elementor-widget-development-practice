<?php
/**
 * Plugin Name: Monir Team
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: monir-team
 */

function monir_team_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/team.php' );
	require_once( __DIR__ . '/widgets/woo-card.php' );
	$widgets_manager->register( new \Monir_Team_Member_Widgets() );
	$widgets_manager->register( new \Woo_Card() );
	
}
add_action( 'elementor/widgets/register', 'monir_team_widget' );

// Custom CSS
function widget_styles() {
    wp_register_style( 'elementor-common-style', plugins_url( 'style.css', __FILE__ ) );
    wp_enqueue_style('elementor-common-style');
	wp_enqueue_style('monir-fontawesome-css','//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css');
	wp_enqueue_style('slick-slider-css','//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
}

add_action( 'elementor/frontend/after_enqueue_styles', 'widget_styles' );
//   Custom JS
function widget_scripts() {
	wp_enqueue_script( 'slick-slider-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.01.01', true );
}
add_action('elementor/frontend/after_enqueue_scripts', 'widget_scripts');

// Add Category
function monir_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'monir-team-cat',
		[
			'title' => esc_html__( 'Monir Team Category', 'monir-team' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'monir_add_elementor_widget_categories' );