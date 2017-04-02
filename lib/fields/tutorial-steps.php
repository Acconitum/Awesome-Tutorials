<?php
function at_add_tutorial_step_fields() {

  add_meta_box(
    'at_tutorial-step_meta',
    __( 'Steps', 'awesome-tutorials' ),
    'at_step_callback',
    'at_tutorial',
    'normal'
  );

}
add_action( 'add_meta_boxes', 'at_add_tutorial_step_fields' );

function at_step_callback( $post ) {

  wp_nonce_field( basename( __FILE__ ), 'at_step_nonce' );
  $at_stored_data = get_post_meta( $post->ID );


  //TODO Getting all steps from actual tutorial and display them
  //TODO Insert and create new Button for adding steps
  ?>

  <div class="at-meta-row">
    <div class="at-meta-field">
      <div class="at-meta-label">
        <label for="at-step-desc"><?php _e( 'Description', 'awesome-tutorials' );?></label>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" name="at_step_desc" id="at-step-desc" value=""><?php echo ( ! empty( $at_stored_data['at_step_desc'][0] ) ? $at_stored_data['at_step_desc'][0] : '' );?></textarea>
      </div>
    </div>
  </div>

<?php
}
