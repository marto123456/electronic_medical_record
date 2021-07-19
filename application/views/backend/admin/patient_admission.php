<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open(base_url().'admin/patient_admission/add'); ?>
              
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
                    <label for="example-tel-input" class="col-2 col-form-label">Confirm Password</label>
                    <div class="col-10">
                        <input class="form-control" type="password" value="" id="example-tel-input" name="confirm_password">
                        
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
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
			    	<div class="col-md-10">
                        <div class="col-md-4">
                            <input type="number" name="height" id="height" placeholder="Height" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="weight" id="weight" placeholder="Weight" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="bmi" id="bmi" placeholder="bmi" class="form-control" />
                        </div>            
                    </div>
			    </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
                    <div class="col-md-10">
    		        	<div class="col-md-6">
    		        		<input type="text" name="ward" placeholder="ward" class="form-control" />
    		        	</div>
    		        	<div class="col-md-6">
    		        		<input type="text" name="lga" placeholder="lga" class="form-control" />
    		        	</div>
                    </div>
		        </div>
                 <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
                    <div class="col-md-10">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            <input type=button value="Take Photo" onClick="take_photo()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
                    <div class="col-md-10">
                        <div class="col-md-8">
                            <div id="results"></div>
                        </div>
                    </div>
                </div>
                 
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <input class="btn btn-outline-primary" type="submit" id="example-datetime-local-input" value="Add Patient">
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $("#height, #weight").on("keydown keyup", divide);
        function divide() {
        $("#bmi").val(Number($("#weight").val()) / Number($("#height").val()));
    }
});

    //webcam javascript 

    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 640,
        dest_height: 480,
        image_format: 'jpeg',
        jpeg_quality: 90,
        force_flash: false,
        flip_horiz: true,
        fps: 45
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_photo() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img id="imageprev" src="'+data_uri+'"/>';
        } );
         // Webcam.reset();
    }
</script>