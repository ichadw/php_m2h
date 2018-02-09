<div class="content-wrapper">
	<section class="content-header">
		<h1>Add News</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">News</li>
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
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                      <label for="slug">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" readonly>
                  </div>
                  <div class="form-group">
                      <label for="content">Content</label>
                      <textarea id="content" name="content" rows="10" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="thumbnail">Thumbnail</label>
                      <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                  </div>
                  <div class="form-group">
                     <label>Publish</label>
                      <?php
                        $publish = 0;
                        $options = array(
                          0 => 'No',
                          1 => 'Yes'
                                );
                        echo form_dropdown('publish', $options, $publish, " class='form-control' required='required'");
                      ?>
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
    CKEDITOR.replace('content');
  });
  $('#title').on('keyup', function(){
    var slug =  convertToSlug($('#title').val());
    $('#slug').val(slug);
  });
function convertToSlug(Text){
  return Text
    .toLowerCase()
    .replace(/ /g,'-')
    .replace(/[^\w-]+/g,'')
    ;
}
</script>
