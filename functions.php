<?php
// vignettes
add_theme_support( 'post-thumbnail' );
add_theme_support( 'post-thumbnails' );
// menus

function theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('dm-sans-font', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap', false);
  }
  add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//ajouter une nouvelle zone de menu à mon thème
function register_my_menu(){
    register_nav_menus( array(
        'header-menu' => __( 'Header'),
        'footer-menu'  => __( 'Footer'),
    ) );
}
add_action( 'init', 'register_my_menu', 0 );


function custom_menu_items($items, $args) { 
    if (is_user_logged_in()) {
        
        // Ajoute le conteneur pour les éléments de gauche et de droite
        $items = '<div class="menu-gauche">' . $items . '</div>'; 

        // Ajoute les liens de déconnexion à droite
    } else {
        // Ajoute le conteneur pour les éléments de gauche et de droite
        $items = '<div class="menu-gauche">' . $items . '</div>'; 

        // Ajoute les liens de connexion et d'inscription à droite
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'custom_menu_items', 10, 2);


function enqueue_styles() {
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css'); // Remplace par le chemin de ton fichier CSS
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function register_custom_post_type_projets() {
    $args = array(
        'labels' => array(
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'add_new' => 'Ajouter un projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'edit_item' => 'Modifier le projet',
            'new_item' => 'Nouveau projet',
            'view_item' => 'Voir le projet',
            'search_items' => 'Rechercher des projets',
            'not_found' => 'Aucun projet trouvé',
            'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projets'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('projets', $args);
}
add_action('init', 'register_custom_post_type_projets');

function ajouter_favicon() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/logo-naguaM-blanc.png" type="image/x-icon">';
}
add_action('wp_head', 'ajouter_favicon');

  function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');