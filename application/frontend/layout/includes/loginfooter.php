<?php user_log();?>		
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id="recover_modal" style="display:none;" data-toggle="modal" data-target="#myModal"></button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="z-index: 999999999;">
    
      <!-- Modal content-->
      <div class="modal-content modal-header text-center">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title " style="font-weight: bold;">Account Recovery Successfull</h4>
        </div>
        <div class="modal-body" style="margin-bottom: 20px;">
			<div class="col-sm-12" style="padding-bottom: 25px;">
         		 <img src="<?php echo FRONT_END_LAYOUT;?>/assets/img/tick.png"  style="width: 20%;">
			</div>	
			<span style=" font-weight: bold;" id="recover_msg"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/js/bootstrap.js"></script>	
    <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/js/validations.js"></script>

<script>
	$(document).ready(function(){
		$(".forget_radio").on('change',function(){
			$(".hide_form").show();
			var input_type = this.value;
			if(input_type == 'username'){
				$('#user_data_id').attr('placeholder','User Name');
			}else{
				$('#user_data_id').attr('placeholder','Email');
				
			}
			
		});

		$("#recover_security_form").submit(function(e){
			e.preventDefault();
			var $return = true;
		$(".answer").each(function(){
			var ans_value = $(this).val();
			if(ans_value == '' || ans_value == undefined){
				$(this).focus();
				$("#message").html('<span style="color:red;">All Fields Should Be Required</span>');			
				$return = false ;
			}
		});
		if(!$return) return false;
			$("#message").html('');
			$("#loading_icon").html('<i style="color:green;" class="fa fa-2x fa-spinner fa-spin"></i>');
		$.post(BASEURL+'/users/security_check_data',$("#recover_security_form").serialize(),function(result){
				if(result.result == 'success'){
					$("#loading_icon").html('');
					$("#recover_msg").html('<span style="color:green;">'+result.message+'</span>');
					$('#recover_modal').trigger('click');
					$('.answer').val('');
				}else if(result.result == 'error'){
					$("#loading_icon").html('');
					$("#message").html('<span style="color:red;">'+result.message+'</span>');
					$("#message").fadeOut('5000');
				
				}	
				
		},'json');
		
		});
	
	});
</script>
<script>
$(function() {

    function toggleChevron(e) {
        $(e.target)
                .prev('.panel-heading')
                .find("i")
                .toggleClass('rotate-icon');
        $('.panel-body.animated').toggleClass('zoomIn zoomOut');
    }
    
    $('#accordion').on('hide.bs.collapse', toggleChevron);
    $('#accordion').on('show.bs.collapse', toggleChevron);
})

	
</script>