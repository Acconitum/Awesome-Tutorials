<?php
function at_add_tutorial_fields() {

  add_meta_box(
    'at_tutorial_meta',
    __( 'Informations', 'awesome-tutorials' ),
    'at_informations_callback',
    'at_tutorial',
    'normal'
  );

}
add_action( 'add_meta_boxes', 'at_add_tutorial_fields' );

function at_informations_callback( $post ) {

  wp_nonce_field( basename( __FILE__ ), 'at_tutorial_nonce' );
  $at_stored_data = get_post_meta( $post->ID );
  ?>

  <div class="at-meta-row">
    <div class="at-meta-field">
      <div class="at-meta-label">
        <label for="at-step-desc"><?php _e( 'Description', 'awesome-tutorials' );?></label>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" name="at_tutorial_desc" id="at-tutorial-desc" value=""><?php echo ( ! empty( $at_stored_data['at_tutorial_desc'][0] ) ? $at_stored_data['at_tutorial_desc'][0] : '' );?></textarea>
      </div>

      <div class="at-meta-label">
        <label for="at-step-depends"><?php _e( 'Depends on', 'awesome-tutorials' );?></label>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" name="at_tutorial_depends" id="at-tutorial-depends" value=""><?php echo ( ! empty( $at_stored_data['at_tutorial_depends'][0] ) ? $at_stored_data['at_tutorial_depends'][0] : '' );?></textarea>
      </div>

      <div class="at-meta-label">
        <label for="at-tutorial-related"><?php _e( 'Related', 'awesome-tutorials' );?></label>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" name="at_tutorial_related" id="at-tutorial-related" value=""><?php echo ( ! empty( $at_stored_data['at_step_related'][0] ) ? $at_stored_data['at_step_related'][0] : '' );?></textarea>
      </div>

    </div>
  </div>

<?php
}

function at_save_step( $post_id ) {

  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nounce = ( isset( $_POST['at_tutorial_nonce'] ) && wp_verify_nonce( $_POST['at_tutorial_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || ! $is_valid_nounce ) {
    return;
  }

  if ( isset( $_POST['at_tutorial_desc'] ) ) {
    update_post_meta( $post_id, 'at_tutorial_desc', sanitize_text_field( $_POST['at_tutorial_desc'] ) );
  }
}
add_action( 'save_post', 'at_save_step' );

?>
