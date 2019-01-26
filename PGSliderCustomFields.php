<?php

class PGSliderCustomFields{

	public function __construct() {
		add_action('add_meta_boxes', [self::class, 'pg_slider_meta_box']);
	}

	public function pg_slider_meta_box() {
		add_meta_box(
			"pg-slider-images",
			"Slider Images", [self::class, 'pg_view_slider_images_box'], "pg_slider", "normal"
		);
	}

	public function pg_view_slider_images_box() {
		global $post;

		$slider_images = get_post_meta($post->ID, "_pg_gallery_images", true);
		$slider_images = ($slider_images != '') ? json_decode($slider_images) : [];
		// Use nonce for verification
		$html =  '<input type="hidden" name="pg_slider_box_nonce" value="'. wp_create_nonce(basename(__FILE__)). '" />';
		$html .= "
	<table class=\"form-table\">
		<tbody>
			<tr>
				<th><label for=\"Upload Images\">Image 1</label></th>
				<td><input id=\"pg_slider_image_upload\" type=\"text\" name=\"gallery_img[]\" value=\"{$slider_images[0]}\"></td>
			</tr>
			<tr>
				<th><label for=\"Upload Images\">Image 2</label></th>
				<td><input id=\"pg_slider_image_upload\" type=\"text\" name=\"gallery_img[]\" value=\"{$slider_images[1]}\"></td>
			</tr>
			
			<tr>
				<th><label for=\"Upload Images\">Image 3</label></th>
				<td><input id=\"pg_slider_image_upload\" type=\"text\" name=\"gallery_img[]\" value=\"{$slider_images[2]}\"></td>
			</tr>
			
			<tr>
				<th><label for=\"Upload Images\">Image 4</label></th>
				<td><input id=\"pg_slider_image_upload\" type=\"text\" name=\"gallery_img[]\" value=\"{$slider_images[3]}\"></td>
			</tr>
			
			<tr>
				<th><label for=\"Upload Images\">Image 5</label></th>
				<td><input id=\"pg_slider_image_upload\" type=\"text\" name=\"gallery_img[]\" value=\"{$slider_images[4]}\"></td>
			</tr>
		</tbody>
	</table>";

		echo $html;
	}
}


