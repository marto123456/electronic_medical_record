<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                       
                        <a href="#" class="waves-effect"><img src="" class="img-circle"> 
                        <span class="hide-menu">
                      
                            
                        <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url(); ?>admin/change_profile"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    
                    <li> <a href="<?php echo base_url(); ?>admin/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Patients <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>admin/patient_admission">Patient Admissions</a></li>

                            <li> <a href="<?php echo base_url(); ?>patient/list_patient">All Patients</a></li>
                            <li> <a href="payment-report.html">Cases</a></li>
                            <li> <a href="income-report.html">Case Handlers</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Health Workers <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>admin/health_worker/">Add Health Worker</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/list_health_workers/">Health Workers</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/health_worker_department">Doctor Departments</a></li>
                        </ul>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Communication <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="payments.html">Noticeboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>emailmessage/sendEmailMessage">Email Message</a></li>
                            
                        </ul>
                    </li>
                    
                    <li> <a href="#" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">General Settings<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>admin/system_settings">System Settings</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/manage_language">Manage Language</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/backup_database">Backup Database</a> </li>
                            <li><a href="<?php echo base_url(); ?>payment/paymentSetting">Payment Settings</a></li>
                            <li><a href="weather.html">Weather Icons</a></li>
                        </ul>
                    </li>
                         
                    <li class="nav-small-cap">--- Addons</li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="F" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">New Addon<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url(); ?>admin/addon_manager" class="waves-effect"><i class="icon-plus fa-fw"></i> <span class="hide-menu">Addon Manager</span></a></li>
                        </ul>
                    </li>
                    

                    <li><a href="<?= base_url(); ?>admin/change_profile" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Update Profile</span></a></li>

                    <li><a href="login.html" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    
                </ul>
            </div>
        </div>