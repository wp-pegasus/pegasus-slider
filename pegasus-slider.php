<?php

/**
 * Plugin Name: Pegasus JQuery Slider
 * Description: Simple JQuery slider
 * Plugin URI: https://devscreencast.com
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

require_once 'PGSliderSetUpAssets.php';
$assetLoader = new PGSliderSetUpAssets;
$assetLoader->addScripts();
$assetLoader->addStyles();

require_once 'PGSlider.php';
(new PGSlider)->play();

require_once 'PGSliderPostType.php';
$customPost = new PGSliderPostType;
$customPost->register();

require_once 'PGSliderCustomFields.php';
$customElements = new PGSliderCustomFields;
$customElements->addColumn();
$customElements->addMetaBox();

require_once 'PGSliderManager.php';
(new PGSliderManager)->saveSlides();

require_once 'PGSliderSettings.php';
$settings = new PGSliderSettings();
$settings->addMenu();

