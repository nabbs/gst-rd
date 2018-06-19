
<script>
var BASEURL = '	<?php echo BASEURL;?>';
</script>
	<!-- jQuery -->
    <script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT ?>/assets/js/formValidation.js"></script>
	<script type="text/javascript" src="https://easycashcode.com/application/frontend/layout/basic/assets/js/bootstrap.js"></script>	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT ?>/assets/js/validations.js"></script>	

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/agency.min.js"></script>

	
	
		<!--<script src="<?php //echo FRONT_END_LAYOUT ?>/assets/js/validations.js"></script>-->
	<script>
	
	$(document).ready(function(){
		/*$("#changepassword").keyup(function(){
			var oldpassword = $("#oldpassword").val();
			$.post(BASEURL+'/dashboard/check_old_password',{old_password:oldpassword},function(result){
				if(result.result == "success"){

alert('match')
				}else if(result.result == "error"){

alert('wrong')
				}		

			},'json');
		});*/


		$("#btn-change").click(function(e){
			e.preventDefault();
    var oldpassword, password, repassword;
	 		oldpassword = $("#oldpassword").val();
	 		password = $("#password").val();
	 		repassword = $("#repassword").val();
	 		if(oldpassword==""){
	 			alert("oldplassword is required");
	 			return false;
	 		}
	 		if(password==""){
	 			alert("password is required");
	 			return false;
	 		}
	 		if(repassword==""){
	 			alert("repassword is required");
	 			return false;
	 		}
	 		if(password!==repassword){
	 			alert("Password no match please try again");
	 			return false;
	 		}
	 		$.post(BASEURL+'/dashboard/check_old_password',{old_password:oldpassword},function(result){
				if(result.result == "error"){

				return false;
				}		

			},'json');
	 		if(oldpassword!=""){

	 		var passdata = {"password":password};
	 			//alert(passdata);
	 			$.ajax({
				url: BASEURL+'/dashboard/update_password', 
				asynch: false,
				data: passdata, 
				type: 'POST', 
				success: function(data) {
					var jsonobj = jQuery.parseJSON(data);
//console.log(jsonobj);
					if(jsonobj){
						alert("Right");	
					}else{

						alert("wrong");
					}
					}
				});	

	 		}

             });


		
		$("#change_pasword").click(function(){			 
			 $("#content").html('<div class="col-sm-12 text-center"><i class="fa fa-spin fa-spinner" style="font-size:51px;color:#7AA93C;text-align: center;margin-top: 45px;"></i></div>');
			$.post('http://chandigarhrecruiters.com/dashboard/changepassword',{page:'changepassword'},function(result){				 
				
				
					$("#content").html(result);							
				
			}); 		 
			 
		});

		$("#all_jobs").click(function(){			 
			 $("#content").html('<div class="col-sm-12 text-center"><i class="fa fa-spin fa-spinner" style="font-size:51px;color:#7AA93C;text-align: center;margin-top: 45px;"></i></div>');
			$.post('http://chandigarhrecruiters.com/dashboard/all_jobs',{page:'changepassword'},function(result){				 
				
				
					$("#content").html(result);							
				
			}); 		 
			 
		});
		$("#new_post").click(function(){			 
			 $("#content").html('<div class="col-sm-12 text-center"><i class="fa fa-spin fa-spinner" style="font-size:51px;color:#7AA93C;text-align: center;margin-top: 45px;"></i></div>');
			$.post('http://chandigarhrecruiters.com/dashboard/new_post',{page:'changepassword'},function(result){				 
				
				
					$("#content").html(result);							
				
			}); 		 
			 
		});
		$("#profile").click(function(){			 
			 $("#content").html('<div class="col-sm-12 text-center"><i class="fa fa-spin fa-spinner" style="font-size:51px;color:#7AA93C;text-align: center;margin-top: 45px;"></i></div>');
			$.post('http://chandigarhrecruiters.com/dashboard/profile',{page:'profile'},function(result){				 
					$("#content").html(result);							
				
			}); 		 
			 
		});


		$("#div_edit").click(function(){
			$("#comapny_edit").show();
			$("#comapny_info").hide();
			$("#div_edit").hide();
			$("#div_close").show();
			


		});
		$("#div_close").click(function(){
			$("#comapny_edit").hide();
			$("#comapny_info").show();
			$("#div_edit").show();
			$("#div_close").hide();
			
		});
		

	});
	</script>