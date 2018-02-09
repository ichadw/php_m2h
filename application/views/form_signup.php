<?php include('base/header.php');?>
<section id="Signup" class="storebg">
<div class="overlay1"></div>
  <div class="overlay2"></div>
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>User Registration Form</h4>
        </div>
        <div class="panel-body">
          <?=form_open('signup', ['class'=>'form-horizontal'])?>
          <div class="form-group">
            <label for="name">First Name</label>
            <input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo set_value('fname'); ?>" />
            <span class="text-danger"><?php echo form_error('fname'); ?></span>
          </div>

          <div class="form-group">
            <label for="name">Last Name</label>
            <input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
            <span class="text-danger"><?php echo form_error('lname'); ?></span>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="10" cols="64" placeholder="Address"><?php echo set_value('address'); ?></textarea>
          </div>

          <div class="form-group">
            <label for="phone_numb">Phone Number</label>
            <input class="form-control" name="phone_numb" placeholder="Phone Number" type="text" value="<?php echo set_value('phone_numb'); ?>" />
            <span class="text-danger"><?php echo form_error('phone_numb'); ?></span>
          </div>

          <div class="form-group">
            <label for="subject">Password</label>
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>

          <div class="form-group">
            <label for="subject">Confirm Password</label>
            <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
            <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
          </div>
           <div class="col-sm-10 nopadding">
            Already have an account? <a href="<?= base_url()?>Login"> Login here!</a>
          </div>
          <div class="form-group center">
            <button name="submit" type="submit" class="btn btn-default">Signup</button>
            <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
          </div>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php include('base/footer.php');?>
