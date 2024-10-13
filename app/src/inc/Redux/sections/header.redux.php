<?php
defined( 'ABSPATH' ) || exit;


// Header sections start
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Header settings', 'restaurant-site' ),
		'id' => 'settings_header',
		'desc' => esc_html__( 'Settings header site', 'restaurant-site' ),
		'customizer_width' => '450',
		'subsections' => true,
		// 'icon'             => 'el el-home',
		'fields' => array(

			array(
				'id' => 'rmbt-blog-page-title_uk',
				'type' => 'text',
				'title' => esc_html__( 'Title of blog page on Ukrainian', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'ЗАГОЛОВОК ТЕСТОВОГО ЗАВДАННЯ' ),
			),
			array(
				'id' => 'rmbt-blog-page-title_en',
				'type' => 'text',
				'title' => esc_html__( 'Title of blog page on England', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html( 'TEST TASK TITLE' ),
			),

		),
	)
);