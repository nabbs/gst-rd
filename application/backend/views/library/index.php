<!--section class="content-header">
      <h1>
       <?php echo $master_title; ?>	
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php $master_title; ?></li>
      </ol>
    </section-->
	
		<style>
			/* layout.css Style */
			.upload-drop-zone {
				height: 200px;
				border-width: 2px;
				margin-bottom: 20px;
			}

			/* skin.css Style*/
			.upload-drop-zone {
				color: #ccc;
				border-style: dashed;
				border-color: #ccc;
				line-height: 200px;
				text-align: center
			}
			.upload-drop-zone.drop {
				color: #222;
				border-color: #222;
			}

			</style>
<?php /*if(@$success){ ?>	
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               <?php echo $success; ?>
              </div>
<?php }elseif(@$error_message){ ?> 
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               <?php echo $error_message; ?>
              </div>
<?php } */?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" id="gallery_load"><a href="#gallery_img" data-toggle="tab">Media</a></li>
			  <li><a href="#upload" data-toggle="tab">Upload</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane box " id="gallery_img">
               
                <!-- Post -->
				
                <!-- /.post -->
				
              </div>
            
	<div class="tab-pane" id="upload">
		
                <!-- The timeline -->
	
			  <div class="panel panel-default">
				<div class="panel-heading"><strong>Upload Files</strong> <small>Select files from your computer Or drag and drop files below</small></div>
				<div class="panel-body">

				  <!-- Standar Form -->
				  <!--h4>Select files from your computer</h4>
				  <form action="/admin/library" method="post" enctype="multipart/form-data" id="js-upload-form">
					<div class="form-inline">
					  <div class="form-group">
						<input type="file" name="files[]" id="js-upload-files" multiple>
					  </div>
					  <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
					</div>
				  </form-->

				  <!-- Drop Zone -->
				  <!--h3> Select files from your computer Or drag and drop files below</h3-->
				<div class='content'>
				<div class="form-group">
            <form action="/admin/library/dropzoneupload" class="dropzone" id="dropzonewidget">
                
            </form> 
                  </div>			
            </div> 

				 
				</div>
			  </div>
		
     </div>
              
              <!-- /.tab-pane -->
     </div>
            <!-- /.tab-content -->
			
			
			
			
			
			
			
			
			
          </div>
          <!-- /.nav-tabs-custom -->
		  
	</div>	  
		  
		  
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>