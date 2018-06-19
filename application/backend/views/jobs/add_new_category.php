 
<style type="text/css">.form-group li {
     border-bottom: 1px solid;
    margin-right: 53px;
    padding: 15px;
    list-style: outside none none;
}</style>
 <div class="page-content">
    <div class ="col-md-12">
    
    <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/jobs/add_new_category" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
            
 
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
     	<div class="gp_empty"></div>		   
	<div class="row">     
      <!-- edit form column -->
   
<form id='add_new_category' name='add_new_users' method="post" action='<?php echo BASEURL; ?>/jobs/add_new_category'  role="form" />
	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		
		   <label>Select Company Name</label>		  
		     
				<ul  style="margin-top: 0px; border: 1px solid rgb(209, 209, 209);  max-height: 500px; overflow-y: scroll; padding-top: 23px;">
			 <?php foreach($categories as $key=>$val){ 
        

        ?>
					<li value="<?php echo $val['id']; ?>"><?php echo $val['category']; ?> <a href="javascript:void(0)"><i class="fa fa-trash-o-o "></i></a> &nbsp;|&nbsp;  <a href="javascript:void(0)" ><i class="fa fa-edit "></i></a></li>
			 <?php } ?>
				</ul>
		   </select>
	 	 </div>
	 </div>	
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">sdf</button>
	 
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Category Name</label>
		  
		   <input type="text" id="category" name="category" class="form-control" placeholder="Category Name"/>
		</div>


		<div class="col-md-12 col-sm-12 col-xs-12">
	<div id="loader1" class="text-center" ></div>
    </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			
			<button type="submit" name="submit_video" class="btn btn-primary" style="background: #54718d;border: 1px solid #54718d;"><i class="fa fa-send"></i> Submit</button>
           <a href="<?php echo BASEURL; ?>/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	    
   </div>
	 </div>	
	 
	
	
	
	  
	 
	 
	 
 
	


	
 </form>
            </div> <!-- /.row (main row) -->

       </div>
   
   </div>
  </div>
     
   </div>
  </div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>