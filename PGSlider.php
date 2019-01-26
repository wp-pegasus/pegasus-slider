<?php


class PGSlider {

	public function __construct() {
		add_shortcode("pg_slider", ['PGSlider', "pg_slider_display"]);
	}

	public function pg_slider_display(){
		$plugins_url = plugins_url();
		echo '<div class="container">
		  <div class="main-carousel" >
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_1.jpg' , __FILE__ ).'" /> </div>
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_2.jpg' , __FILE__ ).'" /> </div>
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_3.jpg' , __FILE__ ).'" /> </div>
		  </div>
		</div>';
	}
	public function getImages(){

	}
}