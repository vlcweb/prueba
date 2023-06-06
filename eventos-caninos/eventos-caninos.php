<?php
/*
Plugin Name:  Eventos Caninos
Version: 1.0
Description: Muestra los eventos caninos
Author: Jaime Fernández
Author URI: https://www.vlcweb.es/
License: GPL
License URI: https://www.gnu.org/licenses/gpl-1.0.html
Text Domain: Eventos Caninos
*/

function eventos_init() {

    $labels = array(
        'name' => 'Eventos',
        'singular_name' => 'Evento',
        'add_new' => 'Añadir nuevo evento',
        'add_new_item' => 'Añadir nuevo evento',
        'edit_item' => 'Editar evento',
        'new_item' => 'Nuevo evento',
        'all_items' => 'Todos los eventos',
        'view_item' => 'Ver evento',
        'search_items' => 'Buscar evento',
        'not_found' =>  'No se han encontrado eventos',
        'not_found_in_trash' => 'No hay eventos en la papelera', 
        'parent_item_colon' => '',
        'menu_name' => 'Eventos Caninos',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'evento'),
        'query_var' => true,
        'menu_icon' => 'dashicons-location',
        'supports' => array(
            'title',
            'editor',
			'excerpt',
			'thumbnail',
			'template'
        )
    );		
register_post_type( 'eventos', $args );      
}
add_action('init', 'eventos_init');

// Creamos una meta box para los campos personalizados

function my_metabox() {
    add_meta_box( id:'campos_personalizados', title:'Detalles del evento', callback: 'display_campos_personalizados', screen:'eventos');
}
add_action( 'add_meta_boxes', 'my_metabox' );

//Incluimos el formulario para coger los datos

function display_campos_personalizados() {
	include plugin_dir_path (file: __FILE__) . 'campos.php';
}

// Guardamos los datos y los mostramos

function guardar_datos($post_id){
	
	if  ($parent_id = wp_is_post_revision($post_id)){
		$post_id = 	$parent_id;
	}
	$field_list = [
		'campos_fecha',
		'campos_precio',
		'campos_direccion'
	];
	foreach( $field_list as $fieldName) {
		if(array_key_exists($fieldName, $_POST)) {
			update_post_meta(
				$post_id,
				$fieldName,
				sanitize_text_field($_POST[$fieldName])				
			);
		}
	}
}
add_action('save_post','guardar_datos');

//Creamos una taxonomia para eventos llamada Ubicación

function create_subjects_hierarchical_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Ubicacion', 'taxonomy general name' ),
    'singular_name' => _x( 'Ubicación', 'taxonomy singular name' ),    
    'all_items' => __( 'Todas las ubicaciones' ),
    'parent_item' => __( 'Categoría Superior' ),
    'parent_item_colon' => __( 'Categoría Superior:' ),
    'edit_item' => __( 'Editar Ubicación' ), 
    'update_item' => __( 'Actualizar Ubicación' ),
    'add_new_item' => __( 'Añadir nueva Ubicación' ),
    'new_item_name' => __( 'Nueva Ubicación' ),
    'menu_name' => __( 'Ubicación' ),
  );    
  
// Registramos la taxonomia
  register_taxonomy('ubicacion',array('eventos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'ubicacion' ),
  ));
	
}
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
