<?php

/* Insertamos hojas de estilos y scripts.
Tenemos que añadir obligatoriamente el archivo style.css, y en este caso, al estar
usando bootsrap añadimos los archivos css y js de bootstrap.
*/
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js' );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* Damos soporte para menús a nuestro tema con la siguiente función.
Usaremos el "walker" wp_bootstrap_navwalker.
*/
include_once('wp_bootstrap_navwalker.php');
function ow_register_my_menu() {
    register_nav_menu( 'header-menu', __('Menú de la cabecera') );
}
add_action( 'init', 'ow_register_my_menu' );


/* Dar soporte a imágenes destacadas */

add_theme_support('post-thumbnails');
add_post_type_support( 'perro', 'thumbnail' );   

// Perro Custom Post Type
// 
function perro_init() {
    // set up product labels
    $labels = array(
        'name' => 'Perro',
        'singular_name' => 'Perro',
        'add_new' => 'Añadir nuevo perro',
        'add_new_item' => 'Añadir nuevo perro',
        'edit_item' => 'Editar perro',
        'new_item' => 'Nuevo perro',
        'all_items' => 'Todos los perros',
        'view_item' => 'Ver perro',
        'search_items' => 'Buscar perro',
        'not_found' =>  'No se han encontrado perros',
        'not_found_in_trash' => 'No hay perros en la papelera', 
        'parent_item_colon' => '',
        'menu_name' => 'Perros',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'perro'),
        'query_var' => true,
        'menu_icon' => 'dashicons-pets',
        'supports' => array(
            'title',
            'editor'	
        )
    );	
	
register_post_type( 'perro', $args );  
    
}
add_action( 'init', 'perro_init' );



/*
 * Añadimos nuevas columnas a la vista general del CPT
 */
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
	 'title' => __ ( 'Nombre del perro' ),
     'edad' => __ ( 'Edad' ),
     'raza'   => __ ( 'Raza' ),
	 'tamano'   => __ ( 'Tamaño' )
   ) );
 }
 add_filter ( 'manage_perro_posts_columns', 'add_acf_columns' );

/*
 * Quitar la columna fecha de la lista de Perros
 */
function my_manage_columns( $columns ) {
  unset($columns['date']);
  return $columns;
}

add_filter("manage_perro_posts_columns", "my_manage_columns" );


/*
 * Mostramos los valores de cada columna
 */
 function perro_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'edad':
       echo get_post_meta ( $post_id, 'edad', true );
       break;
     case 'raza':
       echo get_post_meta ( $post_id, 'raza', true );
       break;
	case 'tamano':
       echo get_post_meta ( $post_id, 'tamano', true );
       break;	
   }
 }
 add_action ( 'manage_perro_posts_custom_column', 'perro_custom_column', 10, 2 );








?>
