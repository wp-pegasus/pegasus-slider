<?php

class PGSliderCustomFields{

	public function addMetaBox() {
		add_action('add_meta_boxes', [self::class, 'pg_slider_meta_box']);
	}

	public function addColumn() {
		add_filter('manage_edit-pg_slider_columns', [self::class, 'pg_set_custom_edit_slider_columns']);
		add_action('manage_pg_slider_posts_custom_column', [self::class, 'pg_custom_slider_column'], 10, 2);
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
		$html = '<input type="hidden" name="pg_slider_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

		$html .= '<table class="form-table">';

		$html .= "
          <tr>
            <th style=''><label for='Upload Images'>Slider  1</label></th>
            <td><input name='gallery_img[]' id='pg_slider_upload' type='text' value='" . $slider_images[0] . "'  /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Slider  2</label></th>
            <td><input name='gallery_img[]' id='pg_slider_upload' type='text' value='" . $slider_images[1] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Slider  3</label></th>
            <td><input name='gallery_img[]' id='pg_slider_upload' type='text'  value='" . $slider_images[2] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Slider  4</label></th>
            <td><input name='gallery_img[]' id='pg_slider_upload' type='text' value='" . $slider_images[3] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Slider  5</label></th>
            <td><input name='gallery_img[]' id='pg_slider_upload' type='text' value='" . $slider_images[4] . "' /></td>
          </tr>          

        </table>";

		echo $html;
	}

	public function pg_set_custom_edit_slider_columns($columns) {
		return $columns + ['pg_slider_shortcode' => __('Shortcode')];
	}

	public function pg_custom_slider_column($column, $post_id) {
		$slider_meta = get_post_meta($post_id, "_pg_slider_meta", true);
		$slider_meta = ($slider_meta != '') ? json_decode($slider_meta) : [];
		switch ($column) {
			case 'pg_slider_shortcode':
				echo "[pg_dynamic_slider id='$post_id' /]";
				break;
		}
	}
}


