<?php

$my_tags = [ 
	'Product',
	'Engineering',
	'Technology',
	'Company',
	'Saa',
];






function generate_content_post() {

	$args = [ 
		'taxonomy' => 'post_tag',
		'hide_empty' => 0,
	];

	$tags = get_terms( $args );

	$my_tags = [];
	foreach ( $tags as $tag ) {
		if ( $tag->name !== 'Без рубрики' ) {
			$my_tags[] = [ 
				'name' => $tag->name,
				'id' => $tag->term_id,
			];
		}
	}

	$image_path = wp_upload_dir()['basedir'] . '/2024/10/no-img.jpeg';
	$attachment = array(
		'guid' => wp_upload_dir()['url'] . '/' . basename( $image_path ),
		'post_mime_type' => mime_content_type( $image_path ),
		'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $image_path ) ),
		'post_content' => '',
		'post_status' => 'inherit',
	);
	$attachment_id = wp_insert_attachment( $attachment, $image_path, 0 );

	function generateRandomDate( $startDate, $endDate ) {
		$timestampStart = strtotime( $startDate );
		$timestampEnd = strtotime( $endDate );
		$randomTimestamp = mt_rand( $timestampStart, $timestampEnd );
		return date( "Y-m-d", $randomTimestamp );
	}

	function generateRandomText( $minWords = 30, $maxWords = 50 ) {
		$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan justo ut nulla ornare, nec tincidunt justo consectetur. Donec sit amet risus dapibus, consequat lacus ut, tincidunt nulla.";
		$wordsArray = explode( " ", $lorem );
		shuffle( $wordsArray );

		$wordCount = rand( $minWords, $maxWords );
		return implode( " ", array_slice( $wordsArray, 0, $wordCount ) ) . ".";
	}


	for ( $i = 1; $i < 11; $i++ ) {

		$arr_post_tags_id = [];
		for ( $q = 0; $q < mt_rand( 2, 4 ); $q++ ) {

			$random_index = mt_rand( 0, count( $my_tags ) - 1 );
			if ( $q === 0 ) {
				$country = $my_tags[ $random_index ]['name'];
			}
			$category_id = $my_tags[ $random_index ]['id'];
			$arr_post_tags_id[] = $category_id;
		}



		$date = generateRandomDate( "2022-01-01", "2024-10-07" );
		$title = "$i.    12 unique examples of photography portfolio";
		$text = generateRandomText();

		$post_data = [ 
			'post_title' => $title,
			'post_content' => $text,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_date' => $date,
		];

		$post_id = wp_insert_post( $post_data );

		wp_set_post_terms( $post_id, $arr_post_tags_id, 'post_tag' );

		if ( $post_id ) {
			if ( $attachment_id ) {
				set_post_thumbnail( $post_id, $attachment_id );
			}

		} else {
			$error = new WP_Error( '500', 'ERROR of added the post.' );
			wp_send_json_error( $error );
		}
	}

	wp_send_json_success();
}


/** создать категории  */
// function create_custom_categories() {
// 	global $my_tags;

// 	foreach ( $my_tags as $category_name ) {
// 		if ( ! term_exists( $category_name, 'category' ) ) {
// 			wp_insert_term(
// 				$category_name,
// 				'category'
// 			);
// 		}
// 	}
// }
// add_action( 'init', 'create_custom_categories' );



/** создать теги  */

function create_custom_tags() {
	global $my_tags;

	foreach ( $my_tags as $tag_name ) {
		if ( ! term_exists( $tag_name, 'post_tag' ) ) {
			wp_insert_term(
				$tag_name,
				'post_tag'
			);
		}
	}
}

add_action( 'init', 'create_custom_tags' );