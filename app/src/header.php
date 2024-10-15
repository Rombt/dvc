<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title><?php wp_title( '|', true, 'right' ); ?></title>
   <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
   <script type="text/javascript">
   WebFont.load({
      google: {
         families: ["DM Sans:regular,500,700"]
      }
   });
   </script>

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>

   <?php
	if ( function_exists( 'pll_current_language' ) ) {
		$locale = explode( '_', pll_current_language( 'locale' ) )[0];
	}
	?>

   <div class="header">
      <div class="navigation w-nav">
         <div class="navigation-container-full">
            <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
            <?php endif ?>

            <nav role="navigation" class="navigation-menu w-nav-menu">
               <?php wp_nav_menu(
						array(
							'theme_location' => 'header_nav_lang',
							'container' => '',
						)
					); ?>
            </nav>
            <div class="menu-button w-nav-button">
               <div class="w-icon-nav-menu"></div>
            </div>
         </div>
      </div>
      <div class="title-centre">


         <?php if ( is_home() ) { ?>
         <h1 class="heading-h1"> <?php echo rmbt_get_redux_field( 'rmbt-blog-page-title_' . $locale, 1 ) ?> </h1>
         <?php } elseif ( is_single() ) { ?>
         <h1 class="heading-h1"> <?php echo get_the_title() ?> </h1>
         <?php } elseif ( is_404() ) { ?>
         <h1 class="heading-h1"> <?php echo rmbt_get_redux_field( 'rmbt-404-page-title_' . $locale, 1 ) ?> </h1>

         <?php } ?>

      </div>
   </div>