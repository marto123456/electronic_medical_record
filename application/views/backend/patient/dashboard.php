
<!--/row -->
<div class="row">
    <div class="col-md-10">
        <div class="white-box">

           
                       
             <div class="form-group row">
                <div class="col-md-4">
                            <label for="">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['fname']; ?>" disabled="disabled"/>
                        </div>

                        <div class="col-md-4">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['lname']; ?>" disabled="disabled" />
                        </div>
                        <div class="col-md-4">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" disabled="disabled"/>
                        </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                                <label for="">Height</label>
                                <input type="number" name="height" id="height" placeholder="Height" class="form-control" value="<?php echo $user['height']; ?>" />
                            </div>

                            <div class="col-md-4">
                                <label for="">Weight</label>
                                <input type="number" name="weight" id="weight" placeholder="Weight" class="form-control" value="<?php echo $user['weight']; ?>" />
                            </div>
                            <div class="col-md-4">
                                <label for="">BMI</label>
                                <input type="number" name="bmi" id="bmi" placeholder="bmi" class="form-control" value="<?php echo $user['bmi']; ?>"/>
                            </div>          
             </div>        
             <div class="form-group row">
                        <div class="col-md-4">
                                <label for="">Blood Pressure</label>
                                <input type="text" name="bp" value="<?php echo $user_encounter['bp']; ?>" placeholder="Blood Pressure" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Temperature</label>
                                <input type="text" name="temp" placeholder="Temperature" value="<?php echo $user_encounter['temp']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Respiratory Rate</label>
                                <input type="text" name="rr" placeholder="Respiratory Rate" value="<?php echo $user_encounter['rr']; ?>" class="form-control" />
                            </div>          
             </div>     


             <div class="form-group row">
                        <div class="col-md-4">
                                <label for="">Date To See Doctor</label>
                                <input type="text" name="bp" value="<?php echo $user_encounter['date']; ?>" placeholder="Blood Pressure" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Time To See Doctor</label>
                                <input type="text" name="temp" placeholder="Temperature" value="<?php echo $user_encounter['time']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Visit Schedule</label>
                                <input type="text" name="rr" placeholder="Respiratory Rate" value="<?php echo $user_encounter['visit']; ?>" class="form-control" />
                            </div>          
             </div>     

              <div class="form-group row">
                <div class="col-md-12">
                                <label for="">Diagnosis</label>
                                <input type="text" name="temp" placeholder="Temperature" value="<?php echo $user_encounter['diagnosis']; ?>" class="form-control" />
                            </div>
                        <div class="col-md-12">
                                <label for="">Treatment</label>
                                <textarea class="form-control">
                                    <?php echo $user_encounter['treatment']; ?>
                                </textarea>
                               
                            </div>
                            
                                   
             </div>     
                    
         

        </div>
    </div>
</div>
        
    