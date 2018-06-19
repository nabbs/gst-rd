<div class="col-md-3">
                
    <!--<h4 class="m-sm-bottom">Billing</h4>
    <ul class="nav nav-pills nav-stacked">
                    <li>
                <a target="_self" href="/deposit-methods">
                    Billing Methods
                </a>
            </li>
            </ul>-->
            <?php //debug($_SERVER['REQUEST_URI']); ?>
    <h4 class="m-sm-bottom">Recruiters Settings</h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php echo($_SERVER['REQUEST_URI']=="/dashboard" || $_SERVER['REQUEST_URI']=="/dashboard/")?'active':'';?>">
                <a target="_self" href="/dashboard">
                Contact Info
                </a>
            </li>
            <li class="<?php echo($_SERVER['REQUEST_URI']=="/dashboard/all_jobs/" || $_SERVER['REQUEST_URI']=="/dashboard/all_jobs")?'active':'';?>">
                <a target="_self" href="/dashboard/all_jobs/">
                Jobs
                </a>
            </li>
        </ul>

       
</div>