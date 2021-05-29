<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/********************* Digi Store CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function digi_store_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function digi_store_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function digi_store_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}

function digi_store_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}
function digi_store_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'digi_store_theme_options');
	}
	else {
		return '';
	}
}

if(!function_exists('digi_store_sanitize_checkbox')):
    function digi_store_sanitize_checkbox( $input ) {
        return ( 1 === absint( $input ) ) ? 1 : 0;
    }
endif;
if( !function_exists( 'digi_store_text_sanitize' ) ) :
    function digi_store_text_sanitize( $value ) {
        // Initialize the new array that will hold the sanitize values
        $new_input = array();
        // Loop through the input and sanitize each of the values
        foreach ( $value as $key => $val ) {
            $new_input[ $key ] = sanitize_text_field( $val );
        }
        return $new_input;
    }
endif;