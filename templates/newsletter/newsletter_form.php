<?php 

function newsletterMailForm () {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_field'])) {
//user posted variables
  
   $email =  isset($_POST['email_field']) ? $_POST['email_field'] : "N/A" ; 
   //wp-load shoud be include belove json_decode and $_get

  
//Create mail message
   $c_message = "<p>New newsletter sign up</p>";
   $c_message .= "<p>email: $email</p>";

 //php mailer variables
  //$to = get_option('admin_email');
  $to = isset(get_option( 'emcf_options')['custom_send_to']) ? get_option( 'emcf_options')['custom_send_to'] : get_option('admin_email');

  
  //$to = "milkan2002@yahoo.com";
  $subject = 'NewsLetter Form';
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $headers[] = 'From: ' .get_option( 'emcf_options')['custom_from']. "\r\n";
  $headers[] = 'Reply-To: ' .get_option( 'emcf_options')['custom_reply_to']. "\r\n";
  
  $sent ="";
if($email !== 'N/A') {$sent = wp_mail($to, $subject, $c_message, $headers, '');}
     
}
}
newsletterMailForm ();

 ?>




        




        

