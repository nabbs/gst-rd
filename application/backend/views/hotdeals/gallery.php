 <style>
 .img-responsive{height:150px;     margin-bottom: 20px; box-shadow: 5px 6px 17px #2b2626;}
.close_button{
    background: #000;
    color: #fff;
    border-radius: 100%;
    padding: 10px;
    z-index: 9999;
    position: absolute;
    right: 12px;
    top: -14px;

}
.gp_pop_img:hover {border: 2px solid transparent;}
 </style>
 
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
							
                          <img class="img-responsive gp_pop_img" src="../assets/files/<?php echo $val['post_attachment_name']; ?>" alt="Photo" data-src="../assets/files/<?php echo $val['post_attachment_name']; ?>" >
						  <a href="?delete=<?php echo $val['id']; ?>" class="close_button" onclick="return confirm('Are you sure for delete this Image?') "><i class="fa fa-close"></i></a>
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
				
				
	<div class="modal fade" id="gp_img_ran" role="dialog">
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