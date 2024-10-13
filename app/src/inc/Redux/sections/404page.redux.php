<?php
defined( 'ABSPATH' ) || exit;


// 404 page sections start
// Redux::set_section(
// 	$opt_name,
// 	array(
// 		'title' => esc_html__( '404 page', RMBT_TEXT_DOMAIN_THEME ),
// 		'id' => 'settings_404-page',
// 		'desc' => esc_html__( '404 page settings', RMBT_TEXT_DOMAIN_THEME ),
// 		'customizer_width' => '450',
// 		'subsection' => true,
// 		// 'icon'             => 'el el-home',
// 		'fields' => array(



Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( '404 page settings', 'restaurant-site' ),
		'id' => 'settings_404-page',
		'desc' => esc_html__( 'Settings 404 page site', 'restaurant-site' ),
		'customizer_width' => '450',
		'subsections' => true,
		// 'icon'             => 'el el-home',
		'fields' => array(
			array(
				'id' => 'rmbt-404-page-title_uk',
				'type' => 'text',
				'title' => esc_html__( 'Title of 404 page on Ukrainian', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'Такої сторінки не існує' ),
			),
			array(
				'id' => 'rmbt-404-page-title_en',
				'type' => 'text',
				'title' => esc_html__( 'Title of 404 page on England', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'This page is not exist' ),
			),
			array(
				'id' => 'rmbt-404-page-text_uk',
				'type' => 'text',
				'title' => esc_html__( 'Text of 404 page on Ukrainian', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'Сторінка, яку ви шукаєте, не існує або була переміщена' ),
			),
			array(
				'id' => 'rmbt-404-page-text_en',
				'type' => 'text',
				'title' => esc_html__( 'Text of 404 page on England', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'The page you are looking for doesn`t exist or has been moved' ),
			),

		),
	)
);