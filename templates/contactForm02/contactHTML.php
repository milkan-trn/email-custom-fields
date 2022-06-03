
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
<div class="main_contact_form">
<form id="contact-form"  action="<?php the_permalink();?>" method="post" enctype="multipart/form-data">
<div class="col-50">
                            <input name="cf02_firstName" type="text">
                            <label>First name</label>
                        </div>

                        <div class="col-50">
                            <input name="cf02_LastName" type="text">
                            <label>Last name</label>
                        </div>

                        <div class="col-100">
                            <input name="cf02_EmailAddress" type="text">
                            <label>Email address</label>
                        </div>

                        <div class="col-100">
                            <input name="cf02_PhoneNumber" type="text">
                            <label>Phone number</label>
                        </div>

                        <div class="col-50">
                            <select name="cf02_location" id="location">
                                <option hidden>Location</option>
                                 
                                   
                            </select>
                            
                        </div>

                        <div class="col-50">
                            <select name="cf02_departmen" id="departmen">
                                <option value="" id="defaultDep">Department</option>
                            
                            </select>
                            
                        </div>
                        <input name="cf02_sendTo" id="cf02_sendTo" type="text" hidden>

                        <div class="col-100 text_label">
                            <textarea name="cf02_message"></textarea>
                            <label>Message</label>
                        </div>

                        <div class="form_submit">
                        <div id="file__input">
                            <input class="file__input--file" type="file" multiple="multiple" name="files[]">
                        </div>
                           

                    
                            <button id="<?php echo isset(get_option( 'emcf_options')['custom_recpatcha']) ? 'btsubmit': 'submit'; ?>" type="<?php echo isset(get_option( 'emcf_options')['custom_recpatcha']) ? 'btsubmit': 'submit'; ?>" value="Submit"  class="form_submit_btn">Submit</button>
                                                                          <input type="hidden" name="token" id="myinput" value="" />
                        </div>
                        <?php  global $modal_message; echo message02();?>
	                  </form>
					  </div>
					  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    					</script>
					  <div class="nlMessage01" style="color:red; margin-top: 5px;"></div>
					  <!-- Modal content -->
					  

					
