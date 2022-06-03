<?php // MyPlugin - Validate Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
exit;
	
}



// callback: validate options
function Emcf_callback_validate_options( $input ) {
    
// custom_reply_text
if ( isset( $input['custom_reply_text'] ) ) {
		
    $input['custom_reply_text'] = sanitize_text_field( $input['custom_reply_text'] );
    
}

// custom_mail_subject
if ( isset( $input['custom_mail_subject'] ) ) {
		
    $input['custom_mail_subject'] = sanitize_text_field( $input['custom_mail_subject'] );
    
}

// custom_send_to
if ( isset( $input['custom_send_to'] ) ) {
		
    $input['custom_send_to'] = sanitize_email( $input['custom_send_to'] );
    
}

// custom_from
if ( isset( $input['custom_from'] ) ) {
		
    $input['custom_from'] = sanitize_email( $input['custom_from'] );
    
}

// custom_reply_to
if ( isset( $input['custom_reply_to'] ) ) {
		
    $input['custom_reply_to'] = sanitize_email( $input['custom_reply_to'] );
    
}

// custom_required
if ( isset( $input['custom_required'] ) ) {
		
    $input['custom_required'] = sanitize_text_field( $input['custom_required'] );
    
}

// custom_successful
if ( isset( $input['custom_successful'] ) ) {
		
    $input['custom_successful'] = sanitize_text_field( $input['custom_successful'] );
    
}

// custom_failed
if ( isset( $input['custom_failed'] ) ) {
		
    $input['custom_failed'] = sanitize_text_field( $input['custom_failed'] );
    
}

// custom_location
if ( isset( $input['custom_location'] ) ) {
		
    $input['custom_location'] = sanitize_text_field( $input['custom_location'] );
    
}

// custom_department
if ( isset( $input['custom_department'] ) ) {
		
    $input['custom_department'] = sanitize_text_field( $input['custom_department'] );
    
}

// custom_recpatcha
	if ( ! isset( $input['custom_recpatcha'] ) ) {
		
		$input['custom_recpatcha'] = null;
		
	}

    // custom_newsletter
if ( isset( $input['custom_newsletter'] ) ) {
		
    $input['custom_newsletter'] = sanitize_text_field( $input['custom_newsletter'] );
    
}

  // custom_site_key
  if ( isset( $input['custom_site_key'] ) ) {
		
    $input['custom_site_key'] = $input['custom_site_key'];
    
}

 // custom_secret_key
 if ( isset( $input['custom_secret_key'] ) ) {
		
    $input['custom_secret_key'] = $input['custom_secret_key'];
    
}

	// custom style
	$radio_options = Emcf_options_radio();
	
	if ( ! isset( $input['custom_style'] ) ) {
		
		$input['custom_style'] = null;
		add_settings_field(
            'custom_failed',
            esc_html__('Mail failed', 'Emcf'),
            'Emcf_section_mail_failed',
            'Emcf', 
            'Emcf_section_contact01', 
            [ 'id' => 'custom_failed', 'label' => esc_attr__('Message if mail is failed', 'Emcf') ]
        );
	}
	if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) {
		
		$input['custom_style'] = null;
		
	}



return $input;
}