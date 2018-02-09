<div class="content-wrapper">
	<section class="content-header">
		<h1>Add/Edit User</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User</li>
        </ol>
	</section>
	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header"></div>
			<div class="box-body">
	      <div class="row">
	        <div class="col-md-12">
	          <form class="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
              		<?php if(isset($success) && $success!=null) { ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $success?></div> <?php } ?>
              		<?php if(isset($error) && $error!=null) { ?><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $error?></div> <?php } ?>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                      <label for="password"> Confirm Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Confirm Password" required>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
	        </div>
	      </div>
			</div>
		</div>
	</section>
</div>

<!--Script-->
<script src="{{ base_url() }}assets/admin/js/user/user-addedit-handler.js"></script>
<script>
  var addEdit = UsersAddEditHandler.createIt({
    baseUrl: '{{ base_url() }}'
  });
  
  addEdit.init();
</script>