<?php $userdata=$this->session->userdata("userdata"); ?>
<div class="navbar navbar-default" role="navigation">

    <div class="container">

      <div class="navbar-header">
        <div class="navbar-brand">
          <a href="<?php echo BASEURL; ?>" class="logo">
            <img style="margin-top: 5px;" src="<?php echo THEME_URL; ?>assets/img/fast-logo.png" alt="Fast Cash Funnel"/>
          </a>
        </div>

        <button class="navbar-toggle pull-right" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <i class="fa fa-cog"></i>
        </button>
      </div><!-- /.navbar-header -->

      <div class="navbar-collapse collapse">

       <!-- <form class="navbar-form navbar-search-form navbar-left">
          <div class="form-group">-->
            <!--<input class="form-control navbar-search-field" placeholder="Type here for search..." type="text">-->
          <!-- </div>-->
        </form>

        <ul class="nav navbar-nav navbar-right">

          <li class="divider"></li>

          <li class="dropdown navbar-profile">
            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="javascript:;">
              <img src="<?php echo THEME_URL; ?>/assets/img/avatar-6-sm.jpg" class="navbar-profile-avatar" alt="">
              <span class="visible-xs-inline">@peterlandt &nbsp;</span>
              <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu" role="menu">

              <li>
                <a href="<?php echo BASEURL; ?>/profile">
                  <i class="fa fa-user"></i>
                  &nbsp;&nbsp;My Profile
                </a>
              </li>
				
				    <li>
					<a href="<?php echo BASEURL; ?>/settings/changepassword">
							<i class="fa fa-cogs"></i> 
						Change Password
						</a>
					</li>
				
				<!--<li>					
						<a href="<?php echo BASEURL; ?>/settings/system_settings">					
						<i class="fa fa-cogs"></i> System Settings				
						</a>					
					</li>-->

              <!--<li>
                <a href="./page-pricing-plans.html">
                  <i class="fa fa-dollar"></i>
                  &nbsp;&nbsp;Plans &amp; Billing
                </a>
              </li>
               -->

              <!--<li>
                <a href="./page-settings.html">
                  <i class="fa fa-cogs"></i>
                  &nbsp;&nbsp;Settings
                </a>
              </li>-->

              <li class="divider"></li>

              <li>
                <a href="<?php echo BASEURL;?>/dashboard/logout">
                  <i class="fa fa-sign-out"></i>
                  &nbsp;&nbsp;Logout
                </a>
              </li>

            </ul>

          </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">

          <!--  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              Templates&nbsp;
              <i class="fa fa-caret-down"></i>
            </a>-->

            <ul class="dropdown-menu mega-menu-2" role="menu">

              <li>
                      <div class="mega-menu-content">

                  <div class="mega-menu-col">

                    <div class="demo-block">
                      <a href="../admin-1/index.html" class="demo-launcher">
                        <img src="../../previews/img/theme-drop-admin-1.png" class="img-responsive" alt="">

                        View Admin Layout #1
                      </a>

                      <div class="demo-external">
                        <a href="../admin-1/index.html" target="_blank"><small><i class="fa fa-external-link"></i>&nbsp;&nbsp;(Open in new tab)</small></a>
                      </div>
                    </div><!-- /.demo-block -->

                    <div class="demo-block">
                      <a href="../landing/index.html" class="demo-launcher">
                        <img src="../../previews/img/theme-drop-landing.png" class="img-responsive" alt="">

                        View Frontend Template
                      </a>

                      <div class="demo-external">
                        <a href="../landing/index.html" target="_blank"><small><i class="fa fa-external-link"></i>&nbsp;&nbsp;(Open in new tab)</small></a>
                      </div>
                    </div><!-- /.demo-block -->
                  </div> <!-- /.mega-menu-col -->

                  <div class="mega-menu-col">
                    <div class="demo-block">
                      <a href="../admin-2/index.html" class="demo-launcher">
                        <img src="../../previews/img/theme-drop-admin-2.png" class="img-responsive" alt="">

                        View Admin Layout #2
                      </a>

                      <div class="demo-external">
                        <a href="../admin-2/index.html" target="_blank"><small><i class="fa fa-external-link"></i>&nbsp;&nbsp;(Open in new tab)</small></a>
                      </div>
                    </div><!-- /.demo-block -->

                    <div class="demo-block">
                      <a href="../launch/index.html" class="demo-launcher">
                        <img src="../../previews/img/theme-drop-launch.png" class="img-responsive" alt="">

                        View Launch Template
                      </a>

                      <div class="demo-external">
                        <a href="../launch/index.html" target="_blank"><small><i class="fa fa-external-link"></i>&nbsp;&nbsp;(Open in new tab)</small></a>
                      </div>
                    </div><!-- /.demo-block -->
                  </div> <!-- /.mega-menu-col -->

                </div> <!-- /.mega-menu-content -->
              </li>

            </ul>

          </li>

          <li class="navbar-divider"></li><!-- /.navbar-divider -->

          <li class="dropdown navbar-notification">

           <!-- <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-bell navbar-notification-icon"></i>
              <span class="visible-xs-inline">&nbsp;Notifications</span>
              <b class="badge badge-primary"><?php echo $total_users ?></b>
            </a>-->

            <div class="dropdown-menu">

              <div class="dropdown-header">&nbsp;Notifications</div>

              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 225px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 225px;">

                <a href="./page-notifications.html" class="notification">
                  <span class="notification-icon"><i class="fa fa-cloud-upload text-primary"></i></span>
                  <span class="notification-title">Notification Title</span>
                  <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                  <span class="notification-time">20 minutes ago</span>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <span class="notification-icon"><i class="fa fa-ban text-secondary"></i></span>
                  <span class="notification-title">Notification Title</span>
                  <span class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                  <span class="notification-time">20 minutes ago</span>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <span class="notification-icon"><i class="fa fa-warning text-tertiary"></i></span>
                  <span class="notification-title">Storage Space Almost Full!</span>
                  <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                  <span class="notification-time">20 minutes ago</span>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <span class="notification-icon"><i class="fa fa-ban text-danger"></i></span>
                  <span class="notification-title">Sync Error</span>
                  <span class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                  <span class="notification-time">20 minutes ago</span>
                </a> <!-- / .notification -->

              </div><div class="slimScrollBar" style="background: rgb(136, 136, 136) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(153, 153, 153) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div> <!-- / .notification-list -->

              <a href="./page-notifications.html" class="notification-link">View All Notifications</a>

            </div> <!-- / .dropdown-menu -->

          </li>



          <li class="dropdown navbar-notification">

           <!-- <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-envelope navbar-notification-icon"></i>
              <span class="visible-xs-inline">&nbsp;Messages</span>
            </a>-->

            <div class="dropdown-menu">

              <div class="dropdown-header">Messages</div>

              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 225px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 225px;">

                <a href="./page-notifications.html" class="notification">
                  <div class="notification-icon"><img src="../../global/img/avatars/avatar-3-md.jpg" alt=""></div>
                  <div class="notification-title">New Message</div>
                  <div class="notification-description">Praesent dictum nisl non est sagittis luctus.</div>
                  <div class="notification-time">20 minutes ago</div>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <div class="notification-icon"><img src="../../global/img/avatars/avatar-3-md.jpg" alt=""></div>
                  <div class="notification-title">New Message</div>
                  <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                  <div class="notification-time">20 minutes ago</div>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <div class="notification-icon"><img src="../../global/img/avatars/avatar-4-md.jpg" alt=""></div>
                  <div class="notification-title">New Message</div>
                  <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                  <div class="notification-time">20 minutes ago</div>
                </a> <!-- / .notification -->

                <a href="./page-notifications.html" class="notification">
                  <div class="notification-icon"><img src="../../global/img/avatars/avatar-5-md.jpg" alt=""></div>
                  <div class="notification-title">New Message</div>
                  <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                  <div class="notification-time">20 minutes ago</div>
                </a> <!-- / .notification -->

              </div><div class="slimScrollBar" style="background: rgb(136, 136, 136) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(153, 153, 153) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div> <!-- / .notification-list -->

              <a href="./page-notifications.html" class="notification-link">View All Messages</a>

            </div> <!-- / .dropdown-menu -->

          </li>


          <li class="dropdown navbar-notification empty">

          <!--  <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-warning navbar-notification-icon"></i>
              <span class="visible-xs-inline">&nbsp;&nbsp;Alerts</span>
            </a>-->

            <div class="dropdown-menu">

              <div class="dropdown-header">Alerts</div>

              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 225px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 225px;">

                <h4 class="notification-empty-title">No alerts here.</h4>
                <p class="notification-empty-text">Check out what other makers are doing on Explore!</p>

              </div><div class="slimScrollBar" style="background: rgb(136, 136, 136) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(153, 153, 153) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div> <!-- / .notification-list -->

              <a href="./page-notifications.html" class="notification-link">View All Alerts</a>

            </div> <!-- / .dropdown-menu -->

          </li>



          <li class="navbar-divider"></li><!-- /.navbar-divider -->

        </ul>

      </div>

    </div> <!--/.container -->

  </div> <!--/.navbar -->