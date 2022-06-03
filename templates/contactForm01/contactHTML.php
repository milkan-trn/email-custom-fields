
    <script>
        
        function checkEmpty(token) {
                     var i=0;
                      var count=[];
                      var requ = document.querySelectorAll('#contact-form input[required]');
              for (i = 0; i <= requ.length; i++) {
              if(requ[i].value == ''){ 
                  count.push(1);
                  requ[i].placeholder = requ[i].placeholder + " is required";
              requ[i].style.border = "1px solid red";
                }
                //console.log(i === requ.length-1 && count.length === 0 );
                //console.log(count.length);
                //console.log(token);
              if(i === requ.length-1 && count.length === 0 ){
                       //alert('Loop ended!');
                         document.getElementById("myinput").value = token;
                       document.getElementById("contact-form").submit();
              }
              }
              
             
               }
            var onSubmit = function(token) {
                checkEmpty(token);
              
            };
    
            var onloadCallback = function() {
              grecaptcha.render('btsubmit', {
                'sitekey' : '<?php echo get_option( 'emcf_options')['custom_site_key'];?>',
                'callback' : onSubmit
              });
            };
        </script>

<form id="contact-form" class="custom-form" action="<?php the_permalink();?>" method="post" enctype="multipart/form-data">
		        			<div class="c-50"><input  requeire type="text" placeholder="Full Name" name="f_name" required></div>
		        			<div class="c-50"><input  type="text" placeholder="Email Address" name="email_field01" required></div>
		        			<div class="c-50"><input  requeire type="text" placeholder="Phone Number" name="phone_field" required></div>
		                    <div class="c-50">
		                    <select name="select_field" id="">
			                      <option value="Select subject">Select subject</option>
			                      <option value="General">General</option>
			                      <option value="Event catering">Wholesale</option>
			                      <option value="Banquets">Feedback</option>
			                    </select>
		                    </div>
		                    
		                    
		                    <div class="c-100">
		                    	<textarea placeholder="Message" name="note"></textarea>
		                    </div>


		                    <!-- Image file -->

		                    <div class="flex-btn">		                 
		                    	<div class="img-field">
								    <span class="btn_upload">
								      <input type="file" id="imag" name="f_img[]" class="input-img" accept="image/*" />
								      <i class="dashicons dashicons-format-image"></i> Choose Image
								      </span>
								    <div class="file-img">
								    	<img id="ImgPreview" src="" class="preview1" />
								    	<input type="button" id="removeImage1" value="x" class="btn-rmv1" />
								    </div>
								</div>
							   <button id="<?php echo isset(get_option( 'emcf_options')['custom_recpatcha']) ? 'btsubmit': 'submit'; ?>" type="<?php echo isset(get_option( 'emcf_options')['custom_recpatcha']) ? 'btsubmit': 'submit'; ?>" value="Submit"  class="c-btn">Submit Message</button>
                                                                          <input type="hidden" name="token" id="myinput" value="" />
																		  
		                    </div>
	                 
	                  </form>
					  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    					</script>
					  <div class="nlMessage01" style="color:red; margin-top: 5px;"></div>
					  <!-- Modal content -->
					  <?php  global $modal_message; echo message();?>