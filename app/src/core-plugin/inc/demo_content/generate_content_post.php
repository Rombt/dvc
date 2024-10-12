<?php

$my_categories = [ 
	'Product',
	'Engineering',
	'Technology',
	'Company',
	'Saa',
];






function generate_content_post() {

	$args = [ 
		'taxonomy' => 'category',
		'hide_empty' => 0,
	];

	$categories = get_categories( $args );


	$my_categories = [];
	foreach ( $categories as $category ) {
		if ( $category->name !== 'Без рубрики' ) {
			$my_categories[] = [ 
				'name' => $category->name,
				'id' => $category->term_id,
			];
		}
	}



	$image_path = wp_upload_dir()['basedir'] . '/2024/10/coming-soon_0-1.jpg';
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


	for ( $i = 0; $i < 10; $i++ ) {

		$arr_post_categories_id = [];
		for ( $q = 0; $q < mt_rand( 2, 4 ); $q++ ) {

			$random_index = mt_rand( 0, count( $my_categories ) - 1 );
			if ( $q === 0 ) {
				$country = $my_categories[ $random_index ]['name'];
			}
			$category_id = $my_categories[ $random_index ]['id'];
			$arr_post_categories_id[] = $category_id;
		}



		$date = generateRandomDate( "2022-01-01", "2024-10-07" );
		$title = "12 unique examples of photography portfolio";
		$text = generateRandomText();

		$post_data = [ 
			'post_title' => $title,
			'post_content' => $text,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_category' => $arr_post_categories_id,
			'post_date' => $date,
		];

		$post_id = wp_insert_post( $post_data );

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



// function create_custom_categories() {
// 	global $my_categories;

// 	foreach ( $my_categories as $category_name ) {
// 		if ( ! term_exists( $category_name, 'category' ) ) {
// 			wp_insert_term(
// 				$category_name,
// 				'category'
// 			);
// 		}
// 	}
// }
// add_action( 'init', 'create_custom_categories' );