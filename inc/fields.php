<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


if ( ! function_exists( 'cmb2_attached_posts_fields_render' ) ) {
	require_once  'CMB2/cmb2-attached-posts-field.php';
}


/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}


add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );
}



add_action( 'cmb2_init', 'cursos_fields' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function cursos_fields() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cursos_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_cursos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Más información del Curso', 'cmb2' ),
		'object_types'  => array( 'cursos', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_cursos->add_field( array(
		'name'       => __( 'Precio Regular', 'cmb2' ),
		'desc'       => __( 'Precio Regular del Curso', 'cmb2' ),
		'id'         => $prefix . 'precio_regular',
		'type'       => 'text',
	) );
	$cmb_cursos->add_field( array(
		'name'       => __( 'Precio Web', 'cmb2' ),
		'desc'       => __( 'Precio Web tomando el cupón', 'cmb2' ),
		'id'         => $prefix . 'precio_web',
		'type'       => 'text',
	) );
	$cmb_cursos->add_field( array(
		'name'       => __( 'Inscribirme al Curso Link', 'cmb2' ),
		'desc'       => __( 'Enlace para el curso', 'cmb2' ),
		'id'         => $prefix . 'enlace_curso',
		'type'       => 'text',
	) );
	$cmb_cursos->add_field( array(
		'name'       => __( 'Video Introducción', 'cmb2' ),
		'desc'       => __( 'Enlace para el curso', 'cmb2' ),
		'id'         => $prefix . 'video_curso',
		'type'       => 'oembed',
	) );

	$cmb_cursos->add_field( array(
		'name' => __( 'Información del Curso', 'cmb2' ),
		'desc' => __( 'Información del Curso', 'cmb2' ),
		'id'   => $prefix . 'title',
		'type' => 'title',
	) );

	$cmb_cursos->add_field( array(
		'name'             => __( 'Nivel', 'cmb2' ),
		'desc'             => __( 'Nivel del Curso', 'cmb2' ),
		'id'               => $prefix . 'nivel_curso',
		'type'             => 'radio_inline',
		'options'          => array(
			'basico' 	   => __( 'Básico', 'cmb2' ),
			'intermedio'   => __( 'Intermedio', 'cmb2' ),
			'avanzado'     => __( 'Avanzado', 'cmb2' ),
		),
	) );
	$cmb_cursos->add_field( array(
		'name'       => __( 'Duración del Curso en Horas', 'cmb2' ),
		'desc'       => __( 'Ejemplo: 2.5 horas', 'cmb2' ),
		'id'         => $prefix . 'duracion_curso',
		'type'       => 'text',
	) );
	$cmb_cursos->add_field( array(
		'name'       => __( 'Cantidad de videos', 'cmb2' ),
		'desc'       => __( 'Ejemplo: 130', 'cmb2' ),
		'id'         => $prefix . 'cantidad_videos',
		'type'       => 'text',
	) );
    $cmb_cursos->add_field( array(
        'name'       => __( '¿Qué Aprenderás en este Curso?', 'cmb2' ),
        'desc'       => __( 'Listado de Temas', 'cmb2' ),
        'id'         => $prefix . 'listado_aprenderas',
        'type'       => 'text',
        'repeatable' => true,
    ) );
}


add_action( 'cmb2_init', 'blog_fields' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function blog_fields() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_blog_fields';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$blog_fields = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Campos para el Blog', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
	  ) );

	$blog_fields->add_field( array(
		'name' => __( 'Subtitulo', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . '_subtitulo',
		'type' => 'text',
	) );
	function cmb2_attached_posts_field_metaboxes_example() {

		$example_meta = new_cmb2_box( array(
			'id'           => 'cmb2_attached_posts_field',
			'title'        => __( 'Attached Posts', 'cmb2' ),
			'object_types' => array( 'page' ), // Post type
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => false, // Show field names on the left
		) );

		$example_meta->add_field( array(
			'name'    => __( 'Attached Posts', 'cmb2' ),
			'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
			'id'      => 'attached_cmb2_attached_posts',
			'type'    => 'custom_attached_posts',
			'options' => array(
				'show_thumbnails' => true, // Show thumbnails on the left
				'filter_boxes'    => true, // Show a text box for filtering the results
				'query_args'      => array( 'posts_per_page' => 10 ), // override the get_posts args
			)
		) );

	}
	add_action( 'cmb2_init', 'cmb2_attached_posts_field_metaboxes_example' );
}

function post_relacionados_blog() {

	$example_meta = new_cmb2_box( array(
		'id'           => 'cmb2_attached_posts_field',
		'title'        => __( 'Cursos Relacionados', 'cmb2' ),
		'object_types' => array( 'post' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false, // Show field names on the left
	) );

	$example_meta->add_field( array(
		'name'    => __( 'Post Relacionados', 'cmb2' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => 'attached_cmb2_attached_posts',
		'type'    => 'custom_attached_posts',
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array( 'posts_per_page' => 10 ), // override the get_posts args
		)
	) );

}
add_action( 'cmb2_init', 'post_relacionados_blog' );





add_action( 'cmb2_init', 'descripcionesFields' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function descripcionesFields() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_descripciones';
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$descripcionesPaginas = new_cmb2_box( array(
		'id'           => $prefix . '_descripciones',
		'title'        => __( 'Descripción Fields', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 53,57,55, ) ), // Specific post IDs to display this metabox
	) );
	$descripcionesPaginas->add_field( array(
		'name' => __( 'First Title', 'cmb2' ),
		'desc' => __( 'First Title for the Page', 'cmb2' ),
		'id'   =>  $prefix . '_first_title',
		'type' => 'text',
	) );
	$descripcionesPaginas->add_field( array(
		'name' => __( 'Second Title', 'cmb2' ),
		'desc' => __( 'Second Title for the Page', 'cmb2' ),
		'id'   =>  $prefix . '_second_title',
		'type' => 'text',
	) );
	$descripcionesPaginas->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		'desc' => __( 'Description below the Second Title', 'cmb2' ),
		'id'   =>  $prefix . '_description',
		'type' => 'textarea_code',
	) );

}
