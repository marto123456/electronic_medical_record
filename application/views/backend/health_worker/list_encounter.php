
  <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">dfdf</h3>
                
                <div class="table-responsive">
                    <table class="table color-table primary-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Blood Pressure</th>
                                <th>Temperature</th>
                                <th>Assigned To</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $count = 1;
                        foreach($encounter as $e): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?= $e['date']; ?></td>
                                <td><?= $e['time']; ?></td>
                                <td><?= $e['bp']; ?></td>
                                <td><?= $e['temp']; ?></td>
                                <td>
                                    <button class="badge badge-warning badge-pill text-dark">
                                    	<?php echo $this->crud_model->get_type_fname_by_id('health_worker', $e['send_to']); ?> 
                                    	<?php echo $this->crud_model->get_type_lname_by_id('health_worker', $e['send_to']); ?>
                                    </button>
		                        </td>
		                        <td>
                                		
                                	<a href="" class="text-success ">Edit</a>
                                		
                                	<a href="" class="text-danger ">Delete</a>                	 |	
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
