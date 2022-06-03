<?php 

function contact02_mail_form() {
	global $modal_message;
	$modal_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cf02_EmailAddress'])) {

						//user posted variables
						   $firstname = isset($_POST['cf02_firstName']) ? $_POST['cf02_firstName'] : "N/A" ;
						   $lastname = isset($_POST['cf02_LastName']) ? $_POST['cf02_LastName'] : "N/A" ;
						   $email = isset($_POST['cf02_EmailAddress']) ? $_POST['cf02_EmailAddress'] : "N/A" ;
						   $phone_field = isset($_POST['cf02_PhoneNumber']) ? $_POST['cf02_PhoneNumber'] : "N/A" ;
						   $select_field_location = isset($_POST['cf02_location']) ? $_POST['cf02_location'] : "N/A";
						   $select_field_department = isset($_POST['cf02_departmen']) ? $_POST['cf02_departmen'] : "N/A";
						   $note =  isset($_POST['cf02_message']) ? $_POST['cf02_message'] : "N/A" ;
						   
						   
						   $message ="";
						   $message = "<p>".get_option( 'emcf_options')['custom_reply_text']."</p>";
						   $message .= "<p>Name:" . $firstname ." " . $lastname ."</p>";
						   $message .= "<p>email: $email</p>";
						   $message .= "<p>Phone: $phone_field</p>";
						   $message .= "<p>Location: $select_field_location</p>";
						   $message .= "<p>Department: $select_field_department</p>";
						   $message .= "<p>Message: $note</p>";
						  
						 
						  
						 //php mailer variables
						//$to = get_option('admin_email');
						  $to =  isset($_POST['cf02_sendTo']) ? $_POST['cf02_sendTo'] :  get_option('admin_email') ;
						  $subject = get_option( 'emcf_options')['custom_mail_subject'];
						  $headers[] = 'Content-Type: text/html; charset=UTF-8';
						  $headers[] = 'From: ' .get_option( 'emcf_options')['custom_from']. "\r\n";
						  $headers[] = 'Reply-To: ' .get_option( 'emcf_options')['custom_reply_to'] ? get_option( 'emcf_options')['custom_reply_to'] : $email. "\r\n";
						  

					
 if(!empty($_FILES['f_img'] ?? null)) {
	$target_dir = plugin_dir_path(__FILE__) .'/upload/';
	//$target_file = $target_dir . basename($_FILES["f_img"]["name"]);
	$fileCount = count($_FILES["f_img"]["name"]);
   for ($i = 0; $i < $fileCount; $i++) {
	   $uploadfile = $target_dir . basename($_FILES["f_img"]["name"][$i]);
	   if (!move_uploaded_file($_FILES["f_img"]['tmp_name'][$i], $uploadfile)) {
		   //If there is a potential file attack, stop processing files.
		   break;
	   }
	   $attachments[$i] = $uploadfile;
	   $names[$i] = $_FILES["f_img"]["name"][$i];
	$uploadOk = 1;
	
   if ($i == ($fileCount - 1)){
	   if ($email !=="N/A"){
	   $sent = wp_mail($to, $subject, $message, $headers, $attachments);
	   } else {
		   $modal_message = get_option( 'emcf_options')['custom_required'];
		 }
		 if($sent) {
			 $modal_message = get_option( 'emcf_options')['custom_successful'];
			 foreach ($attachments as $value) {
				 unlink($value);
			 }
			   } else {
				   $modal_message = get_option( 'emcf_options')['custom_failed'];
					foreach ($attachments as $value) {
				 unlink($value);
			 }
				   }
		   
   }
	}
   
   
   }

   if (!isset($uploadOk)) {
	   if ($email !=="N/A"){
	$sent = wp_mail($to, $subject, $message, $headers, '');
	   } else {
		   $modal_message= get_option( 'emcf_options')['custom_required'];
		 }
		 if($sent) {
			 $modal_message = get_option( 'emcf_options')['custom_successful'];
			
			   } else {
				   $modal_message = get_option( 'emcf_options')['custom_failed'];
				
				   }
   } 
						        
						}
				
					}

					
					 


//This is recpatcha function. It executes contact02_mail_form() function if condition is 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset(get_option( 'emcf_options')['custom_recpatcha']) && isset($_POST['token'])) {
	define("RECAPTCHA_V3_SECRET_KEY", get_option( 'emcf_options')['custom_secret_key']);
	  
	  
	$token = $_POST['token'];
	//$action = $_POST['action'];
	$target_dir = plugin_dir_path(__FILE__) .'upload/';
	  
	// call curl to POST request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	$arrResponse = json_decode($response, true);
	  //var_dump($response);
	//  var_dump($token);
	// verify the response
	if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
		contact02_mail_form();
	} else {
		
		$modal_message_contact[] = "Failed to send email. Please try again later";
	}
	} else {contact02_mail_form();}

	//This is message if mail was sent or not
	function message02() {
		global $modal_message;
	if(!empty($modal_message)){ ?>
		<div id="mediaotg_myModal" class="mediaotg_modal">

		<!-- Modal content -->
		
		<div class="mediaotg_modal-content" style="color:grey; margin-top: 5px;">
			<?php echo esc_attr($modal_message);?>
		</div>

		</div>
		<?php }
}