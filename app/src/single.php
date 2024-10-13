<?php get_header(); ?>


<div class="content-section">
	<div class="container">
		<div class="w-layout-grid blog-grid">
			<div class="content-right">
				<div class="stick-wrapper">
					<div class="categories-block">
						<div class="title-large">Tags</div>

						<?php
						$post_id = get_the_ID();
						$tags = get_the_tags( $post_id );
						$arr_tags = [];
						$arr_tag_names = [];

						if ( ! empty( $tags ) ) {
							foreach ( $tags as $tag ) {
								$arr_tags[] = [ 
									'name' => $tag->name,
									'id' => $tag->term_id,
								];
							}
						}
						foreach ( $arr_tags as $tag ) :
							$arr_tag_names[] = $tag['name']; ?>
							<a href="<?= get_tag_link( $tag['id'] ) ?>"
								class="categories-pill selected w-inline-block title-small pink filter-button" '>
											<?= $tag['name'] ?>
										</a>
						<?php endforeach ?>
						
					</div>
				</div>
			</div>
			<div class="content-left">
				<?php
				get_template_part( 'template-parts/components/card/card', null, [ 
					'img-url' => get_the_post_thumbnail_url( $post_id ),
					'link_to_post' => get_the_permalink( $post_id ),
					'title' => get_the_title( $post_id ),
					'text' => get_the_excerpt( $post_id ),
					'category_names' => $arr_tag_names,
					'link_to_post' => get_the_permalink( $post_id ),
				] );

				?>
			</div>
			</div>
			</div>


			<?php get_footer();