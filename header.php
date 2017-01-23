<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" />
    <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/grid.css" />
    <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/icons.css" />
    <link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  	<?php endif; ?>
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <div class="main-banner">
          <h1 class="main-title"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
        </div>
        <nav>
          <h2 class="hidden">Menu</h2>
          <?php wp_nav_menu( array('menu' => 'Main', 'container' => '')); ?>
        </nav>
      </header>
