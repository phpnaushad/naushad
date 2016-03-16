<?php
function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}


// Register the Metabox
function wpshed_add_custom_meta_box() {
	add_meta_box( 'wpshed-meta-box', __( 'Metabox Example', 'textdomain' ), 'wpshed_meta_box_output', 'magzine', 'normal', 'high' );
	//add_meta_box( 'wpshed-meta-box', __( 'Metabox Example', 'textdomain' ), 'wpshed_meta_box_output', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box' );

// Output the Metabox
function wpshed_meta_box_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="wpshed_textfield">Author:</label>
		<input type="text" name="author-name" id="author-name" value="<?php echo wpshed_get_custom_field( 'author-name' ); ?>" size="50" />
    </p>
	<p>
		<label for="wpshed_textfield">Publish Year:</label>
		<input type="text" name="publish-year" id="publish-year" value="<?php echo wpshed_get_custom_field( 'publish-year' ); ?>" size="50" />
    </p>
	
	<?php }
	
// Save the Metabox values
function wpshed_meta_box_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
	if( isset( $_POST['author-name'] ) )
		update_post_meta( $post_id, 'author-name', esc_attr( $_POST['author-name'] ) );
		
		 // Save the textfield
	if( isset( $_POST['publish-year'] ) )
		update_post_meta( $post_id, 'publish-year', esc_attr( $_POST['publish-year'] ) );

   

}
add_action( 'save_post', 'wpshed_meta_box_save' );

________________________________________________________________________________________________

function my_custom_post_youtube() {
	$labels = array(
		'name'               => _x( 'Youtube Video', 'post type general name' ),
		'singular_name'      => _x( 'Youtube Video', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Youtube Video' ),
		'add_new_item'       => __( 'Add New Youtube video' ),
		'edit_item'          => __( 'Edit Youtube Video' ),
		'new_item'           => __( 'New Youtube Video' ),
		'all_items'          => __( 'All Youtube Video' ),
		'view_item'          => __( 'View Youtube Video' ),
		'search_items'       => __( 'Search Youtube Video' ),
		'not_found'          => __( 'No Youtube Video found' ),
		'not_found_in_trash' => __( 'No Youtube Video found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Youtube'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Youtube and Youtube Video specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title' ),
		'has_archive'   => true,
	);
	register_post_type( 'youtube', $args );	
}


add_action( 'init', 'my_custom_post_youtube' );

function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}


// Register the Metabox
function wpshed_add_custom_meta_box() {
	add_meta_box( 'wpshed-meta-box', __( 'Metabox Example', 'textdomain' ), 'wpshed_meta_box_output', 'youtube', 'normal', 'high' );
	//add_meta_box( 'wpshed-meta-box', __( 'Metabox Example', 'textdomain' ), 'wpshed_meta_box_output', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box' );


// Output the Metabox
function wpshed_meta_box_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="wpshed_textfield">Title:</label>
		<input type="text" name="wpshed_title" id="wpshed_title" value="<?php echo wpshed_get_custom_field( 'wpshed_title' ); ?>" size="50" />
    </p>
	
    	<p>
		<label for="wpshed_shorta">Shortcode:</label><br />
		<input type="text" name="wpshed_short" id="wpshed_short" value="<?php echo wpshed_get_custom_field( 'wpshed_short' ); ?>" size="50" />
    </p>

    
    
	<p>
		<label for="wpshed_textarea"><?php _e( 'Textarea', 'textdomain' ); ?>:</label><br />
		<textarea name="wpshed_desp" id="wpshed_desp" cols="60" rows="4"><?php echo wpshed_get_custom_field( 'wpshed_desp' ); ?></textarea>
    </p>
    
    <p>
    <label for="wpshed_textarea">Employee:</label><br />
    <select name="wpshed_state" id="state">
      <option value="Abhishek" <?php if( wpshed_get_custom_field( 'wpshed_state' ) == 'Abhishek' ) { ?> selected="selected" <?php } ?>>Abhishek</option>
      <option value="Vikash" <?php if( wpshed_get_custom_field( 'wpshed_state' ) == 'Vikash' ) { ?> selected="selected" <?php } ?>>Vikash</option>
      <option value="Naresh" <?php if( wpshed_get_custom_field( 'wpshed_state' ) == 'Naresh' ) { ?> selected="selected"<?php } ?>>Naresh</option>
      <option value="Khursheed" <?php if( wpshed_get_custom_field( 'wpshed_state' ) == 'Khursheed' ) { ?> selected="selected"<?php } ?>>Khursheed</option>
      <option value="Jaideep" <?php if( wpshed_get_custom_field( 'wpshed_state' ) == 'Jaideep' ) { ?> selected="selected"<?php } ?>>Jaideep</option>
    </select>
    </p>
    
    
    <p>
    	<label for="wpshed_textarea">Sex:</label><br />
        <input type="radio" name="wpshed_sex" value="Male" <?php if( wpshed_get_custom_field( 'wpshed_sex' ) == 'Male' ) { ?>checked="checked"<?php } ?>>Male<br>
        <input type="radio" name="wpshed_sex" value="Female" <?php if( wpshed_get_custom_field( 'wpshed_sex' ) == 'Female' ) { ?>checked="checked"<?php } ?> />Female</p>
        
	<?php
}




// Save the Metabox values
function wpshed_meta_box_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
	if( isset( $_POST['wpshed_title'] ) )
		update_post_meta( $post_id, 'wpshed_title', esc_attr( $_POST['wpshed_title'] ) );

    // Save the textarea
	if( isset( $_POST['wpshed_desp'] ) )
		update_post_meta( $post_id, 'wpshed_desp', esc_attr( $_POST['wpshed_desp'] ) );

    // Save the short
	if( isset( $_POST['wpshed_short'] ) )
		update_post_meta( $post_id, 'wpshed_short', esc_attr( $_POST['wpshed_short'] ) );


    // Save the selectoption
	if( isset( $_POST['wpshed_state'] ) )
		update_post_meta( $post_id, 'wpshed_state', esc_attr( $_POST['wpshed_state'] ) );

    // Save the radiobutton
	if( isset( $_POST['wpshed_sex'] ) )
		update_post_meta( $post_id, 'wpshed_sex', esc_attr( $_POST['wpshed_sex'] ) );




}
add_action( 'save_post', 'wpshed_meta_box_save' );