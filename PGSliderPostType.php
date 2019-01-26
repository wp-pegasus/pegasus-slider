<?php


class PGSliderPostType {

	public function __construct() {
		add_action('init', [self::class, 'build_post']);
	}

	public function build_post() {
		register_post_type('pg_slider', self::get_post_params());
	}

	private static function get_labels() {
		return ['menu_name' => _x('Pegasus Sliders', 'pg_slider'),];
	}

	private static function get_post_params( ) {
		return [
			'labels'              => self::get_labels(),
			'hierarchical'        => true,
			'description'         => 'Slideshows',
			'supports'            => [ 'title', 'editor' ],
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post'
		];
	}
}