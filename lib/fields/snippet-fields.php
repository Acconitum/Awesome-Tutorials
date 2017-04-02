<?php
function at_add_snippet_fields() {

  add_meta_box(
    'at_snippet_meta',
    __( 'Content', 'awesome-tutorials' ),
    'at_snippet_callback',
    'at_snippet',
    'normal'
  );

}
add_action( 'add_meta_boxes', 'at_add_snippet_fields' );


function at_snippet_callback( $post ) {

  wp_nonce_field( basename( __FILE__ ), 'at_snippet_nonce' );
  $at_stored_data = get_post_meta( $post->ID );

  ?>
  <div class="at-meta-row">
    <div class="at-meta-field">
      <div class="at-meta-label">
        <label for="at-snippet-desc"><?php _e( 'Description', 'awesome-tutorials' );?></label>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" data-autoresize name="at_snippet_desc" id="at-snippet-desc" value=""><?php echo ( ! empty( $at_stored_data['at_snippet_desc'][0] ) ? $at_stored_data['at_snippet_desc'][0] : '' );?></textarea>
      </div>

      <div class="at-meta-label">
        <label for="at-snippet-code"><?php _e( 'Code', 'awesome-tutorials' );?></label>
        <span class="js-expand at-btn-expand"><?php _e( 'Expand', 'awesome-tutorials' );?></span>
      </div>
      <div class="at-meta-input">
        <textarea class="at-meta-input-textarea" data-autoresize name="at_snippet_code" id="at-snippet-code" value=""><?php echo ( ! empty( $at_stored_data['at_snippet_code'][0] ) ? $at_stored_data['at_snippet_code'][0] : '' );?></textarea>
      </div>

    </div>
  </div>
<?php
}

function at_save_snippet( $post_id ) {

  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nounce = ( isset( $_POST['at_snippet_nonce'] ) && wp_verify_nonce( $_POST['at_snippet_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || ! $is_valid_nounce ) {
    return;
  }

  if ( isset( $_POST['at_snippet_desc'] ) ) {
    update_post_meta( $post_id, 'at_snippet_desc', sanitize_text_field( $_POST['at_snippet_desc'] ) );
  }
  if ( isset( $_POST['at_snippet_code'] ) ) {
    update_post_meta( $post_id, 'at_snippet_code', $_POST['at_snippet_code'] );
  }
}
add_action( 'save_post', 'at_save_snippet' );
