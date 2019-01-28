<?php


/**
 * Class PG_Slider
 */
class PG_Slider {

	public function play() {
		add_shortcode("pg_slider", [$this, "pg_slider_display"]);
		add_shortcode("pg_dynamic_slider", [$this, "pg_dynamic_slider_display"]);
	}

	public function pg_slider_display(){
		echo '<div class="container">
		  <div class="main-carousel" >
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_1.jpg' , __FILE__ ).'" /> </div>
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_2.jpg' , __FILE__ ).'" /> </div>
		    <div class="pg-carousel-cell"> <img src="'.plugins_url( 'images/example_3.jpg' , __FILE__ ).'" /> </div>
		  </div>
		</div>';
	}

	public function pg_dynamic_slider_display($attr, $content){
		extract(shortcode_atts(['id' => ''], $attr));
		$pg_slider_images = get_post_meta($id, "_pg_gallery_images", true);
		$pg_slider_images = ($pg_slider_images != '') ? json_decode($pg_slider_images) : [];

		$html = '<div class="container"><div class="main-carousel">';
					foreach ($pg_slider_images as $image) {
						if($image != ""){
							$html .= "<div class='pg-carousel-cell'><img alt='' src={$image} /></div>";
						}
					}
			$html .= "</div></div>";

		return $html;
	}
}