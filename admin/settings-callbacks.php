<?php // Email Form - Settings Callbacks
if ( ! defined( 'ABSPATH' ) ) {exit;}

// default plugin options
function Emcf_options_default() {
	
	return array(
		'custom_reply_text'   => esc_attr__('New message from Contact Us page', 'Emcf'),
		'custom_mail_subject'   => esc_attr__('Contact Mail Form', 'Emcf'),
		'custom_send_to'   => 'developer@brainstorm.rs',
		'custom_from'   => 'noreply@brainstorm.rs',
		'custom_reply_to'   => 'developer@brainstorm.rs',
		'custom_required'     => esc_attr__('Name, Email, Phone,<br/>Are Required. Please Fill <br/> Out All Required Fields.', 'Emcf'),
		'custom_successful'   => esc_attr__('Thanks for contacting us. We will contact you shortly', 'Emcf'),
		'custom_failed'   => esc_attr__('Failed to send email. Please try again later', 'Emcf'),
		'custom_button'   => '',
		'custom_recpatcha' => false,
		//This is newsletter
		'custom_newsletter'   => esc_attr__('Thanks for signing up!', 'Emcf'),
		//This is Recaptcha section
		'custom_site_key'   => '',
		'custom_secret_key'   => '',
		'custom_style'   => 'disable',

	);
	
}
	// callback: login section
function Emcf_callback_section_login() {
	
	echo '<p>'. esc_html__('Change contact form settinges below.', 'Emcf') .'</p>';
	
}



// callback: admin section
function Emcf_callback_section_admin() {
	
	echo '<p>'. esc_html__('Change newsletter settinges below.', 'Emcf') .'</p>';
	
}
// callback: recaptcha section
function Emcf_callback_recaptcha_section() {
	
	echo '<p>'. esc_html__('Add reCAPTCHA keys below ', 'Emcf') .'</p>';
	
}

// callback: text field
function Emcf_callback_reply_text( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}

// callback: reply text field
function Emcf_callback_mail_subject( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
// callback: Send text field
function Emcf_callback_send_to( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="email" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
// callback: from text field
function Emcf_callback_from_mail( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="email" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
// callback: Reply to text field
function Emcf_callback_reply_to( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="email" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
// callback: Required text field
function Emcf_callback_field_text( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
// callback: text field
function Emcf_section_mail_successful( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}
	// callback: text field
function Emcf_section_mail_failed( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
}
	
	//Emcf_section_location_button

	function Emcf_section_location_button(){
		echo '<a href="' .get_site_url() . '/wp-admin/edit.php?post_type=locations_dep"  style="
		padding: 5px 10px 5px 10px;
		background: wheat;
		background: #2271b1;
		border-color: #2271b1;
		color: #fff;
		text-decoration: none;
		text-shadow: none;" target="_blank">Edit Location</a>';
	}
	// callback: checkbox field
function Emcf_section_use_recpatcha( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	
}

//Newsletter
	// callback: Newsletter text field
	function Emcf_section_newsletter_response( $args ) {
	
		$options = get_option( 'emcf_options', Emcf_options_default());
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
	}

//reCAPTCHA input boxes
	// callback: text field site_key
	function Emcf_section_site_key( $args ) {
	
		$options = get_option( 'emcf_options', Emcf_options_default());
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="password" size="40" value="'. $value .'"><br />';
		echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
		
	}

	// callback: text field site_key
	function Emcf_section_secret_key( $args ) {
	
		$options = get_option( 'emcf_options', Emcf_options_default());
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="emcf_options_'. $id .'" name="emcf_options['. $id .']" type="password" size="40" value="'. $value .'"><br />';
		echo '<label for="emcf_options_'. $id .'">'. $label .'</label>';
		
	}

	// callback: radio field
function Emcf_callback_field_radio( $args ) {
	
	$options = get_option( 'emcf_options', Emcf_options_default());
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = Emcf_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="emcf_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}
// radio field options
function Emcf_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'ecf'),
		'disable' => esc_html__('Disable custom styles', 'ecf')
		
	);
	
}

