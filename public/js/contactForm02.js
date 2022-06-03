

  	// Contact form active
							jQuery(document).ready(function($){
                                $('.main_contact_form input, .main_contact_form textarea').val("");
                                $('.main_contact_form input, .main_contact_form textarea').focusout(function() {
                                    var text_val = $(this).val();
                                    if (text_val === "") {
                                    console.log("empty!");
                                    $(this).removeClass('has_value');
                                    } else {
                                    $(this).addClass('has_value');
                                    }
                                });
                            });
                            