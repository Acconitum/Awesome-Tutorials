<?php
add_action( 'save_post', 'your_meta_box_save' );

add_action( 'add_meta_boxes', 'your_meta_box_add' );

function your_meta_box_add(){
    add_meta_box( 'predefined_field', 'Your Predefined Info', 'your_meta_box_html', 'post', 'normal', 'high' );
}

function your_meta_box_save( $post_id ){

// Bail if we're doing an auto save
if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

// if our nonce isn't there, or we can't verify it, bail
if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'your_meta_box_nonce' ) ) return;

// if our current user can't edit this post, bail
if( !current_user_can( 'edit_post' ) ) return;

// now we can actually save the data
$allowed = array(
    'a' => array( // on allow a tags
        'href' => array() // and those anchords can only have href attribute
    )
);

$your_predefined_value = isset($_POST['your_predefined_field']) ? $_POST['your_predefined_field'] : '';

if( $your_predefined_value )
    update_post_meta($post_id,'your_predefined_field',$your_predefined_value);

}

function your_meta_box_html( $post ){

wp_nonce_field( 'your_meta_box_nonce', 'meta_box_nonce' );

//if you know it is not an array, use true as the third parameter
$your_predefined_value = get_custom_meta($post->ID,'your_predefined_field',true);

?>

        <input name="your_predefined_field" id="your_predefined_field" type="text"  value="<?php echo $your_predefined_value; ?>" class="mws-textinput" />
<?php
}
