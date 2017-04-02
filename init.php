<?php
//Register post-types
require_once ( plugin_dir_path(__FILE__) . 'lib/posttypes/tutorial-post-type.php' );
require_once ( plugin_dir_path(__FILE__) . 'lib/posttypes/snippet-post-type.php' );

//Register custom fields
require_once ( plugin_dir_path(__FILE__) . 'lib/fields/tutorial-fields.php' );
require_once ( plugin_dir_path(__FILE__) . 'lib/fields/tutorial-steps.php' );
require_once ( plugin_dir_path(__FILE__) . 'lib/fields/snippet-fields.php' );

require_once ( plugin_dir_path(__FILE__) . 'lib/taxonomies/tutorial-taxonomy.php' );

function at_add_styles() {
  wp_register_style( 'at-main', plugins_url( 'assets/styles/main.css', __FILE__ ) );
  wp_enqueue_style( 'at-main' );
  wp_register_script( 'at-autoexpand-js', plugins_url( 'assets/js/textarea-autoheight.js', __FILE__ ), array( 'jquery' ) );
  wp_enqueue_script( 'at-autoexpand-js' );
}
add_action('init', 'at_add_styles');
?>
