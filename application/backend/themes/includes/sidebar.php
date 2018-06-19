<?php $currentuserdata=$this->session->userdata['userdata'];
   $currentuserid=$currentuserdata['id'];
 if(!@$currentuserid){
 redirect(BASEURL.'/login','refresh');
 }
$query = $this->db->query("SELECT * FROM users WHERE id=$currentuserid");

$res=$query->result();

@$a=$res[0]->menu_show;
		@$menu_show=explode(',',$a);
?>
<!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo THEME_URL;?>assets/dist/img/gosearchtravel-logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo @$currentuserdata['display_name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">          
            <li class="active"><a href="/admin/"><i class="fa fa fa-dashboard"></i> Dashboard </a></li>          
        </li>
		<?php if(in_array('Settings',$menu_show)){  ?>
		<li class="treeview <?= ($this->router->class=='settings')?'menu-open active':''; ?> ">
          <a href="#">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu " <?= ($this->router->class=='settings')?'style="display: block;"':''; ?>>
		  <li class="<?= ($this->router->method=='system_settings')?' active':''; ?> "><a href="<?=base_url(); ?>settings/general_settings"><i class="fa fa-laptop" aria-hidden="true"></i> General Settings</a></li>
		  
            <li><a href="<?=base_url(); ?>settings"><i class="fa fa-list" aria-hidden="true"></i> Page Settings</a></li>  
			  			
          </ul>
        </li>
		
		<?php } if(in_array('Media',$menu_show)){ ?>
        <li class="treeview <?= ($this->router->class=='library')?'menu-open active':''; ?>">
          <a href="#">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <span>Media</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu"  <?= ($this->router->class=='library')?'style="display: block;"':''; ?>>
            <li><a href="<?=base_url(); ?>library"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Library</a></li>           
          </ul>
        </li>
		<?php } if(in_array('Slider',$menu_show)){ ?>
		<li class="treeview <?= ($this->router->class=='sliders')?'menu-open active':''; ?> ">
          <a href="#">
            <i class="fa fa-sliders" aria-hidden="true"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu " <?= ($this->router->class=='sliders')?'style="display: block;"':''; ?>>            
			<li class="<?= ($this->router->method=='sliders')?' active':''; ?> "><a href="<?=base_url(); ?>sliders"><i class="fa fa-sliders	" aria-hidden="true"></i>All sliders</a>
			</li> 
			<li class="<?= ($this->router->method=='add_new')?' active':''; ?> "><a href="<?=base_url(); ?>sliders/add_new"><i class="fa fa-plus" aria-hidden="true"></i>Add new Slider</a>
			</li>			
          </ul>
        </li>
		<?php } if(in_array('Hot Deals',$menu_show)){ ?>
		
		<li class="treeview <?= ($this->router->class=='hotdeals')?'menu-open active':''; ?>" >
          <a href="#">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Hot Deals</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?= ($this->router->class=='hotdeals')?'style="display: block;"':''; ?>>
			<li><a href="<?=base_url(); ?>hotdeals"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Lists</a></li>
		  </ul>
        </li>
		<?php } if(in_array('Top Destinations',$menu_show)){  ?>
		
		<!--li class="treeview <?= ($this->router->class=='hotdeals')?'menu-open active':''; ?>" >
          <a href="#">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Top Destinations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?= ($this->router->class=='topdestinations')?'style="display: block;"':''; ?>>
			<li><a href="<?=base_url(); ?>topdestinations"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Lists</a></li>
			<li><a href="<?=base_url(); ?>topdestinations/addplaces"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Add Places</a></li>
		  </ul>
        </li-->
		<?php  } if(in_array('Flights',$menu_show)){ ?>
		
		<!-- flight section start from here-->
		<li class="treeview <?= ($this->router->class=='flights')?'menu-open active':''; ?>" >
          <a href="#">
            <i class="fa fa-plane " aria-hidden="true"></i>
            <span>Flights</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?= ($this->router->class=='flights')?'style="display: block;"':''; ?>>
			<li><a href="<?=base_url(); ?>flights"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Lists</a></li>
		  </ul>
        </li>
		<!-- flight section end from here-->
		<?php  } if(in_array('Hajj',$menu_show)){ ?>
		
		<li class="treeview <?= ($this->router->class=='hajj' or $this->router->class=='topdestinations')?'menu-open active':''; ?>" >
          <a href="#">
            <i class="fa fa-cube" aria-hidden="true"></i>
            <span>Hajj</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?= ($this->router->class=='hajj')?'style="display: block;"':''; ?>>
			<li><a href="<?=base_url(); ?>hajj"><i class="fa fa-newspaper-o" aria-hidden="true"></i>List</a></li>
			<li><a href="<?=base_url(); ?>hajj/add_new"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Add New</a></li>
			<li><a href="<?=base_url(); ?>topdestinations"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Popular destinations</a></li>
		  </ul>
        </li>	
		<?php  } if(in_array('Umrah',$menu_show)){ ?>
		
		<li class="treeview <?= ($this->router->class=='umrah')?'menu-open active':''; ?>">
          <a href="#">
            <i class="fa fa-hand-paper-o fa-hand-o" aria-hidden="true"></i>
            <span>Umrah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?= ($this->router->class=='umrah')?'style="display: block;"':''; ?>>
			<li><a href="<?=base_url(); ?>umrah"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Lists</a></li>
		  </ul>
        </li>
		<?php }if(in_array('Blog',$menu_show)){ ?>
		<li class="treeview <?= ($this->router->class=='blog')?'menu-open active':''; ?> ">
          <a href="#">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu " <?= ($this->router->class=='blog')?'style="display: block;"':''; ?>>            
			<li class="<?= ($this->router->method=='blog')?' active':''; ?> "><a href="<?=base_url(); ?>blog"><i class="fa fa-list-alt	" aria-hidden="true"></i>All Blogs</a>
			</li> 
			<!--li class="<?= ($this->router->method=='email_subscription')?' active':''; ?> "><a href="<?=base_url(); ?>blog/email_subscription"><i class="fa fa-envelope	" aria-hidden="true"></i>Email Subscription</a>
			</li-->			
          </ul>
        </li>
		<?php }if(in_array('Template',$menu_show)){ ?>
		<li class="treeview <?= ($this->router->class=='Template')?'menu-open active':''; ?> ">
          <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <span>Email Template </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu " <?= ($this->router->class=='template')?'style="display: block;"':''; ?>>            
			<li class="<?= ($this->router->method=='template')?' active':''; ?> "><a href="<?=base_url(); ?>template"><i class="fa fa-list-alt	" aria-hidden="true"></i>All Templates</a>
			</li> 
				<li class="<?= ($this->router->method=='subscribers')?' active':''; ?> "><a href="<?=base_url(); ?>template/subscribers"><i class="fa fa-user-plus	" aria-hidden="true"></i>subscribers</a>
			</li>

  <li class="<?= ($this->router->method=='view_email_list')?' active':''; ?> "><a href="<?=base_url(); ?>template/view_email_list"><i class="fa fa-user-plus	" aria-hidden="true"></i>View subscribers list</a>
			</li>			
          </ul>
        </li>
		<?php }if(in_array('Users',$menu_show)){ ?>
		<li class="treeview <?= ($this->router->class=='users')?'menu-open active':''; ?> ">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu " <?= ($this->router->class=='users')?'style="display: block;"':''; ?>>            
			<li class="<?= ($this->router->method=='users')?' active':''; ?> "><a href="<?=base_url(); ?>users"><i class="fa fa-users	" aria-hidden="true"></i>All users</a>
			</li> 
			<li class="<?= ($this->router->method=='add_new_users')?' active':''; ?> "><a href="<?=base_url(); ?>users/add_new_users"><i class="fa fa-user-plus" aria-hidden="true"></i>Add new user</a>
			</li>			
          </ul>
        </li>
		<?php } ?>
      </ul>
	  
	  <?php $menuarray=array('Settings','Slider','Media','Hot Deals','Top Destinations','Flights','Hajj','Umrah','Blog','Template','Users');?>
	<style>
	.dataTables_length,.dataTables_info { margin: 10px;}
	.dataTables_filter,.dataTables_paginate {  float: right;
    margin: 10px;}
	</style>
	  
	  