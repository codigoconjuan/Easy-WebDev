<?php

// Register Custom Post Type
function cursos() {

	$labels = array(
		'name'                => _x( 'Cursos', 'Post Type General Name', 'easy-webdev' ),
		'singular_name'       => _x( 'Curso', 'Post Type Singular Name', 'easy-webdev' ),
		'menu_name'           => __( 'Cursos', 'easy-webdev' ),
		'name_admin_bar'      => __( 'Cursos', 'easy-webdev' ),
		'parent_item_colon'   => __( 'Padre: ', 'easy-webdev' ),
		'all_items'           => __( 'Todos los Cursos', 'easy-webdev' ),
		'add_new_item'        => __( 'Agregar Nuevo Curso', 'easy-webdev' ),
		'add_new'             => __( 'Agregar Nuevo', 'easy-webdev' ),
		'new_item'            => __( 'Nuevo Curso', 'easy-webdev' ),
		'edit_item'           => __( 'Editar', 'easy-webdev' ),
		'update_item'         => __( 'Actualizar', 'easy-webdev' ),
		'view_item'           => __( 'Ver', 'easy-webdev' ),
		'search_items'        => __( 'Buscar', 'easy-webdev' ),
		'not_found'           => __( 'No Encontrado', 'easy-webdev' ),
		'not_found_in_trash'  => __( 'No Encontrado en Papelera', 'easy-webdev' ),
	);
	$args = array(
		'label'               => __( 'cursos', 'easy-webdev' ),
		'description'         => __( 'Post Type para Cursos', 'easy-webdev' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-video-alt3',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'cursos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cursos', 0 );


// Register Custom Taxonomy
function idioma() {

	$labels = array(
		'name'                       => _x( 'Idioma', 'Taxonomy General Name', 'easy-webdev' ),
		'singular_name'              => _x( 'Idioma', 'Taxonomy Singular Name', 'easy-webdev' ),
		'menu_name'                  => __( 'Idioma', 'easy-webdev' ),
		'all_items'                  => __( 'Todos los Idiomas', 'easy-webdev' ),
		'parent_item'                => __( 'Padre', 'easy-webdev' ),
		'parent_item_colon'          => __( 'Padre: ', 'easy-webdev' ),
		'new_item_name'              => __( 'Nuevo Idioma', 'easy-webdev' ),
		'add_new_item'               => __( 'Agregar Idioma', 'easy-webdev' ),
		'edit_item'                  => __( 'Editar', 'easy-webdev' ),
		'update_item'                => __( 'Actualizar', 'easy-webdev' ),
		'view_item'                  => __( 'Ver', 'easy-webdev' ),
		'separate_items_with_commas' => __( 'Separado por Comas', 'easy-webdev' ),
		'add_or_remove_items'        => __( 'Agregar o borrar', 'easy-webdev' ),
		'choose_from_most_used'      => __( 'Elegir de los más usados', 'easy-webdev' ),
		'popular_items'              => __( 'Populares', 'easy-webdev' ),
		'search_items'               => __( 'Buscar', 'easy-webdev' ),
		'not_found'                  => __( 'No Encontrado', 'easy-webdev' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'idioma', array( 'cursos' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'idioma', 0 );
