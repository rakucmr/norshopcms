<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
        'driver' => 'database', // you can use 'database' or 'file', database uses ORM driver
	'view' => 'menu', // the view file
	'current_class' => 'current', // the set_current() method uses this setting to mark the current menu item

	'items' => array
	(
		array
		(
			'url'   => 'http://kohanaframework.org/',
			'title' => __('Home'),
		),
		array
		(
			'url'     => 'download',
			'title'   => __('Download'),
			'classes' => array('test'),
		),
		array
		(
			'url'   => 'documentation',
			'title' => __('Documentation'),
			'items' => array
			(
				array
				(
					'url'   => 'documentation/lorem-ipsum',
					'title' => __('Lorem ipsum'),
				),
				array
				(
					'url'   => 'documentation/dolor-sit-amet',
					'title' => __('Dolor sit amet'),
				),
			),
		),
		array
		(
			'url'   => 'community',
			'title' => __('Community'),
		),
		array
		(
			'url'   => 'development',
			'title' => __('Development'),
		),
	),

);