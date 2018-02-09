<?php include('base/header.php');?>
<section id="login" class="storebg">
  <div class="overlay1"></div>
  <div class="overlay2"></div>
	<div class="row">
		<div class="col-md-6 mx-auto">
      <div class="panel panel-default">
		<div class="panel-heading">
          <h4>Login</h4>
        </div>
        <div><?=$this->session->flashdata('error')?></div>
			<?=form_open('login', ['class'=>'form-horizontal'])?>
			  <div class="form-group">
					<label for="inputEmail3" class="col-sm-12 col-md-6 control-label">Email</label>
					<div class="col-sm-10">
					  <input type="email" class="form-control" name="email" placeholder="Enter your email">
					</div>
			  </div>
			  <div class="form-group">
					<label for="inputPassword3" class="col-sm-12 col-md-6 control-label">Password</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" name="password" placeholder="Enter password">
					</div>
			  </div>
			  <div class="form-group">
					<div class="col-sm-10">
					  <div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					  </div>
					</div>
          <div class="col-sm-10">
            Not having account yet? <a href="<?= base_url()?>signup"> Register here!</a>
          </div>
			  </div>
				<div class="text-red"><?=validation_errors()?></div>
				  <div class="form-group center">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Sign in</button>
						</div>
				  </div>
				</form>
      </div>
		</div>
	</div>
</section>
<?php include("base/footer.php");?>
