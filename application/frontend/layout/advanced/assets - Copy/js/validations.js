$(document).ready(function () {


		$('#search').formValidation({
		fields: {
			title: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},	
			
			/* city: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			} */
		}
		});/*
		.on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access").html("<span style='color:red'>" + result.message + "</span>");
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $("#get_access").html("<span style='color:limegreen'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");
			}
		}, 'json');
	}); */
	
	
	 $('#appliedform').formValidation({
		fields: {
			name: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},	
			
			email: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			phone: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			}
		
		}
		});/*
		.on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access").html("<span style='color:red'>" + result.message + "</span>");
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $("#get_access").html("<span style='color:limegreen'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");
			}
		}, 'json');
	});  
	
	$("#file_upload").change(function(){
	
        e.preventDefault();
  
        var formcontent = $("#appliedform");
        var formcontentFiles = new FormData(formcontent[0]);

        $.ajax({
            url: formcontent.attr('action'), // Url to which the request is send
            type: formcontent.attr('method'), // Type of request to be send, called as method
            data: formcontentFiles, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            beforeSend: function () {
            $("#loader").show();
                $("#loader").html("<img src='" + THEME_URL + "/assets/img/loader.gif' />");
            },
            success: function (data)   // A function to be called if request succeeds
            {

                data = eval("(" + data + ")");
				$("#loader").hide();
				//$("#show_image").val("<img   src='" + data.image + "' />");
				$('#userimage').val(data.image);
                $("#show_image").html($("<img   src='" + data.image + "' class='avatar img-responsive img-circle' alt='avatar' />"));
				$("#show_image").fadeOut(1000);
                $("#show_image").fadeIn(4000);
            }
        });

		
	});*/
	
	
	
	/* register form for user */
	
	$('#user_register').formValidation({

		framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
		fields: {
			company_name: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
					,
				  remote: {
						type: 'POST',
						url: 'http://chandigarhrecruiters.com/users/checkcompanyvalidity',
						message: 'Company Name has already been used to create an account',
						delay: 1000
					}
					}
				},
			username: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
					,

					regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
				  remote: {
						type: 'POST',
						url: 'http://chandigarhrecruiters.com/users/checkusernamevalidity',
						message: 'username has already been used to create an account',
						delay: 1000
					}
					}
					
                    
				},
				  
			email: {
				validators: {
					notEmpty: {
						message: 'Email Cant\'t be Empty'
					},
					regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        },
				  remote: {
						type: 'POST',
						url: 'http://chandigarhrecruiters.com/users/checkemailvalidity',
						message: 'Email has already been used to create an account',
						delay: 1000
					}
			}
			},	
			password: {
				validators: {
					notEmpty: {
						message: 'Password cant\'t be Empty'
						
					}
				}
			},	
			mobile: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					},
					regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The mobile can only consist of number'
                    }
				}
			},
			agree: {
				validators: {                        
					notEmpty: {
						message: 'You have to agree with terms and conditions'
					}     
				}
			}
			
			
			/* city: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			} */
		}	
		}).on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access_now_icon").html("<span style='color:red'>" + result.message + "</span>");
				
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $(".btn-block").html("<span style='color:#fff'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");
				window.setTimeout(function() {
					window.location.href = 'http://chandigarhrecruiters.com/dashboard/';
				}, 2000);
			   window.setTimeout(function(){
			   	window.location.herf = ''	
			   });
			}
		}, 'json');
	});

	
	


$('#loginform').formValidation({
	framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
		fields: {
		
				  
			email: {
				validators: {

					notEmpty: {
						message: 'Email Cant\'t be Empty'

					},

				  remote: {
						type: 'POST',
						url: 'http://chandigarhrecruiters.com/users/loginusernamevalidity',
						message: 'Email or User Name is not valid!',
						delay: 1000
					}
			}
			},	
			password: {
				validators: {
					notEmpty: {
						message: 'Password cant\'t be Empty'
						
					}
				}
			},	
			mobile: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					},
					regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Phone can only consist of number'
                    }
				}
			},
			agree: {
				validators: {                        
					notEmpty: {
						message: 'You have to agree with terms and conditions'
					}     
				}
			}
			
			}	
		}).on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access_now_icon").html("<span style='color:red'>" + result.message + "</span>");
				
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $(".btn-block").html("<span style='color:#fff'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");
				window.setTimeout(function() {
					window.location.href = 'http://chandigarhrecruiters.com/dashboard/';
				}, 2000);
			   window.setTimeout(function(){
			   	window.location.herf = ''	
			   });
			}
		}, 'json');
	});

	/*for change password*/
	
	$('#change_password').formValidation({
		fields: {
			oldpassword: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},	
			
			/* city: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			} */
		}
		});/*
		.on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access").html("<span style='color:red'>" + result.message + "</span>");
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $("#get_access").html("<span style='color:limegreen'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");
			}
		}, 'json');
	});*/
	
	$('#formcompanyinfo').formValidation({
		fields: {
		
				  
			company_email: {
				validators: {
					notEmpty: {
						message: 'Email Cant\'t be Empty'
					}/*,
				  remote: {
						type: 'POST',
						url: 'http://chandigarhrecruiters.com/users/company_email_verify',
						message: 'Email is not valid!',
						delay: 1000
					}*/
			}
			},	
			
			fname: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			lname: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			compnay: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			company_description: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			compnay_name: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			company_address: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			company_city: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			company_pincode: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
					/*regexp: {
                        regexp: /^\d{5}$/,
                        message: 'The US zipcode must contain 5 digits'
                    }*/
				}
			},
			company_state: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			company_phone: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					},
					regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The phone can only consist of number'
                    }
				}
			}
			
			
			}	
		}).on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$("#get_access_now_icon").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$("#get_access_now_icon").html("");
				$("#get_access_now_icon").html("<span style='color:red'>" + result.message + "</span>");
				
				}
			if (result.result == 'success') {
			
		$("#get_access_now_icon").html("");
			   $(".btn-block").html("<span style='color:#fff'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");

				window.setTimeout(function() {
					window.location.href = 'http://chandigarhrecruiters.com/dashboard/';
				}, 2000);
			   window.setTimeout(function(){
			   	window.location.herf = ''	
			   });
			}
		}, 'json');
	});





$('#useergp_').formValidation({
		fields: {
			
			
			job_title: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_position: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_description: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_skills: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_experience: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_education: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_salary: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			}
			
			
			
			}	
		}).on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$(".btn-block").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$(".btn-block").html(" Post  &nbsp; <i class='fa fa-play-circle'></i>");
				$(".msgforu").html("<span style='color:red'>" + result.message + "</span>");
								}
			if (result.result == 'success') {
			
		$(".btn-block").html("");
			   $(".btn-block").html("<span style='color:#fff'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");

			    $(".msgforu").html("<span style='color:#red'> <i class='fa fa-check-square-o'></i>" + result.user_msg + "</span>");


				window.setTimeout(function() {
					window.location.href = 'http://chandigarhrecruiters.com/dashboard/all_jobs/';
				}, 2000);
			   window.setTimeout(function(){
			   	window.location.herf = ''	
			   });
			}
		}, 'json');
	});






$('#update_job').formValidation({
		fields: {
			
			
			job_title: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_position: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_description: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_skills: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_experience: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_required_education: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			},
			job_salary: {
				validators: {
					notEmpty: {
						message: 'Cant\'t be Empty'
					}
				}
			}
			
			
			
			}	
		}).on('success.form.fv', function (e) {
		e.preventDefault();
        var $form = $(e.target);
		$(".btn-block").html("<i class='fa fa-spinner fa-spin'></i>");
		$.post($form.attr('action'), $form.serialize(), function (result) {
			if (result.result == 'error') {
			$(".btn-block").html(" Post  &nbsp; <i class='fa fa-play-circle'></i>");
				$(".msgforu").html("<span style='color:red'>" + result.message + "</span>");
								}
			if (result.result == 'success') {
			
		$(".btn-block").html("");
			   $(".btn-block").html("<span style='color:#fff'> <i class='fa fa-check-square-o'></i>" + result.message + "</span>");

			    $(".msgforu").html("<span style='color:#red'> <i class='fa fa-check-square-o'></i>" + result.user_msg + "</span>");


				window.setTimeout(function() {
					window.location.href = 'http://chandigarhrecruiters.com/dashboard/all_jobs/';
				}, 2000);
			   window.setTimeout(function(){
			   	window.location.herf = ''	
			   });
			}
		}, 'json');
	});






});	