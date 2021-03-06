<?php
/*
*Template Name: Frotend Add Posts
*
*/
get_header();?>
<?php
 
$postTitleError = '';
 
if ( isset( $_POST['submitted'] ) ) {
 
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }
 
}



if ( isset( $_POST['postContent'] ) ) { 
	if ( function_exists( 'stripslashes' ) ) { 
	echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } 
}



if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
<?php } 


if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
 
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }
 
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
        'post_content' => $_POST['postContent'],
        'post_type' => 'post',
        'post_status' => 'pending'
    );
     
 
}
$post_id = wp_insert_post( $post_information );

if ( $post_id ) {
    wp_redirect( home_url() );
    exit;
}?>


<form action="" id="primaryPostForm" method="POST">
 
    <fieldset>
        <label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>
 
        <input type="text" name="postTitle" id="postTitle" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" class="required" />
    </fieldset>
 
    <fieldset>
        <label for="postContent"><?php _e('Post Content:', 'framework') ?></label>
 
        <textarea name="postContent" id="postContent" rows="8" cols="30" class="required"></textarea>
    </fieldset>
 
    <fieldset>
        <input type="hidden" name="submitted" id="submitted" value="true" />
		<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        <button type="submit"><?php _e('Add Post', 'framework') ?></button>
    </fieldset>
 
</form>
<?php get_footer();
