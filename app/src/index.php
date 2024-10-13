<?php get_header(); ?>


<?php

$args = [ 
	'type' => 'post',
	'taxonomy' => 'post_tag',
	'hide_empty' => true,
];

$tags = get_categories( $args );

$arr_tags = [];
foreach ( $tags as $tag ) {
	if ( $tag->name !== 'Без рубрики' ) {
		$arr_tags[] = [ 
			'name' => $tag->name,
			'id' => $tag->term_id,
		];
	}
} ?>

<div class="content-section">
	<div class="container">
		<div class="w-layout-grid blog-grid">
			<div class="content-right">
				<div class="stick-wrapper">
					<div class="categories-block">
						<div class="title-large">Categories</div>
						<?php foreach ( $arr_tags as $tag ) : ?>
							<!-- <a href="<?= get_tag_link( $tag['id'] ) ?>" -->
							<a href="#" class="categories-pill selected w-inline-block title-small pink filter-button"
								data-id-tag='<?= $tag['id'] ?>'>
								<?= $tag['name'] ?>
							</a>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div class="content-left">

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) :
						the_post();

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
							'link_to_post' => get_the_permalink(),
						] );

					endwhile;
				} else {
					//   get_template_part('partials/notfound');
				}
				?>

				<a href="#" id="scroll-all" class="next-button w-inline-block">
					<div class="title-medium">Show all</div>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="content-section form-block">
	<div class="container"></div>
	<div class="form-block w-form">
		<?= do_shortcode( '[contact-form-7 id="a44d07a" title="blog-page"]' ) ?>

		<div class="w-form-done">
			<div>Thank you! Your submission has been received!</div>
		</div>
		<div class="w-form-fail">
			<div>Oops! Something went wrong while submitting the form.</div>
		</div>
	</div>




	<?php get_footer();