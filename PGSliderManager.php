<?php


class PGSliderManager {

	public function saveSlides() {
		add_action('save_post', [self::class, 'pg_save_slide_info']);
	}

	public function pg_save_slide_info($post_id) {
		// verify nonce
		if (!wp_verify_nonce($_POST['pg_slider_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ('pg_slider' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {

			/* Save Slider Images */
            $gallery_images = (isset($_POST['gallery_img']) ? $_POST['gallery_img'] : '');
            $gallery_images = strip_tags(json_encode($gallery_images));

            $existing = get_post_meta($post_id, '_pg_gallery_images');
            if(!empty($existing) and is_array($existing)){
	            update_post_meta($post_id, "_pg_gallery_images", $gallery_images);
            }else{
	            add_post_meta($post_id, "_pg_gallery_images", $gallery_images);
            }

	    } else {
	       return $post_id;
	    }
	}
}