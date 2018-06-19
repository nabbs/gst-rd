<?php

@$message = $this->session->flashdata('success_msg');
@$error_message = $this->session->flashdata('error_msg');
 if(@$success){ ?>	
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
<?php } ?>