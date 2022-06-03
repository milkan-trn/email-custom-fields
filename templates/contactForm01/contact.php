<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {exit;}
class Emcf_contact_template {
     public static function emcf_contact_tem () { 
       //This will check if newsletter.js is enqued and register it
	   $handle = 'newsletter.js';
		$list = 'enqueued';
		$emsf_style_script = (get_option( 'emcf_options')['custom_style'] == 'enable') ? true : false;
		if (wp_script_is( $handle, $list ) && $emsf_style_script) {
			wp_register_script('newsletter_script',plugins_url('/email-custom-fields/public/js/newsletter.js'));
			wp_enqueue_script( 'newsletter_script' );
		}

		$emcf_contact01_style = 'contact01.css';
		if (wp_style_is( $emcf_contact01_style, $list ) && $emsf_style_script) {
			wp_register_style('contact01', plugins_url('/email-custom-fields/templates/contactForm01/contact01.css'));
			wp_enqueue_style( 'contact01' );
		}

		//This is php form part. It process mail data. 
       require_once 'contact_form.php';
	   //This is HTML form part
	   require_once 'contactHTML.php';
         ?>
<!-- End php -->

         <?php }
    
}
add_shortcode( 'contact01', [ 'Emcf_contact_template', 'emcf_contact_tem' ] );
