<?php

function infinite_scroll() {

	$paged = intval( $_POST['paged'] );

	$args = array(
		'post_type' => 'post',
		'paged' => $paged,
		'posts_per_page' => 9,
		'orderby' => array(
			'title' => 'ASC',
		),
	);

	$query = new WP_Query( $args );

	// wp_send_json_success( $query );

	$text = '';

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			// $category = trim( get_the_terms( get_post(), 'location' )[0]->name, " \t" );


			the_title();
			// if ( has_post_thumbnail() ) {
			// 	$image = get_the_post_thumbnail();
			// } else {
			// 	$image = wp_get_attachment_image( 532, 'rmbt_post-img' );
			// }

			// get_template_part( 'template-parts/components/card/card', null, [ 
			// 	'class' => 'rmbt-card-destination',
			// 	'tag-img' => $image,
			// 	'date' => get_the_date(),
			// 	'title' => get_the_title(),
			// 	'text' => $text,
			// 	'category' => $category,
			// 	'comments_number' => get_comments_number(),
			// 	'link_to_post' => get_the_permalink(),
			// ] );

		}
	} else {
		wp_send_json_error( 'end' );
	}
	wp_reset_postdata();

	wp_die();

}

add_action( 'wp_ajax_infinite_scroll', 'infinite_scroll' );
add_action( 'wp_ajax_nopriv_infinite_scroll', 'infinite_scroll' );