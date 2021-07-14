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
                        <?php
                          $key = $this->session->userdata('login_type').'_id';
                          $image_path = 'uploads/'.$this->session->userdata('login_type').'_image/'.$this->session->userdata($key).'.jpg';
                          if(!file_exists($image_path)){
                            $image_path = 'uploads/default.jpg';
                          }
                         ?>
                        <a href="#" class="waves-effect"><img src="<?php echo base_url(). $image_path; ?>" class="img-circle"> 
                        <span class="hide-menu">
                        <?php
                          $account_type = $this->session->userdata('login_type');
                          $account_id = $account_type.'_id';
                          $name = $this->crud_model->get_type_name_by_id($account_type, $this->session->userdata($account_id), 'name');
                          echo $name;
                         ?>
                            
                        <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url(); ?>admin/change_profile"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    
                    <li> <a href="<?php echo base_url(); ?>admin/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard'); ?></span></a> </li>

                    
                    
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Human Resources <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url(); ?>admin/manage_department" class="waves-effect"><span class="hide-menu">Add Departments</span></a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/car_make">Recritment</a> </li>
                            <li> <a href="javascript:void(0);" class="waves-effect"><span class="hide-menu"> Employee Payroll <span class="fa arrow"></span></span></a>
                                <ul class="nav nav-second-level">
                                    <li> <a href="<?php echo base_url(); ?>bed/bed_type">Add Payslip</a> </li>
                                    <li> <a href="<?php echo base_url(); ?>bed/bed">List Payslip</a> </li>
                                    
                                </ul>
                            </li>
                            <li> <a href="<?php echo base_url(); ?>admin/car_make">Leave</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/car_model">Award</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/car_make">Payment Report</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/car_model">Bills</a> </li>
                            
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Schedule <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li> <a href="<?php echo base_url(); ?>admin/add_schedule">Add Schedule</a> </li>
                            <li> <a href="<?php echo base_url(); ?>admin/list_schedule">List Schedule</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Bed Manager <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>bed/bed_type">Bed Types</a> </li>
                            <li> <a href="<?php echo base_url(); ?>bed/bed">Beds</a> </li>
                            <li> <a href="<?php echo base_url(); ?>bed/assign_bed">Assign Beds</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Blood Bank <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url(); ?>blood/blood_bank">Blood Bank</a> </li>
                            <li> <a href="<?= base_url(); ?>blood/blood_donor">Blood Donors</a> </li>
                            
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Medicine <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>medicine/medicine_category">Medicine Category</a> </li>
                            <li> <a href="<?php echo base_url(); ?>medicine/medicine">Medicine Manager</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Patients <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>patient/add_patient">Patient Admissions</a></li>

                            <li> <a href="<?php echo base_url(); ?>patient/list_patient">All Patients</a></li>
                            <li> <a href="payment-report.html">Cases</a></li>
                            <li> <a href="income-report.html">Case Handlers</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Doctors <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>admin/doctors">Doctors</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/doctor_department">Doctor Departments</a></li>
                            <li> <a href="patient-invoice.html">Schedules</a></li>
                            <li> <a href="patient-invoice.html">Prescriptions</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Manage Payment <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>payment/add_invoice">Add Invoice</a></li>
                            <li> <a href="<?php echo base_url(); ?>payment/list_invoice">List Invoice</a></li>
                            <li> <a href="<?php echo base_url(); ?>payment/list_invoice">Payment Report</a></li>
                            
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Expenses <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>payment/expense_category">Add Expense Category</a></li>
                            <li> <a href="<?php echo base_url(); ?>payment/expense">Expenses</a></li>
                            
                        </ul>
                    </li>
                    <li> <a href="<?php echo base_url(); ?>event/event" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Events'); ?></span></a> </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu"> Task Manager <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="payments.html">Payments</a></li>
                            <li> <a href="add-payments.html">Add Payment</a></li>
                            <li> <a href="patient-invoice.html">Patient Invoice</a></li>
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
                    
                    <li class="nav-small-cap">--- Support</li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="F" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Support System<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li> <a href="javascript:void(0)" class="waves-effect">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                </ul>
                            </li>
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