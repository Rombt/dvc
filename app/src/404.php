<?php get_header(); ?>


<?php
if ( function_exists( 'pll_current_language' ) ) {
	$locale = explode( '_', pll_current_language( 'locale' ) )[0];
}
?>

<div class="utility-page-wrap">
	<div class="utility-page-content">
		<h2 class="heading">404</h2>
		<div class="text-block"><?php echo rmbt_get_redux_field( 'rmbt-404-page-text_' . $locale, 1 ) ?></div>
	</div>
</div>


<?php get_footer();