<a href="/blog-article" class="blog-item w-inline-block">
	<div class="wrap-img blog-image-wrap">
		<img src="<?php echo $args['img-url'] ?>" width="380" alt="" class="blog-image" />
	</div>
	<div class="blog-content">
		<h3 class="heading-h2"><?php echo $args['title'] ?></h3>
		<p class="paragraph-detials-medium"> <?php echo $args['text'] ?></p>
		<div class="tags-block">

			<?php if ( ! empty( $args['category_names'] ) ) {
				foreach ( $args['category_names'] as $category_name ) { ?>

					<section class="categories-pill">
						<div class="title-small pink"><?php echo $category_name; ?></div>
					</section>

				<?php }
			} ?>

		</div>
	</div>
</a>