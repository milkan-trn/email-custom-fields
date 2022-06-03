<?php // Email Form - register settings
if ( ! defined( 'ABSPATH' ) ) {exit;}



function Emcf_register_settings() {

    register_setting( 
		'emcf_options', 
		'emcf_options',
        'Emcf_callback_validate_options'
	);
    
 // register plugin section title and subtitle
    add_settings_section( 
		'Emcf_section_contact01', 
		esc_html__('Contact Form', 'Emcf'), 
		'Emcf_callback_section_login', 
		'Emcf'
	);
	
	add_settings_section( 
		'Emcf_section_newsletter', 
		esc_html__('Newsletter', 'Emcf'), 
		'Emcf_callback_section_admin', 
		'Emcf'
	);
    add_settings_section( 
		'Emcf_recpatcha_section', 
		esc_html__('reCAPTCHA Settings', 'Emcf'), 
		'Emcf_callback_recaptcha_section', 
		'Emcf'
	);
//registers section input boxes
add_settings_field(
    'custom_reply_text',
    esc_html__('Reply title', 'Emcf'),
    'Emcf_callback_reply_text',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_reply_text', 'label' => esc_attr__('Type text you want to see in reply email', 'Emcf') ]
);

add_settings_field(
    'custom_mail_subject',
    esc_html__('Enter mail subject', 'Emcf'),
    'Emcf_callback_mail_subject',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_mail_subject', 'label' => esc_attr__('Type text you want to see in subject', 'Emcf') ]
);
add_settings_field(
    'custom_send_to',
    esc_html__('Send to mail', 'Emcf'),
    'Emcf_callback_send_to',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_send_to', 'label' => esc_attr__('If you leave it empty it will send mail to admin mail', 'Emcf') ]
);
add_settings_field(
    'custom_from',
    esc_html__('From mail', 'Emcf'),
    'Emcf_callback_from_mail',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_from', 'label' => esc_attr__('Type from mail', 'Emcf') ]
);
add_settings_field(
    'custom_reply_to',
    esc_html__('Reply to mail', 'Emcf'),
    'Emcf_callback_reply_to',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_reply_to', 'label' => esc_attr__('Type reply to. If empty customer email will be used', 'Emcf') ]
);
add_settings_field(
    'custom_required',
    esc_html__('Required fields', 'Emcf'),
    'Emcf_callback_field_text',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_required', 'label' => esc_attr__('Type message if required fields are missing', 'Emcf') ]
);
add_settings_field(
    'custom_successful',
    esc_html__('Mail successful', 'Emcf'),
    'Emcf_section_mail_successful',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_successful', 'label' => esc_attr__('Message if mail is successful', 'Emcf') ]
);
add_settings_field(
    'custom_failed',
    esc_html__('Mail failed', 'Emcf'),
    'Emcf_section_mail_failed',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_failed', 'label' => esc_attr__('Message if mail is failed', 'Emcf') ]
);

add_settings_field(
    'custom_button',
    esc_html__('Edit locations and departments', 'Emcf'),
    'Emcf_section_location_button',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_button', 'label' => esc_attr__('Edit locations here', 'Emcf') ]
);
add_settings_field(
    'custom_recpatcha',
    esc_html__('Use recpatcha', 'Emcf'),
    'Emcf_section_use_recpatcha',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_recpatcha', 'label' => esc_attr__('Check this to use recapatcha', 'Emcf') ]
);


//Newsletter Input
add_settings_field(
    'custom_newsletter',
    esc_html__('Enter response', 'Emcf'),
    'Emcf_section_newsletter_response',
    'Emcf', 
    'Emcf_section_newsletter', 
    [ 'id' => 'custom_newsletter', 'label' => esc_attr__('Add response if mail was sent', 'Emcf') ]
);
//reCAPTCHA input boxes
add_settings_field(
    'custom_site_key',
    esc_html__('Site Key', 'Emcf'),
    'Emcf_section_site_key',
    'Emcf', 
    'Emcf_recpatcha_section', 
    [ 'id' => 'custom_site_key', 'label' => esc_attr__('Enter Site Key', 'Emcf') ]
);
add_settings_field(
    'custom_secret_key',
    esc_html__('Secret Key', 'Emcf'),
    'Emcf_section_secret_key',
    'Emcf', 
    'Emcf_recpatcha_section', 
    [ 'id' => 'custom_secret_key', 'label' => esc_attr__('Enter Secret Key', 'Emcf') ]
);
add_settings_field(
    'custom_style',
    esc_html__('Custom Style', 'Emcf'),
    'Emcf_callback_field_radio',
    'Emcf', 
    'Emcf_section_contact01', 
    [ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the contact01 form screen', 'Emcf') ]
);
}
add_action( 'admin_init', 'Emcf_register_settings');
