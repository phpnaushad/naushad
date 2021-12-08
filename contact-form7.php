/*Contact form 7 Particular form page redirect on thank you page*/
add_action( 'wp_footer', 'redirect_cf7' ); 
function redirect_cf7() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
   if ( '1189' == event.detail.contactFormId ) { // Sends sumissions on form 947 to the first thank you page
    location = 'https://www.domainname.com/thank-you/';
    //} else if ( '1070' == event.detail.contactFormId ) { // Sends submissions on form 1070 to the second thank you page
    //    location = 'https://www.domainname.com/sample-page/';
    } else { // Sends submissions on all unaccounted for forms to the third thank you page
        location = 'https://www.domainname.com/thank-you/';
    }
}, false );
</script>
<?php
}

//Save contact form 7 data in another db
add_action('wpcf7_before_send_mail', 'save_form' );
function save_form( $wpcf7 ) {
   global $wpdb;
 
   /*
    Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
    and now we use an API to get the posted data.
   */
 
   $submission = WPCF7_Submission::get_instance();
 
   if ( $submission ) { 
       $submited = array();
       $submited['site_name'] = 'websitename';
       $submited['title'] = $wpcf7->title();
       $submited['posted_data'] = $submission->get_posted_data(); 
    }
 
    $data = array(
   		'name'  => $submited['posted_data']['your-name'],
   		'email' => $submited['posted_data']['your-email'],
		'phone' => $submited['posted_data']['your-telephone'],
		'subject' => $submited['posted_data']['your-subject']
   	     );
 
     $mydb = new wpdb('db_username','db_password','db_name','database_ip');   //live server db details 
	  $mydb->insert('table_name',	
		    array( 
		       'site_name'  => $submited['site_name'],
               'form'  => $submited['title'], 
			   'data' => serialize( $data ),
			   'date' => date('Y-m-d H:i:s')
			)
		);
}
