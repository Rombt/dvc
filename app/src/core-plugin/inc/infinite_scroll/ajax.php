<?php

function infinite_scroll() {

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);


	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			if ( has_post_thumbnail() ) {
				$image_url = get_the_post_thumbnail_url();
			}

			$tags = get_the_tags();
			$arr_tag_names = [];

			if ( ! empty( $tags ) ) {
				foreach ( $tags as $tag ) {
					$arr_tag_names[] = $tag->name;
				}
			}

			get_template_part( 'template-parts/components/card/card', null, [ 
				'img-url' => $image_url,
				'link_to_post' => get_the_permalink(),
				'title' => get_the_title(),
				'text' => get_the_excerpt(),
				'category_names' => $arr_tag_names,
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