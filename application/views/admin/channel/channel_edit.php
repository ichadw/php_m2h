<div class="content-wrapper">
	<section class="content-header">
		<h1>Edit Channel</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Channel</li>
        </ol>
	</section>
	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header"></div>
			<div class="box-body">
	      <div class="row">
	        <div class="col-md-12">
	          <form class="form" method="post" enctype="multipart/form-data">
              <div class="box-body" id="channel">
              		<?php if(isset($success) && $success!=null) { ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $success?></div> <?php } ?>
              		<?php if(isset($error) && $error!=null) { ?><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $error?></div> <?php } ?>
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?=$contents_channel->title?>">
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="description" name="description" rows="10" cols="30">
                        <?=$contents_channel->description ?>
                    	</textarea>
                  </div>
                  <div class="form-group">
                      <label for="url_video">Url Video</label>
                      <input type="text" class="form-control" id="url_video" name="url_video" value="<?=$contents_channel->url_video?>">
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

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="description"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description');
  });
</script>