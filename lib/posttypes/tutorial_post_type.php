<?php
function tutorial_post_types() {

	$labels = array(
		'name'                => _x( 'Tutorials', 'post type general name'),
		'singular_name'       => _x( 'Tutorial', 'post type singular name' ),
		'menu_name'           => __( 'Tutorials', 'awesome-tutorials' ),
		'name_admin_bar'      => __( 'Tutorials', 'awesome-tutorials' ),
		'parent_item_colon'   => '',
		'all_items'           => __( 'Alle Tutorials', 'awesome-tutorials' ),
		'add_new_item'        => __( 'Neues Tutorial', 'awesome-tutorials' ),
		'add_new'             => __( 'Neues Tutorial hinzufügen', 'awesome-tutorials' ),
		'new_item'            => __( 'Neues Tutorial', 'awesome-tutorials' ),
		'edit_item'           => __( 'Tutorial bearbeiten', 'awesome-tutorials' ),
		'update_item'         => __( 'Tutorial aktualisieren', 'awesome-tutorials' ),
		'view_item'           => __( 'Tutorial ansehen', 'awesome-tutorials' ),
		'search_items'        => __( 'Tutorials durchsuchen', 'awesome-tutorials' ),
		'not_found'           => __( 'Keine Tutorials gefunden', 'awesome-tutorials' ),
		'not_found_in_trash'  => __( 'Keine Tutorials im Papierkorb gefunden', 'awesome-tutorials' ),
	);

	$args = array(
		'label'               => __( 'Tutorials', 'awesome-tutorials' ),
		'description'         => __( 'Tutorials', 'awesome-tutorials' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 30,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'map_meta_cap'        => false,
		'capability_type'     => 'tutorials',
		'menu_icon'			  => 'dashicons-welcome-learn-more'
	);

	register_post_type( 'tutorials', $args );

}
add_action( 'init', 'tutorial_post_types', 0 );

function add_error_messages() {

  $args = array(
    'post_type' => 'tutorials',
    'posts_per_page' => -1,
    'order' => 'ASC'
  );

  $tutorials = get_posts($args);
  if ( empty($tutorials) ) {
    echo '
    <div class="notice notice-warning">
    <p><strong>Warning:</strong> Es wurden noch keine Tutorials erfasst.</p>
    </div>';
  }
}
add_action( 'admin_notices', 'add_error_messages' );
?>
