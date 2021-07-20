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
                                <th>Department</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($health_workers as $health_worker): ?>
                            <tr>
                                <td>1</td>
                                <td><?= $health_worker['fname']; ?></td>
                                <td><?= $health_worker['lname']; ?></td>
                                <td><?= $health_worker['email']; ?></td>
                                <td><?= $health_worker['gender']; ?></td>
                                <td><?= $health_worker['age']; ?></td>
                                <td><?= $health_worker['department']; ?></td>
                                <td>
                                	<a href="">Edit</a>
                                	<a href="">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
