<div class="content-wrapper">
	<section class="content-header">
		<h1>Edit Slider</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Slider</li>
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
  					  <label for="title">Title</label>
  					  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?=$contents_slider->title?>" required>
  				  </div>
  				  <div class="form-group">
  					  <label for="description">Description</label>
  					  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="<?=$contents_slider->description?>" required>
  				  </div>
  				  <div class="form-group">
  					  <label for="keywords">URL</label>
  					  <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL (if any)" value="<?=$contents_slider->url?>" required>
  				  </div>
  				  <div class="form-group">
  					  <label for="background">Background Image (Maks 3MB)</label>
  					  <img src="<?=base_url('assets/img/'.$contents_slider->background)?>">
  					  <input type="file" class="form-control" id="background" name="background">

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
