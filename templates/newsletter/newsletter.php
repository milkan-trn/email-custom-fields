<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! defined( 'ABSPATH' ) ) {exit;}
class Emcf_newsletter_template {
     public static function emcf_newsletter_tem () {
		 //This will check if newsletter.js is enqued and register i 
		$handle = 'newsletter.js';
		$list = 'enqueued';
		if (wp_script_is( $handle, $list )) {
			return;
		} else {
			wp_register_script('newsletter_script',plugins_url('/email-custom-fields/public/js/newsletter.js'));
			wp_enqueue_script( 'newsletter_script' );
		}
       require_once 'newsletter_form.php';
         ?>
		   <div class="gf_browser_chrome gform_wrapper gform_legacy_markup_wrapper" id="gform_wrapper_1">
			   <form id="contactForm" method="post" action="" class="e2u-subscribe-form">
                        <div class="gform_body gform-body">
							<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
								<li id="field_1_1" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
									<label class="gfield_label screen-reader-text" for="input_1_1">Email Address</label>
									<div class="ginput_container ginput_container_text">
										<input class="medium" id="email_field" name="email_field" type="email" placeholder="Email Address" required=""> 
									</div>
									</li>
									<div class="nlMessage" style="color:red; margin-top: 5px;"></div> </ul></div>
       
                        </form>
                        </div>
<script>
			(function($){
				jQuery('#email_field').on('keypress',function(e) {
    if(e.which == 13) {
					var e2usubscribeemailfield = jQuery('#email_field').val();
						//jQuery(".disablingform").show();
						
						if(validateEmail(e2usubscribeemailfield) ){
					jQuery.ajax({
						'type' : 'POST',
						'data' : {
							'email_field' : e2usubscribeemailfield,
						},
						'success' : function(){
							jQuery('#email_field').val(' ');
              jQuery('.nlMessage').html('<?php echo get_option( 'emcf_options')['custom_newsletter'];?>');
							//jQuery('.subscribe-success-msg').show();
							//jQuery(".disablingform").hide();
						},
					});
				} else {
					let messageField = document.querySelector('.nlMessage');
					messageField.innerHTML = "Please enter email!"
				}
					return false;
				}
      });
			})(jQuery);
		</script>
         <?php }
    
}
add_shortcode( 'newsletter', [ 'Emcf_newsletter_template', 'emcf_newsletter_tem' ] );
