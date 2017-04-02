<?php
function register_awesome_tutorials_taxonomies()	{
  $singular = "Tutorialcategory";
  $plural = "Tutorialcategorys";
	$labels = array(
		'name'              => _x( $singular, 'taxonomy general name', 'awesome-tutorials' ),
		'singular_name'     => _x( $singular, 'taxonomy singular name', 'awesome-tutorials' ),
		'search_items'      => __( 'Search ' . $singular, 'awesome-tutorials' ),
		'all_items'         => __( 'All ' . $plural, 'awesome-tutorials' ),
		'parent_item'       => __( 'Parent ' . $singular, 'awesome-tutorials' ),
		'parent_item_colon' => __( 'Parent Downloadcategory:', 'awesome-tutorials' ),
		'edit_item'         => __( 'Edit ' . $singular, 'awesome-tutorials' ),
		'update_item'       => __( 'Update ' . $singular, 'awesome-tutorials' ),
		'add_new_item'      => __( 'Add new ' . $singular, 'awesome-tutorials' ),
		'new_item_name'     => __( 'New ' . $singular . 'name', 'awesome-tutorials' ),
		'menu_name'         => __( $plural ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => strtolower( $plural ) ),
		'has_archive'       => true,
		'publicly_queryable' => true,
		'show_in_quick_edit' => true
	);
	register_taxonomy( strtolower( $singular ) , array( 'at_tutorial', 'at_snippet' ), $args );
}
add_action('init', 'register_awesome_tutorials_taxonomies');
?>
