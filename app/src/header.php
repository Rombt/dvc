<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>Test Task</title>
   <meta content="width=device-width, initial-scale=1" name="viewport" />
   <link href="main.css" rel="stylesheet" type="text/css" />
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
         <h1 class="heading-h1"> <?php echo rmbt_get_redux_field( 'rmbt-blog-page-title', 1 ) ?> </h1>
      </div>
   </div>