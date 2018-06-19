 <div class="post">
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    
                    <div class="col-sm-12">
					<div class="empty" style="height:32px;"></div>
					<div class="row">
					<?php 
					$srno = 1;
					foreach($images as $key=>$val){	?>
					
						 <div class="col-sm-2" >						 
							<i class="fa fa-close close_button <?php
							echo ($gp_temp[0]['select_img']==$val['post_attachment_name'])?'':'gp_none'; ?>">
							</i>							
                          <img class="img-responsive gp_img <?php echo ($gp_temp[0]['select_img']==$val['post_attachment_name'])?'selected_img':''; ?>" src="/../assets/files/<?php echo $val['post_attachment_name']; ?>" alt="Photo" data-src="<?php echo $val['post_attachment_name']; ?>" >
						  </div>						  		 
					<?php 
					}?>
					
					    </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>	
	
  
  
 <script>
  
  $(".gp_img").on('click',function(){
  
		$(this).addClass("for_selected");
		var imgname= $(this).attr('data-src');
		$("#image_name").attr('value',imgname);
		var numItems = $('.selected_img').length
		if(numItems==1){
			alert('Sorry! Choose One Image!');
			$(".gp_img ").removeClass('for_selected');
			return false;						
		}else{
		$('.for_selected').addClass('selected_img');
					$('.selected_img').prev().closest('i').removeClass('gp_none');
					$('.for_selected').removeClass('for_selected');
		}
		});
	
	
$(".save_image").on('click',function(){	
	var imgname= $(".selected_img").attr('data-src');
	
		$.ajax({
			type: "POST",
			url: "/admin/hajj/save_temp",
			dataType: 'json',
			data: {select_img:imgname,type:'image'},
			success: function(result){  
			//console.log(result.result);
				if (result.result == 'error') {
				$("#loading_icon").html("");
				$("#message").addClass("alert-danger");				
				$("#message").html("<span >" + result.message + "</span>");
				} else if (result.result == 'success') {
					
					//$("#loading_icon").html("");
					$('.for_selected').addClass('selected_img');
					$('.selected_img').prev().closest('i').removeClass('gp_none');
					$('.for_selected').removeClass('for_selected');
					
					//$("#message").addClass("alert-success");
				//$("#message").html("<span style='color:green'>" + result.message + "</span>");			  
				}
					
			}
		});
		
	});
	
	
$(".close_button").on('click',function(){
		$(this).addClass('gp_none');
		var imgname = $(this).next().closest('img').attr('data-src');
		$(this).next().closest('img').removeClass('selected_img');
		$.ajax({
			type: "POST",
			url: "/admin/hajj/save_temp",
			dataType: 'json',
			data: {select_img:imgname,type:'image',trash:'yes'},
			success: function(result){  
			console.log(result.result);
				if (result.result == 'error') {
				$("#loading_icon").html("");
				$("#message").addClass("alert-danger");				
				$("#message").html("<span >" + result.message + "</span>");
				} else if (result.result == 'success') {
					//$("#loading_icon").html("");			
					
					//$("#message").addClass("alert-success");
				//$("#message").html("<span style='color:green'>" + result.message + "</span>");
					
				  
				}
					
			}
		});
	});
	
	
	</script>