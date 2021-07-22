<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="panel-heading"> 							
				<a href="<?php echo base_url(); ?>admin/message" class="btn btn-info btn-rounded btn-sm pull-right"> <i class="fa fa-angle-double-left"></i>
					 <?php echo ('back'); ?>
				   
				</a>
			</div>
			<div class="panel-body table-responsive">
    		
            <?php echo form_open(base_url() . 'health_worker/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>
			<?php $users = $this->crud_model->get_user()->result_array();
			$hws = $this->crud_model->get_health_workers()->result_array();
			?>
 
			<div class="form-group">
				
                    <div class="col-sm-12">
			            <select class="form-control" data-toggle="select2" name="receiver" id="receiver" required>
							<option value=""><?php echo ('select a user');?></option>
                            <optgroup label="<?php echo ('select_a_user'); ?>">
                                <?php foreach($users as $user):?>
                                    <option value="<?php echo $user['user_id']; ?>">
                                        <?php echo $user['fname'].' '.$user['lname']; ?></option>
                                <?php endforeach; ?>
                            </optgroup>

                            <optgroup label="<?php echo ('select health worker'); ?>">
                                <?php foreach($hws as $hw):?>
                                    <option value="<?php echo $hw['health_worker_id']; ?>">
                                        <?php echo $hw['fname'].' '.$hw['lname']; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
						</select>
    				</div>
			</div>

	
		
			<div class="form-group">
				<label class="col-md-12" for="example-text"><?php echo ('select_message_destination');?></label>
					<div class="col-sm-12">
						<textarea  class="form-control" name="message" placeholder="<?php echo ('write_new_message'); ?>" rows="5"></textarea>
					</div>
			</div>

    		<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><?php echo ('send'); ?></button>
		</form>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function check_receiver() {
		var check_receiver = $('#receiver').val();
		if (check_receiver == '' || check_receiver == 0) {
			
                    $(document).ready(function() {
						$.toast({
							heading: 'Error!!!',
							text: '<?php echo ('Please select a receiver'); ?>',
							position: 'bottom-right',
							loaderBg: '#ff6849',
							icon: 'error',
							hideAfter: 3500,
							stack: 6
						})
					});
            return false;
		}
	}
</script>