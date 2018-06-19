
<div class="page-content">
	<div class="col-md-12">
		<h3 class="page-title"> <?php echo $master_title; ?></h3>
		<a class="btn btn-default pull-right" style="position: relative; left: 15px; bottom: 15px;" href="<?php echo BASEURL; ?>/security_question/add_question" >Add Question</a>
	</div>		
	<div class=" box light-grey">
		<div class="portlet-body">		
			<table class="table table-striped table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>	
				</thead>
				<tbody>
					<?php $i=1; foreach($all_questions as $key=>$val){ ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $val['security_question']; ?></td>
						<td><span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
								<?php echo ($val['status']==1)?'Active':'Inactive'; ?>
							</span>
						</td>
						<td>
						<a title="Edit"  href='<?php echo BASEURL; ?>/security_question/edit_question/<?php echo $val['id']; ?>'><i class="fa fa-edit" style="color:#DB4D4D;"></i></a>	
						<a title="Delete" onclick="return confirm('Are you sure you want to delete the question')" href='<?php echo BASEURL; ?>/security_question/delete_question/<?php echo $val['id']; ?>'><i class="fa fa-trash-o" style="color:#DB4D4D;"></i></a>
						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>	
	</div>	
</div>	
