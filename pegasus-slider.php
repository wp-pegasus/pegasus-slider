<?php

/**
 * Plugin Name: Pegasus Flickity Slider
 * Description: Easy to use Flickity slider for wordpress, create multiple sliders and add to as many places as needed.
 * Plugin URI: https://github.com/wp-pegasus/pegasus-slider
 * Author: Pegasus
 * Author URI: http://github.com/terdia
 * Version: 1.0
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2018-2020 Devscreencast, Inc.
*/

function pg_slider_activation() {
}
register_activation_hook( __FILE__, 'pg_slider_activation' );

function pg_slider_deactivation() {
}
register_deactivation_hook( __FILE__, 'pg_slider_deactivation' );

require_once 'pg-slider-assets.php';
$asset_loader = new PG_Slider_Assets;
$asset_loader->add_scripts();
$asset_loader->add_styles();

require_once 'pg-slider.php';
(new PG_Slider)->play();

require_once 'pg-slider-post-type.php';
$custom_post = new PG_Slider_Post_Type;
$custom_post->register();

require_once 'pg-slider-custom-fields.php';
$custom_elements = new PG_Slider_Custom_Fields;
$custom_elements->add_column();
$custom_elements->add_meta_box();

require_once 'pg-slider-services.php';
(new PG_Slider_Service)->save_slides();

require_once 'pg-slider-settings.php';
$settings = new PG_Slider_Settings();
$settings->add_menu();

