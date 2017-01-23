<?php
  // Etiqueta titulo
  add_theme_support( 'title-tag' );
  // Registro del menú de WordPress
  add_theme_support( 'nav-menus' );
  if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
      array(
        'main' => 'Main'
      )
    );
  }

  //  Main Sidebar
  if(function_exists('register_sidebar'))
  register_sidebar(array(
    'name' => 'Main Sidebar',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  //Habilitar thumbnails
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(150, 150, true);

  // Permitir comentarios encadenados
  function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script('comment-reply');
    }
  }
  add_action('get_header', 'enable_threaded_comments');
?>
