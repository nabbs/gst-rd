$(document).ready(function () {


       $('#add_new_company')
            .formValidation({
                fields: {
                    company_name: {
                        validators: {
                            notEmpty: {
                                message: 'Entry Company Name.'
                            }
                        }
                    },
                    company_logo_link: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Logo Link.'
                            }
                        }
                    },
			
		          /*  company_description: {
				        validators: {
					     notEmpty: {
						message: 'Username can’t be empty.'
					     },
					    remote: {
                                type: 'POST',
                                url: BASEURL + '/users/nicknamevalidity',
                                message: 'Username already exists in our database',
                                delay: 1000
                              }
				          }
			           },*/
		
					company_description: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Description.'
                            }
                        }
                    },
					company_address: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Full Address.'
                            }
                        }
                    },
					company_city: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Address.'
                            }
                        }
                    },	
					company_state: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
					company_pincode: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Location City Pincode.'
                            }
                        }
                    },
					company_email: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Contact Email.'
                            }
                        }
                    },
					company_phone: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Company Contact Number.'
                            }
                        }
                    }
                    /*email: {
                        validators: {
                            notEmpty: {
                                message: 'Email can\'t be empty'
                            } ,
                            remote: {
                                type: 'POST',
                                url: BASEURL + '/users/checkemailvalidity',
                                message: 'Email already exists in our database',
                                delay: 1000
                            } 
                        }
                    },*/
				
				
              
                   
                }
            })
 .on('success.form.fv', function (e) {
         $("#loader1").html("<img height='60px;' src='" + THEME_URL + "/assets/img/loader.gif' />");
		// Prevent form submission
		e.preventDefault();
//         $("#loader").html('');
		// Get the form instance
		var $form = $(e.target);

		// Get the FormValidation instance	
		var bv = $form.data('formValidation');

		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function (result) {
			
			
			 if (result.result == 'success') {			 
			 $("#loader1").html('<b style="color:lime;">You have sucessfully updated users profile.</b>');	
			 $("#loader1").fadeOut(5000).css("color","lime").css("font-size","16px").css("text-shadow","0px 0px 40px black");
			}else if(result.result == 'error'){
			 $("#loader1").html('<b style="color:red;">There was some error updated  users profile , please try again!.</b>');	
			 $("#loader1").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 40px black");				
			}
		}, 'json');  
	});  
 

   
    $('#add_new_job')
            .formValidation({
                fields: {
                    job_comapny_name: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
                    job_title: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
					job_position: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
			
		          /*  company_description: {
				        validators: {
					     notEmpty: {
						message: 'Username can’t be empty.'
					     },
					    remote: {
                                type: 'POST',
                                url: BASEURL + '/users/nicknamevalidity',
                                message: 'Username already exists in our database',
                                delay: 1000
                              }
				          }
			           },*/
		
					job_description: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
					job_required_skills: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
					job_required_experience: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },	
					job_required_education: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    },
					job_salary: {
                        validators: {
                            notEmpty: {
                                message: 'Salary feild can\'t be empty'
                            }
                        }
                    },
					job_type: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    }
                    /*email: {
                        validators: {
                            notEmpty: {
                                message: 'Email can\'t be empty'
                            } ,
                            remote: {
                                type: 'POST',
                                url: BASEURL + '/users/checkemailvalidity',
                                message: 'Email already exists in our database',
                                delay: 1000
                            } 
                        }
                    },*/
				
				
              
                   
                }
            })
 .on('success.form.fv', function (e) {
         $("#loader1").html("<img height='60px;' src='" + THEME_URL + "/assets/img/loader.gif' />");
		// Prevent form submission
		e.preventDefault();
//         $("#loader").html('');
		// Get the form instance
		var $form = $(e.target);

		// Get the FormValidation instance	
		var bv = $form.data('formValidation');

		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function (result) {
			
			
			 if (result.result == 'success') {			 
			 $("#loader1").html('<b style="color:lime;">You have sucessfully updated users profile.</b>');	
			 $("#loader1").fadeOut(5000).css("color","lime").css("font-size","16px").css("text-shadow","0px 0px 40px black");
			}else if(result.result == 'error'){
			 $("#loader1").html('<b style="color:red;">There was some error updated  users profile , please try again!.</b>');	
			 $("#loader1").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 40px black");				
			}
		}, 'json');  
	});  
 
   
  $('#add_new_category')
            .formValidation({
                fields: {
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'This feild can\'t be empty'
                            }
                        }
                    }
                   
                   
                }
            })
 .on('success.form.fv', function (e) {
         $("#loader1").html("<img height='60px;' src='" + THEME_URL + "/assets/img/loader.gif' />");
        // Prevent form submission
        e.preventDefault();
//         $("#loader").html('');
        // Get the form instance
        var $form = $(e.target);

        // Get the FormValidation instance  
        var bv = $form.data('formValidation');

        // Use Ajax to submit form data
        $.post($form.attr('action'), $form.serialize(), function (result) {
            
            
             if (result.result == 'success') {           
             $("#loader1").html('<b style="color:lime;">Category Added Successfull.</b>');  
             $("#loader1").fadeOut(5000).css("color","lime").css("font-size","16px").css("text-shadow","0px 0px 40px black");
             $("#category").val("");
            }else if(result.result == 'error'){
             $("#loader1").html('<b style="color:red;">There was some error updated  users profile , please try again!.</b>');  
             $("#loader1").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 40px black");                
            }
        }, 'json');  
    });  
 
   



 $('#form_update_template_edit')
            .formValidation({
                fields: {
                    template_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template name can\'t be empty</font>'
                            }
                        }
                    }, 
                    subject: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template subject can\'t be empty</font>'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template description can\'t be empty</font>'
                            }
                        }
                    }
                }
            })
    .on('success.form.fv', function (e) {
        $("#loader").html("<img height='60px;' src='" + THEME_URL + "/assets/img/loading.gif' />");
        // Prevent form submission
        e.preventDefault();
//         $("#loader").html('');
        // Get the form instance
        var $form = $(e.target);

        // Get the FormValidation instance
        var bv = $form.data('formValidation');

        // Use Ajax to submit form data
console.log(CKEDITOR);
        for ( instance in CKEDITOR.instances ) {
                 CKEDITOR.instances[instance].updateElement();
            }
        $.post($form.attr('action'), $form.serialize(), function (result) {
             if (result.result == 'success') {                           
             $("#loader").html('');
             $("#loader").html('<b style="color:lime;">You have sucessfully updated your template.</b>');                
             $("#loader").fadeOut(5000).css("color","lime").css("font-size","16px").css("text-shadow","0px 0px 50px black");
             $("#loader").fadeIn();
            }else if(result.result == 'error'){
                 $("#loader").html('');
                 $("#loader").html('<b style="color:red;">Their is some error updated template , please try again ! </b>');
                 $("#loader").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 50px black");
                 $("#loader").fadeIn();
            }
        }, 'json');
    });
    














   
	
$(".dropdown-toggle").click(function(){
	$(".dropdown-menu").toggle();
});	


	
});
