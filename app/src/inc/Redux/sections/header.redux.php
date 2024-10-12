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
				'id' => 'rmbt-blog-page-title',
				'type' => 'text',
				'title' => esc_html__( 'Title of News Block', RMBT_TEXT_DOMAIN_THEME ),
				'default' => esc_html__( 'TEST TASK TITLE', RMBT_TEXT_DOMAIN_THEME ),
			),





		),
	)
);