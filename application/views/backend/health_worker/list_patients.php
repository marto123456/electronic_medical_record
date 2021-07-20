   <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">dfdf</h3>
                
                <div class="table-responsive">
                    <table class="table color-table primary-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>BMI</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $count = 1;
                        foreach($patients as $patient): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?= $patient['fname']; ?></td>
                                <td><?= $patient['lname']; ?></td>
                                <td><?= $patient['email']; ?></td>
                                <td><?= $patient['gender']; ?></td>
                                <td><?= $patient['age']; ?></td>
                                <td><?= $patient['bmi']; ?></td>
                                <td>
                                	<a target="_blank" href="<?php echo base_url(); ?>health_worker/encounter/<?php echo $patient['user_id']; ?>" class="text-primary">Encounter</a> |
                                	<a href="" class="text-success">Edit</a> |
                                	<a href="" class="text-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
