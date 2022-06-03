<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {exit;}
class Emcf_contact_template2 {
     public static function emcf_contact_tem2 () { 
       //This will check if newsletter.js is enqued and register it
	   $handle = 'contactForm02.js';
		$list = 'enqueued';
		$emsf_style_script = (get_option( 'emcf_options')['custom_style'] == 'enable') ? true : false;
		if (!wp_script_is( $handle, $list ) && $emsf_style_script) {
			wp_register_script('contactForm02',plugins_url('/email-custom-fields/public/js/contactForm02.js'));
			wp_enqueue_script( 'contactForm02' );
		}
		wp_register_script('contact_main',plugins_url('/email-custom-fields/templates/contactForm02/js/contact02.js'));
		wp_enqueue_script( 'contact_main' );
		wp_register_script('contactJquery_main',plugins_url('/email-custom-fields/templates/contactForm02/js/jqueryScripts.js'));
		wp_enqueue_script( 'contactJquery_main' );

		$emcf_contact01_style = 'contact02.css';
		if (!wp_style_is( $emcf_contact01_style, $list ) && $emsf_style_script)  {
			wp_register_style('contact02', plugins_url('/email-custom-fields/templates/contactForm02/contact02.css'));
			wp_enqueue_style( 'contact02' );
		}

		//This is php form part. It process mail data. 
       require_once 'contact_form.php';
	   //This is HTML form part
	   require_once 'contactHTML.php';
         ?>
<!-- End php -->

         <?php }
    
}
add_shortcode( 'contact02', [ 'Emcf_contact_template2', 'emcf_contact_tem2' ] );
