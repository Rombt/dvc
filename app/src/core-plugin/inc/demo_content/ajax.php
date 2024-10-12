<?php

function generate_demo_content() {


	if ( ! current_user_can( 'manage_categories' ) ) {
		wp_send_json_error( 'access denied' );
	}


	$post_type_page = $_POST['post_type_page'];


	if ( $post_type_page === 'destination' ) {

		generate_content_destination();
	} elseif ( $post_type_page === 'post' ) {
		generate_content_post();
	}

	// wp_send_json( $post_type_page );

	wp_die();
}

add_action( 'wp_ajax_generate_demo_content', 'generate_demo_content' );