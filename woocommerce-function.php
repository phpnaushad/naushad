<?php

/**
 * @snippet       Remove Ship/Bill Fields @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */ 
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' ); 
function custom_override_checkout_fields( $fields ) {
    
     unset( 
       $fields['order']['order_comments'], 
       $fields['billing']['billing_address_2'],
       $fields['billing']['billing_city'],
       $fields['billing']['select2-billing_state-container'],
       $fields['billing']['billing_company']
       //$fields['billing']['billing_email'],
       //$fields['billing']['billing_phone']
     );
 
     return $fields;
}

add_filter( 'woocommerce_billing_fields' , 'ced_remove_billing_fields' );
function ced_remove_billing_fields( $fields ) {
         unset($fields['billing_last_name']);
         return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'ced_rename_checkout_fields' );
// Change placeholder and label text
function ced_rename_checkout_fields( $fields ) {
$fields['billing']['billing_first_name']['placeholder'] = 'Name';
$fields['billing']['billing_first_name']['label'] = 'Name';
//$fields['billing']['billing_first_name']['required'] = false;
$fields['billing']['billing_email']['required'] = false;
return $fields;
}

/**
 * @snippet       Move / ReOrder Fields @ Checkout Page, WooCommerce version 3.0+
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=19571
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.5.3
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter( 'woocommerce_billing_fields', 'bbloomer_move_checkout_email_field', 10, 1 );
 
function bbloomer_move_checkout_email_field( $address_fields ) {
    /*$address_fields['billing_phone']['priority'] = 2;
	$address_fields['billing_postcode']['priority'] = 4;
	$address_fields['billing_email']['priority'] = 3;
	$address_fields['billing_email']['priority'] = 5;
	$address_fields['billing_email']['priority'] = 5;*/
    return $address_fields;
}


function sv_unrequire_wc_phone_field( $fields ) {
    $fields['billing_city']['required'] = false;
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'sv_unrequire_wc_phone_field' );

function sv_require_wc_company_field( $fields ) {
    $fields['billing_state']['required'] = true;
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'sv_require_wc_company_field' );



/*add_filter( 'woocommerce_checkout_fields' , 'ced_rename_checkout_fields' );
// Change placeholder and label text
function ced_rename_checkout_fields( $fields ) {
	$fields['billing']['billing_state']['required'] = false;
return $fields;
}*/

/**
* Change the default state and country on the checkout page
*/
 
//add_filter( 'default_checkout_billing_country', 'my_default_checkout_country' );
////add_filter( 'default_checkout_billing_state', 'my_default_checkout_state' );
 
/*function my_default_checkout_country() {
return 'United Arab Emirates'; // country code
}
 
/*function my_default_checkout_state() {
return 'Dubai'; // state code
}*/

/**
 * @snippet       Change Input Field to Textarea @ WooCommerce Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=19122
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 2.4.7
 */
 
// Change address field at checkout 
add_filter( 'woocommerce_checkout_fields' , 'bbloomer_change_address_input_type', 10, 1 );
 
function bbloomer_change_address_input_type( $fields ) {
$fields['billing']['billing_address_1']['type'] = 'textarea';
return $fields;
}


/**
 * Add new register fields for WooCommerce registration.
 */
function wooc_extra_register_fields() {
    ?>

    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>

    <?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


/**
 * Validate the extra register fields.
 *
 * @param WP_Error $validation_errors Errors.
 * @param string   $username          Current username.
 * @param string   $email             Current email.
 *
 * @return WP_Error
 */
function wooc_validate_extra_register_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }


    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
    }

    return $errors;
}

add_filter( 'woocommerce_registration_errors', 'wooc_validate_extra_register_fields', 10, 3 );


/**
 * Save the extra register fields.
 *
 * @param int $customer_id Current customer ID.
 */
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

        // WooCommerce billing first name.
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }

    if ( isset( $_POST['billing_last_name'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

        // WooCommerce billing last name.
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }

    if ( isset( $_POST['billing_phone'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

/*This code for woocommerce template override*/
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*Hide Gutenberg editor in admin*/
add_filter('use_block_editor_for_post', '__return_false');


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {  
  $cols = 9;
  return $cols;
}


/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
} 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}
/*change add to cart text*/
add_filter( 'woocommerce_product_single_add_to_cart_text', 'ld_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'ld_woo_custom_cart_button_text' ); 
function ld_woo_custom_cart_button_text() {
        return __( 'Buy Now', 'woocommerce' );
}


/*auto checked terms & condition on checkout page*/
add_filter( 'woocommerce_terms_is_checked_default', '__return_true' );
/*CCavenue auto selected on checkout page*/
add_action( 'woocommerce_before_checkout_form', 'action_before_checkout_form' );
function action_before_checkout_form(){
    // HERE define the default payment gateway ID
    $default_payment_gateway_id = 'cod';

    WC()->session->set('chosen_payment_method', $default_payment_gateway_id);
}

/*Disable WooCommerce update*/
function removewoo_updates_info( $value ) {
   unset( $value->response['woocommerce/woocommerce.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'removewoo_updates_info' );

/*Calculate no of items in cart using ajax*/
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="mini-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

/*Remove star rating from shop page*/
add_action( 'woocommerce_after_shop_loop_item_title', 'conditionally_remove_loop_rating', 4 );
function conditionally_remove_loop_rating(){
    global $product;

    if( ! ( $product->get_review_count() > 0 ) ) {
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    }
}

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail() {
        echo '<div class="custom-imagethumb">'.woocommerce_get_product_thumbnail().'</div>'; // WPCS: XSS ok.
    }
}

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );



/**
 * Check product allready added in cart on single product pages
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');

function woo_custom_cart_button_text() {
	
	foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
	
		if( get_the_ID() == $_product->id ) {
			return __('Already in cart - Add Again?', 'woocommerce');
		}
	}
	
	return __('Buy Now', 'woocommerce');
}

/**
 * Change the add to cart text on product archives
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );

function woo_archive_custom_cart_button_text() {
	
	foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
	
		if( get_the_ID() == $_product->id ) {
			return __('Already in cart', 'woocommerce');
		}
	}
	
	return __('Buy Now', 'woocommerce');
}
//Redirect cart page to checkout page
add_filter ('woocommerce_add_to_cart_redirect', function() {
  return WC()->cart->get_checkout_url();
} );

/**
 * @snippet       Add Shipping Fee for Non-Continental States
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=19954
 * @author        Rodolfo Melogli
 * @compatible    WC 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_add_cart_fee' );
 
function bbloomer_add_cart_fee() {
$noncontinental = array('Abu Dhabi');
if( in_array( WC()->customer->shipping_state, $noncontinental ) ) {
 $surcharge = 0.3333333 * WC()->cart->shipping_total; // 5% surcharge based on shipping cost
 WC()->cart->add_fee( __('Abu Dhabi Shipping', 'woocommerce'), $surcharge );
}
}

/**
* change currency symbol to AED
*/

add_filter( 'woocommerce_currency_symbol', 'wc_change_uae_currency_symbol', 10, 2 );

function wc_change_uae_currency_symbol( $currency_symbol, $currency ) {
switch ( $currency ) {
case 'AED':
$currency_symbol = '<span>AED</span>';
break;
}

return $currency_symbol;
}

//On country change ajax update checkout for shipping in Woocommerce
add_action('wp_footer', 'billing_country_update_checkout', 50);
function billing_country_update_checkout() {
    if ( ! is_checkout() ) return;
    ?>
    <script type="text/javascript">
    jQuery(function($){
        $('select#billing_country, select#shipping_country').on( 'change', function (){
            var t = { updateTimer: !1,  dirtyInput: !1,
                reset_update_checkout_timer: function() {
                    clearTimeout(t.updateTimer)
                },
                trigger_update_checkout: function() {
                    t.reset_update_checkout_timer(), t.dirtyInput = !1,
                    $(document.body).trigger("update_checkout")
                }
            };
            $(document.body).trigger('update_checkout');
            console.log('Event: update_checkout');
        });
    });
    </script>
    <?php
}
