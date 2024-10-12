<?php get_header(); ?>



<div class="content-section">
	<div class="container">
		<div class="w-layout-grid blog-grid">
			<div class="content-right">
				<div class="stick-wrapper">
					<div class="categories-block">
						<div class="title-large">Categories</div>
						<a href="#" class="categories-pill selected w-inline-block">
							<div class="title-small pink">Product</div>
						</a>
						<a href="#" class="categories-pill w-inline-block">
							<div class="title-small pink">Engineering</div>
						</a>
						<a href="#" class="categories-pill w-inline-block">
							<div class="title-small pink">Technology</div>
						</a>
						<a href="#" class="categories-pill w-inline-block">
							<div class="title-small pink">Company</div>
						</a>
						<a href="#" class="categories-pill w-inline-block">
							<div class="title-small pink">Saas</div>
						</a>
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
		<form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-2">
			<label for="name" class="title-large">Name</label>
			<input class="input w-input" maxlength="256" name="name" data-name="Name" placeholder="" type="text"
				id="name" />
			<label for="email" class="title-large">Email Address</label>
			<input class="input w-input" maxlength="256" name="email" data-name="Email" placeholder="" type="email"
				id="email" required="" />
			<input type="submit" data-wait="Please wait..." class="next-button w-button" value="Submit" />
		</form>
		<div class="w-form-done">
			<div>Thank you! Your submission has been received!</div>
		</div>
		<div class="w-form-fail">
			<div>Oops! Something went wrong while submitting the form.</div>
		</div>
	</div>




	<?php get_footer();