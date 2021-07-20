<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open(base_url().'admin/health_worker/add', array()); ?>
              
                <div class="form-group row">

                    <label for="example-text-input" class="col-2 col-form-label">First Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo set_value('fname'); ?>" id="example-text-input" name="fname">
                        <span class="text-danger"><?=$this->session->flashdata('fname_error')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Surname</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="Surname" id="example-text-input" name="lname">
                        <span class="text-danger"><?=$this->session->flashdata('lname_error')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input" name="email">
                        <span class="text-danger"><?=$this->session->flashdata('email')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Password</label>
                    <div class="col-10">
                        <input class="form-control" type="password" value="" id="example-tel-input" name="password">
                        <span class="text-danger"><?=$this->session->flashdata('password')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Age</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="42" id="example-number-input" name="age">
                        <span class="text-danger"><?=$this->session->flashdata('age')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label">Gender</label>
                    <div class="col-10">
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                             <option value="female">Female</option>
                        </select>
                        <span class="text-danger"><?=$this->session->flashdata('gender')?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Cadre</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="42" id="example-number-input" name="cadre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label">Department</label>
                    <div class="col-10">
                        <select class="form-control" name="department">
                            <option value="his">Hispania</option>
                             <option value="gi">Given</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input class="btn btn-outline-primary" type="submit" id="example-datetime-local-input" value="Add Health Worker">
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
