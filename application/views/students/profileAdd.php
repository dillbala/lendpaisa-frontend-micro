<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <?php
    if (!empty($error))
    {
        echo $error;
    }

    ?>

    <?php echo form_open_multipart('student/do_upload')?>

    <style>

       .input-group-addon:not(.notRequird):after {
            content:"*";
            color:red;
        }
    </style>
    <div class="col-sm-12">
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><label class="center-block">Please fill out below details</label></div>
            <div class="col-sm-4"></div>

        </div>
        <hr>
        <div class="form-group col-sm-6">
            <div class="well">
                <div class="text-primary"> <p>Adhar Details</p></div>
                <div class="input-group ">
                <span class="input-group-addon"><label>Adhar Card Front</label></span>
                <input required class="form-control" type="file" name="adharF" value="<?php echo set_value('adharF');?>" >
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Adhar Card Back</label></span>
                <input required class="form-control" type="file" name="adharB" value="<?php echo set_value('adharB');?>" >
            </div>

            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Adhar Number</label></span>
                <input required class="form-control" type="text" name="adharNumber" value="<?php echo set_value('adharNumber');?>" placeholder="Adhar Number" minlength="12" maxlength="12">
            </div>
            </div>

           <div class="well">
               <div class="text-primary"> <p>College Details</p></div>

               <div class="input-group">
                <span class="input-group-addon"><label>College Id</label></span>
                <input required class="form-control" type="file" name="collegeId" value="<?php echo set_value('collegeId');?>" >
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Roll Number</label></span>
                <input required class="form-control" type="text" name="rollNumber" value="<?php echo set_value('rollNumber');?>" >
            </div>
           </div>

        </div>

        <div class="form-group col-sm-6">
            <div class="well">
                <div class="text-primary"> <p>Pan Card Details</p></div>


                <div class="input-group">
                    <span class="input-group-addon notRequird"><label>Pan Card</label></span>
                    <input class="form-control" type="file" name="panCard" value="<?php echo set_value('panCard');?>" >
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon notRequird"><label>Pan Number</label></span>
                    <input class="form-control" type="text" name="panNumber" value="<?php echo set_value('panNumber');?>" placeholder="Pan Number" minlength="10" maxlength="10">
                </div>
            </div>
            <div class="well">
                <div class="text-primary"> <p>Bank Details</p></div>


            <div class="input-group">
                <span class="input-group-addon"><label>Last Month Bank Statement</label></span>
                <input required class="form-control" type="file" name="bankStatement" value="<?php echo set_value('bankStatement');?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Name on Bank Account</label></span>
                <input required class="form-control" type="text" name="nameOnBank" value="<?php echo set_value('nameOnBank');?>" placeholder="Name on Bank Account">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Bank Name</label></span>
                <input required class="form-control" type="text" name="bankName" value="<?php echo set_value('bankName');?>" placeholder="Bank Name" >
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Branch Name</label></span>
                <input required class="form-control" type="text" name="branchName" value="<?php echo set_value('branchName');?>" placeholder="Branch Name" >
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon"><label>IFSC Code</label></span>
                <input required class="form-control" type="text" name="ifscCode" value="<?php echo set_value('ifscCode');?>" placeholder="IFSC Code" >
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><label>Account Number</label></span>
                <input required class="form-control" type="text" name="accountNumber" value="<?php echo set_value('accountNumber');?>" placeholder="Account Number" >
            </div>
            </div>
        </div>
        <div class="col-sm-12">
            <input type="hidden" value="<?php echo $this->session->userdata['userId'];?>" name="user_id">
            <button type="submit" value="upload" class="btn btn-primary center-block">submit</button>
        </div>
    </div>
    </form>
</div>


