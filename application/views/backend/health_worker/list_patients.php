   <div class="row">
        <div class="col-sm-12">
                    <div class="white-box">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- filter by gender on the list patients page -->
                                    <select class="form-control selCustomer multiple" onchange="return get_patients_gender(this.value)" id="gender">
                                        <option value="0">Select Gender</option>
                                        <?php 
                                        $this->db->distinct();
                                        $this->db->select('gender');
                                        $this->db->where('gender', 'male');
                                        $this->db->or_where('gender', 'female');
                                        $gender = $this->db->get('users')->result_array();
                                        
                                        foreach($gender as $g): ?>
                                           <option value="<?= $g['gender']; ?>"><?= $g['gender']; ?>
                                           </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>         
                    </div><br>
                
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
                                <th>Created By</th>
                                <th>Assigned To</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="selector_holder">
                    
                        </tbody>

                    </table>
                </div>
            </div>
        </div>        
    </div>

<script type="text/javascript">
      $(document).ready(function(){
       $.ajax({
            url: '<?php echo base_url(); ?>patient/get_all_patients/',
            method: 'GET',
                                                                                                    
            success:function(response){
                jQuery('#selector_holder').html(response);
            }
        });
    });

// get the gender from the form and pass it to patient controller to get the patients by gender
    function get_patients_gender(gender){
        var gender = $('#gender').val();
        // var user_id = $('#user_id').val();
        console.log(gender);
        $.ajax({
            url: '<?php echo base_url(); ?>patient/get_patients_gender/' + gender,
            method: 'GET',
            data:{gender:gender},                                                                                          
            success:function(response){
                jQuery('#selector_holder').html(response);
            }
        });
    }
</script>