
<!DOCTYPE html>
<html>

  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      

      <!-- Left side column. contains the logo and sidebar -->
     

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div id="profile-builder">

<div class="row">
<div class=" col-md-12 col-sm-12 col-xs-12">
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-md-3 col-sm-4 col-xs-12 panel" style="padding:0px;">


            <div class="card">
                <div class="cardheader">
              <img src="<?php echo $userdata['image'] ;?>" ></div>
               
                <div class="info">
                    <h4><?php echo ucfirst($userdata['display_name']) ?></h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
                
            </div>

</div>

	 
    
	    
        
        <div class="col-md-8 col-sm-8 col-xs-12" >
        <div class=" nav">
         <!--   <ul class="nav">
            <li><a href="#">Mon</a></li>
            <li><a href="#">Mon</a></li>
           <li><a href="#">Mon</a></li>
            <li><a href="#">Mon</a></li>
            <li><a href="#">Mon</a></li>
           <li><a href="#">Mon</a></li>
            </ul>-->
            <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#Monday" id="Monday-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Monday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Tuesday" role="tab" id="Tuesday-tab" data-toggle="tab" aria-controls="Tuesday">Tuesday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Wednesday" role="tab" id="Wednesday-tab" data-toggle="tab" aria-controls="Wednesday">Wednesday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Thursday" role="tab" id="Thursday-tab" data-toggle="tab" aria-controls="Thursday">Thursday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Friday" role="tab" id="Friday-tab" data-toggle="tab" aria-controls="Friday">Friday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Saturday" role="tab" id="Saturday-tab" data-toggle="tab" aria-controls="Saturday">Saturday</a></li>
      <li class="" role="presentation"><a aria-expanded="false" href="#Sunday" role="tab" id="Sunday-tab" data-toggle="tab" aria-controls="Sunday">Sunday</a></li>
     
    </ul>  
    <div id="myTabContent" class="tab-content">
	
	<div role="tabpanel" class="tab-pane fade active in" id="Monday" aria-labelledby="Monday-tab">
<?php if($userdata['package_type']=="paid") { 
       $user_schedule_one = get_user_schedule(array('day'=>1,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_one as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_one = get_dummy_schedule(array('day'=>1)) ;
		 foreach($dummy_schedule_one as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?>

      </div>	 
	  
	 	  
      <div role="tabpanel" class="tab-pane fade" id="Tuesday" aria-labelledby="Tuesday-tab">
      
<?php if($userdata['package_type']=="paid") { 
       $user_schedule_two = get_user_schedule(array('day'=>2,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_two as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_two = get_dummy_schedule(array('day'=>2)) ;
		 foreach($dummy_schedule_two as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?>

      </div>


	   <div role="tabpanel" class="tab-pane fade" id="Wednesday" aria-labelledby="Thursday-tab">
      
<?php if($userdata['package_type']=="paid") { 
       $user_schedule_three = get_user_schedule(array('day'=>3,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_three as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_three = get_dummy_schedule(array('day'=>3)) ;
		 foreach($dummy_schedule_three as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?>

      </div>

	  

       <div role="tabpanel" class="tab-pane fade" id="Thursday" aria-labelledby="Thursday-tab">
 <?php if($userdata['package_type']=="paid") { 
       $user_schedule_four = get_user_schedule(array('day'=>4,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_four as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_four = get_dummy_schedule(array('day'=>4)) ;
		 foreach($dummy_schedule_four as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?>

      </div>

	   

       <div role="tabpanel" class="tab-pane fade" id="Friday" aria-labelledby="Friday-tab">
 <?php if($userdata['package_type']=="paid") { 
       $user_schedule_five = get_user_schedule(array('day'=>5,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_five as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_five = get_dummy_schedule(array('day'=>5)) ;
		 foreach($dummy_schedule_five as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?>     

      </div>

	  
       <div role="tabpanel" class="tab-pane fade" id="Saturday" aria-labelledby="Saturday-tab">
 <?php if($userdata['package_type']=="paid") { 
       $user_schedule_six = get_user_schedule(array('day'=>6,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_six as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_six = get_dummy_schedule(array('day'=>6)) ;
		 foreach($dummy_schedule_six as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?> 

      </div>

	  
       <div role="tabpanel" class="tab-pane fade" id="Sunday" aria-labelledby="Sunday-tab">
<?php if($userdata['package_type']=="paid") { 
       $user_schedule_seven = get_user_schedule(array('day'=>7,'user_id'=>$userdata['id'])) ;      
		  foreach($user_schedule_seven as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php  } }else{ 
	 $dummy_schedule_seven = get_dummy_schedule(array('day'=>7)) ;
		 foreach($dummy_schedule_seven as $key=>$val){ ?>
		   <div class="form-group">
		   <label>Ingridients</label>
		   <textarea name="" placeholder="Ingridients" class="form-control" style="min-height:200px;"><?php  echo $val['ingridients'];  ?></textarea>
		   </div>     
		   <div class="form-group">
		   <label>Meals</label>
		   <textarea name="" placeholder="Meals" class="form-control" style="min-height:200px;"><?php  echo $val['meals'];  ?></textarea>
		   </div>      
		   <div class="form-group">
		   <label>Exercises</label>
		   <textarea name="" placeholder="Exercises" class="form-control" style="min-height:200px;" ><?php  echo $val['exercises'];  ?></textarea>
		   </div>
	 <?php }}?> 

      </div>

    </div>
           <!-- <div class="col-md-4 col-xs-4 well"><i class="fa fa-weixin fa-lg"></i> 16</div>
            <div class="col-md-4 col-xs-4 well"><i class="fa fa-heart-o fa-lg"></i> 14</div>
            <div class="col-md-4 col-xs-4 well"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>-->
        </div>
    </div>
</div>

      <!--<div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle img-responsive avatar avatar-original " style="-webkit-user-select:none; 
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">User Name</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> email@test.com<br>
                 
                  <span class="text-muted">Gender:</span> male
                 
                </div>
                <div class="col-md-6">
                 <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <small class="text-muted">Created: 01.01.2015</small>
                 <!-- <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
            </div>
          </div>
        </div>
      </div>-->
</div>







</div>
</div> <!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      
   
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->


  </body>
</html>