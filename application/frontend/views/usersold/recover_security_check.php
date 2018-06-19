<style>
/*
snippet from Animate.css - zoomIn effect
*/
.animated{-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.animated.infinite{-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite}.animated.hinge{-webkit-animation-duration:2s;animation-duration:2s
}@-webkit-keyframes zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}50%{opacity:1}}@keyframes zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}50%{opacity:1}}.zoomIn{-webkit-animation-name:zoomIn;animation-name:zoomIn}
@-webkit-keyframes zoomOut{0%{opacity:1}50%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}100%{opacity:0}}@keyframes zoomOut{0%{opacity:1}50%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}100%{opacity:0}}.zoomOut{-webkit-animation-name:zoomOut;animation-name:zoomOut}

#accordion .panel-title i.glyphicon{
    -moz-transition: -moz-transform 0.5s ease-in-out;
    -o-transition: -o-transform 0.5s ease-in-out;
    -webkit-transition: -webkit-transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
}

.rotate-icon{
    -webkit-transform: rotate(-225deg);
    -moz-transform: rotate(-225deg);
    transform: rotate(-225deg);
}

.panel{
    border: 0px;
    border-bottom: 1px solid #30bb64;
}
.panel-group .panel+.panel{
    margin-top: 0px;
}
.panel-group .panel{
    border-radius: 0px;
}
.panel-heading{
    border-radius: 0px;
    color: white;
    
}
.panel-custom>.panel-heading{
   margin-bottom: 10px;
	border: 1px solid;
}
.middle .panel {
    padding: 0px 15px;
	}
	.panel-body {
    padding:0px 15px 10px;
}
.panel-collapse .collapse.in{
    border-bottom:0;
}	
	.panel-group .panel-heading + .panel-collapse > .panel-body{border:0px;}
	.login-text p {
    color: #fff;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 24px;
    font-weight: 700;
}
.btn-warning {
    background: #bb0000 none repeat scroll 0 0;
    border: medium none;
    font-size: 15px;
    font-weight: bold;
    padding: 10px 20px;
}
.btn-warning:hover {
 	background: #bb0000 none repeat scroll 0 0;
	
}
a:focus, a:hover {
     text-decoration: none;
}
</style>

<div id="header">
	<div class="container">
		<div class="top">
			<div class="thank">
				
				<div class="middle">
					<div class="bor-panel">
						<div class="panel" style="min-height: 400px; padding: 10px 0px;">
							
	
							<div class="login-text">
								<p class="text-center">Recover  Username / Email Below</p>
							</div>
		<?php if(!empty($all_questions)){ ?>					
			<form id="recover_security_form"  method="post">					
       		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
			$i=0;
			foreach($all_questions as $key=>$val){ ?>
            <div class="panel panel-custom">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" class="question" value="<?php echo $val['id']; ?>" data-parent="#accordion" href="#collapseOne_<?php echo $val['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <i class="glyphicon glyphicon-plus"></i>
                            <?php echo $val['question']; ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne_<?php echo $val['id']; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body animated zoomOut" style="color:#fff;">
                       <input type="text" name="user_recover_data[<?php echo $val['id']; ?>]" class="form-control answer"   />
						<?php
					  	$id = base64_decode($this->input->get('id'));
					  	if($i == 0){?>
						 <input type="hidden" name="user_id" value="<?php echo $id;?>" class="form-control"/>
						<?php } ?>
                    </div>
                </div>
            </div>
			
			<?php $i++;}?>
        </div>	
				<div class="col-sm-12">
					<div class="pull-right"><button type="submit"  id="recover_last_step" class="btn btn-warning">Continue</button></div>
					<div class="pull-left"><a  href="<?php echo BASEURL; ?>/users/login"  class="btn btn-warning">Back to Login</a></div>
				</div>
		</form>
		<?php }else {?>		
							<div class="col-sm-12">
							<h4 style="color: red; font-weight: bold; font-size: 15px; padding-bottom: 20px;">You Haven't Setup The Security Question's In Backoffice</h4>
							<h4 style="color: red; font-weight: bold; font-size: 15px; padding-bottom: 20px;">So Please Create Ticket In Order To Recover Account Details..</h4>
							
							<div class="pull-right">
								<a  href="<?php echo BASEURL; ?>/ticket"  class=" text-center btn btn-warning">Create Ticket</a> 
							</div>	
							<div class="pull-left"><a  href="<?php echo BASEURL; ?>/users/login"  class="btn btn-warning">Back to Login</a></div></div>
		<?php }?>					
						<div id="message" class="text-center"></div>	
						</div>
						<div id="loading_icon" class="text-center"></div>
					</div>

				</div>
				
				
			</div>
		</div>
	</div>
</div>


