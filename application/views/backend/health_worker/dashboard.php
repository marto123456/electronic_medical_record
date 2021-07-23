<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-user bg-megna"></i>
                <?php
                    $users = $this->db->count_all_results('users');
                ?>
                <div class="bodystate">
                    <h4><?php echo $users; ?></h4>
                    <span class="text-muted">Patient(s)</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
                <?php
                    $hw = $this->db->count_all_results('health_worker');
                ?>
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-shopping-cart bg-info"></i>
                <div class="bodystate">
                    <h4><?php echo $hw; ?></h4>
                    <span class="text-muted">Doctor(s)</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/row -->
<div class="row">
    <div class="col-md-6">
        <?php 
        //select and count from users or patients table where gender is male. Do the same for female and display in pie chart
            $this->db->select('gender');
            $this->db->where('gender', 'male');
            
            $male = $this->db->count_all_results('users');
        ?>
        <?php 
            $this->db->select('gender');
            $this->db->where('gender', 'female');
            
            $female = $this->db->count_all_results('users');
            
        ?>

<div class="white-box">
<h3>Users by Gender</h3>
        <canvas id="myChart" width="400" height="400"></canvas>
            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            <?php 

            ?>
            labels: [
            '<?php echo 'Male'; ?>',
            '<?php echo 'Female'; ?>',

            ],
            datasets: [{
            label: 'Gender Count',
            data: [
            <?php echo $male; ?>,
            <?php echo $female; ?>,
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.9)',
            'rgba(54, 162, 235, 0.9)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
            }]
            },
            options: {
            scales: {
            y: {
            beginAtZero: true
            }
            }
            }
            });
            </script>

        </div>
    </div>

    <div class="col-md-6">
    
        <?php 
        //get from users table where the age is between 1-14, 15-29 e.t.c and display in pie chart
        $this->db->where('age >=', '1');
        $this->db->where('age <', '15');
        $query = $this->db->count_all_results('users');

        $this->db->where('age >=', '15');
        $this->db->where('age <', '30');
        $query1 = $this->db->count_all_results('users');

        $this->db->where('age >=', '30');
        $this->db->where('age <', '45');
        $query2 = $this->db->count_all_results('users');
        
            
        ?>
        <?php 
        echo $query; echo $query1; echo $query2;
            
        ?>
        
  
        

<div class="white-box">

<canvas id="myChart1" width="400" height="400"></canvas>
            <script>
            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: [
            '<?php echo '1-15 yrs'; ?>',
            '<?php echo '15-30 yrs'; ?>',
            '<?php echo '30-45 yrs'; ?>',

            ],
            datasets: [{
            label: 'Age Values',
            data: [
            <?php echo $query; ?>,
            <?php echo $query1; ?>,
            <?php echo $query2; ?>,
            ],
            backgroundColor: [
            'rgba(255, 135, 132, 0.9)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 246, 141, 0.9)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
            }]
            },
            options: {
            scales: {
            y: {
            beginAtZero: true
            }
            }
            }
            });
            </script>

        </div>
    </div>
</div>

