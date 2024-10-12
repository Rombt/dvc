<?php

function infinite_scroll() {


	$count_posts = wp_count_posts();
	$published_posts = $count_posts->publish - 3;

	$args = array(
		'post_type' => 'post',
		'paged' => 2,
		'posts_per_page' => $published_posts,
		'offset' => 3,
	);

	$query = new WP_Query( $args );


	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			if ( has_post_thumbnail() ) {
				$image_url = get_the_post_thumbnail_url();
			}

			$categories = get_the_category();
			$arr_category_names = [];

			if ( ! empty( $categories ) ) {
				foreach ( $categories as $category ) {
					$arr_category_names[] = $category->name;
				}
			}

			get_template_part( 'template-parts/components/card/card', null, [ 
				'img-url' => $image_url,
				'link_to_post' => get_the_permalink(),
				'title' => get_the_title(),
				'text' => get_the_excerpt(),
				'category_names' => $arr_category_names,
			] );

		}
	} else {
		wp_send_json_error( 'end' );
	}
	wp_reset_postdata();

	wp_die();

}

add_action( 'wp_ajax_infinite_scroll', 'infinite_scroll' );
add_action( 'wp_ajax_nopriv_infinite_scroll', 'infinite_scroll' );