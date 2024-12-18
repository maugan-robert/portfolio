<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="wrap">
      <header class="site-header">
        <div class="header-content">
          <!-- Logo -->
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" alt="Logo">
            </a>
          </div>

          <!-- Desktop Menu -->
          <nav class="desktop-menu">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'menu-list',
              ));
            ?>
          </nav>

          <!-- Mobile Menu Burger -->
          <div class="burger-menu">
            <div class="burger-icon">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <!-- Mobile Menu -->
        <nav class="mobile-menu">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'header-menu',
              'container' => false,
              'menu_class' => 'mobile-menu-list',
            ));
          ?>
        </nav>
      </header>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
