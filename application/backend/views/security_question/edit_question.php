
<div class="page-content">
	<div class="col-md-12">
		<h3 class="page-title"> <?php echo $master_title; ?></h3>
		
	</div>		
	<div class=" box light-grey">
		<div class="portlet-body">		
			<form id="edit_question" method="post" action="<?php echo BASEURL; ?>/security_question/edit_question">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $question_detail['id']; ?>" >
				  <input type="text" class="form-control" id="" name="security_question" value="<?php echo $question_detail['security_question']; ?>" placeholder="Enter Question">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div>	
	</div>	
</div>	
