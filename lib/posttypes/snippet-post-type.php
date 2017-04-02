<?php
function at_snippet_post_type() {

	$singular = __( 'Snippet', 'awesome-tutorials' );
	$plural = __( 'Snippets', 'awesome-tutorials' );

	$labels = array(
		'name'                => _x( $plural, 'post type general name'),
		'singular_name'       => _x( $singular, 'post type singular name' ),
		'menu_name'           => __( $plural, 'awesome-tutorials' ),
		'name_admin_bar'      => __( $plural, 'awesome-tutorials' ),
		'all_items'           => __( 'All ' . $plural, 'awesome-tutorials' ),
		'add_new_item'        => __( 'New ' . $singular, 'awesome-tutorials' ),
		'add_new'             => __( 'Add new ' . $singular, 'awesome-tutorials' ),
		'new_item'            => __( 'New ' . $singular, 'awesome-tutorials' ),
		'edit_item'           => __( 'Edit ' . $singular, 'awesome-tutorials' ),
		'update_item'         => __( 'update ' . $singular, 'awesome-tutorials' ),
		'view_item'           => __( 'watch ' . $singular, 'awesome-tutorials' ),
		'search_items'        => __( 'search ' . $plural, 'awesome-tutorials' ),
		'not_found'           => __( 'No ' . $plural . ' found', 'awesome-tutorials' ),
		'not_found_in_trash'  => __( 'No ' . $plural .  ' found in trash', 'awesome-tutorials' ),
	);

	$args = array(
		'label'               => __( $plural, 'awesome-tutorials' ),
		'description'         => __( $plural, 'awesome-tutorials' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 31,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'map_meta_cap'        => true,
		'capability_type'     => 'at_snippet',
		'menu_icon'					  => 'dashicons-editor-code',
		'rewrite'							=> array(
			'slug'	=> 'step'
		)
	);

	register_post_type( 'at_snippet', $args );

}
add_action( 'init', 'at_snippet_post_type', 0 );
?>
