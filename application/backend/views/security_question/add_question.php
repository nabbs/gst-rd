<div class="page-content">
	<div class="col-md-12">
		<h3 class="page-title"> <?php echo $master_title; ?></h3>
	</div>		
	<div class=" box light-grey">
		<div class="portlet-body">		
			<form id="add_question" method="post" action="<?php echo BASEURL; ?>/security_question/add_question">
				<div class="form-group">
				  <input type="text" class="form-control" id="" name="security_question" placeholder="Enter Question">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div>	
	</div>	
</div>	
