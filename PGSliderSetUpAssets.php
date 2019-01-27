<?php


class PGSliderSetUpAssets {

    public function addScripts(){
        add_action('wp_enqueue_scripts', [self::class, 'pg_slider_load_scripts']);
    }

    public function addStyles(){
        add_action('wp_enqueue_scripts', [self::class, 'pg_slider_load_styles']);
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

		//set dynamic options
        self::setSliderSettings();
	}

    private static function setSliderSettings()
    {
        $draggable = (get_option('pg_draggable') == 'enabled') ? true : get_option('pg_draggable');
        $autoplay = (get_option('pg_autoplay') == 'enabled') ? true : get_option('pg_autoplay');
        $pauseOnHover = get_option('pg_autoplaypauseonover') == 'true' ? true : false;
        $cellAlign = (get_option('pg_cellalign') == '') ? 'center' : get_option('pg_cellalign');
        $adaptiveHeight = (get_option('pg_adaptiveheight') == '') ? false : get_option('pg_adaptiveheight');
        $contain = (get_option('pg_contain') == '') ? true : get_option('pg_contain');
        $groupCells = (get_option('pg_groupcells') == '') ? false : get_option('pg_groupcells');

        $options = [
            'cellAlign' => $cellAlign,
            'draggable' => $draggable,
            'autoPlay' => $autoplay,
            'pauseAutoPlayOnHover' => $pauseOnHover,
            'adaptiveHeight' => $adaptiveHeight,
            'contain' => $contain,
            'groupCells' => $groupCells,
        ];
        wp_localize_script('pg_slider_init_js', 'option', $options);
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