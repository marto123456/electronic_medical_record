<?php 
foreach ($patient as $p): ?>
	<div class="row">
	    <div class="col-sm-12">
	        <div class="white-box">
	            <?php echo form_open(base_url().'health_worker/add_encounter/'.$p["user_id"].'/'.$this->session->userdata('health_worker_id').'/'); ?>

	                 <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
				    	<div class="col-md-10">    		
	                        <div class="col-md-4">
	                        	<label for="">First Name</label>
	                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $p['fname']; ?>" disabled="disabled"/>
	                            <input type="hidden" id="id" value="<?php echo $p['user_id']; ?>"/>
	                        </div>

	                        <div class="col-md-4">
	                        	<label for="">Last Name</label>
	                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $p['lname']; ?>" disabled="disabled" />
	                        </div>
	                        <div class="col-md-4">
	                        	<label for="">Email</label>
	                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $p['email']; ?>" disabled="disabled"/>
	                        </div>            
	                    </div>
				    </div>
	                <div class="form-group row">
	                    
		                    <label for="example-text-input" class="col-2 col-form-label">Date</label>
		                    <div class="col-5">
		                        <input class="form-control" type="date" value="<?php echo set_value('fname'); ?>" id="example-text-input" name="date">
		                        <span class="text-danger"><?=$this->session->flashdata('date')?></span>
		                    </div>
		                    <div class="col-5">
		                        <input class="form-control" type="time" value="<?php echo set_value('fname'); ?>" id="example-text-input" name="time">
		                        <span class="text-danger"><?=$this->session->flashdata('time')?></span>
		                    </div>
		                
	                </div>
	                <div class="form-group row">
	                    <label for="example-text-input" class="col-2 col-form-label">Visit Schedule</label>
	                    <div class="col-10">
	                    	<select name="visit" class="form-control">
	                    		<option value="first time">Fist Time Visit</option>
	                    		<option value="repeat time">Repeat Visit</option>
	                    	</select>
	                        <span class="text-danger"><?=$this->session->flashdata('visit')?></span>
	                    </div>
	                </div>
	                
	                
	                 <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
				    	<div class="col-md-10">
				    		
	                        <div class="col-md-4">
	                        	<label for="">Height</label>
	                            <input type="number" name="height" id="height" placeholder="Height" class="form-control" value="<?php echo $p['height']; ?>" />
	                        </div>

	                        <div class="col-md-4">
	                        	<label for="">Weight</label>
	                            <input type="number" name="weight" id="weight" placeholder="Weight" class="form-control" value="<?php echo $p['weight']; ?>" />
	                        </div>
	                        <div class="col-md-4">
	                        	<label for="">BMI</label>
	                            <input type="number" name="bmi" id="bmi" placeholder="bmi" class="form-control" value="<?php echo $p['bmi']; ?>"/>
	                        </div>            
	                    </div>
				    </div>
	                <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
	                    <div class="col-md-10">
	    		        	<div class="col-md-4">
	    		        		<label for="">Blood Pressure</label>
	    		        		<input type="text" name="bp" placeholder="Blood Pressure" class="form-control" />
	    		        	</div>
	    		        	<div class="col-md-4">
	    		        		<label for="">Temperature</label>
	    		        		<input type="text" name="temp" placeholder="Temperature" class="form-control" />
	    		        	</div>
	    		        	<div class="col-md-4">
	    		        		<label for="">Respiratory Rate</label>
	    		        		<input type="text" name="rr" placeholder="Respiratory Rate" class="form-control" />
	    		        	</div>
	                    </div>
			        </div>
	                <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
	                    <div class="col-md-10">
	                    <label for="">Complaints</label>
	                       <textarea name="complaints" class="form-control"></textarea>
	                    </div>
	                </div>
	                
	                <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
	                    <div class="col-md-10">
	                    <label for="">Diagnosis</label>
	                      <select name="diagnosis" class="form-control">
	                    	<option value="hypertension">Hypertension</option>
	                    	<option value="pneumonia">Pneumonia</option>
	                    	<option value="malaria">Malaria</option>
	                    	<option value="diabetes">Diabetes</option>
	                      </select>
	                        <span class="text-danger"><?=$this->session->flashdata('diagnosis')?></span>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
	                    <div class="col-md-10">
	                    <label for="">Treatment</label>
	                       <textarea name="treatment" class="form-control"></textarea>
	                    </div>
	                </div>
	                 
	                <div class="form-group row">
	                    <label for="example-datetime-local-input" class="col-2 col-form-label"></label>
	                    <div class="col-10">
	                    	<div class="col-md-6">
	                    		 <input class="btn btn-outline-primary" type="submit" id="example-datetime-local-input" value="Save">
	                    	</div>
	                        <div class="col-md-6">
	                    		 <select class="form-control" onchange="return get_health_worker(this.value)" id="health_worker_id" name="send_to">
		                            <?php $hw = $this->db->get('health_worker')->result_array();

		                            foreach ($hw as $key => $hw):?>
		                            <option>Select Doctor</option>
		                            <option value="<?= $hw['health_worker_id']; ?>"><?= $hw['lname']; ?> <?= $hw['fname']; ?></option>
		                            <?php endforeach; ?>
		                          </select> 
	                    	</div>

	                    </div>
	                </div>
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
<?php endforeach; ?>


<script type="text/javascript">
    $(function() {
        $("#height, #weight").on("keydown keyup", divide);
        function divide() {
        $("#bmi").val(Number($("#weight").val()) / Number($("#height").val()));
    }
});


    function get_health_worker(health_worker_id){
        var health_worker_id = $('#health_worker_id').val();
        var user_id = $('#id').val();
        console.log(health_worker_id, user_id);
       
        $.ajax({
            url: '<?php echo base_url(); ?>health_worker/get_health_worker/' + health_worker_id + '/' + user_id,
            method: 'POST',
            data:{
            	health_worker_id:health_worker_id,
            	user_id:user_id
            },                                                                                          
            success:function(response){
               console.log(response);
            }
        });
    }

</script>