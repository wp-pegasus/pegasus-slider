<?php


class PGSliderSetUpAssets {

	public function __construct() {
		add_action('wp_enqueue_scripts', ['PGSliderSetUpAssets', 'pg_slider_load_scripts']);
		add_action('wp_enqueue_scripts', ['PGSliderSetUpAssets', 'pg_slider_load_styles']);
	}

	public function pg_slider_load_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script('pg_slider_core_js', plugins_url( 'js/flickity.pkgd.min.js', __FILE__), ['jquery']);
		wp_enqueue_script('pg_slider_core_js');
		wp_register_script('pg_slider_init_js', plugins_url(
			'js/pg.slider.setup.js', __FILE__),
			["pg_slider_core_js"]
		);
		wp_enqueue_script('pg_slider_init_js');
	}

	public function pg_slider_load_styles() {
		wp_register_style('pg_slider_core_css', plugins_url( 'css/flickity.css', __FILE__) );
		wp_enqueue_style('pg_slider_core_css');
		wp_register_style('pg_slider_example', plugins_url(
			'css/pg.slider.example.css', __FILE__),
			["pg_slider_core_css"]
		);
		wp_enqueue_style('pg_slider_example');
	}
}