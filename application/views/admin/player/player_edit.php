<div class="content-wrapper">
	<section class="content-header">
		<h1>Edit Player</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Player</li>
        </ol>
	</section>
	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header"></div>
			<div class="box-body">
	      <div class="row">
	        <div class="col-md-12">
	          <form class="form" method="post" enctype="multipart/form-data">
              <div class="box-body" id="player">
              		<?php if(isset($success) && $success!=null) { ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $success?></div> <?php } ?>
              		<?php if(isset($error) && $error!=null) { ?><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><?= $error?></div> <?php } ?>
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?=$contents_player->name?>" required>
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="description" name="description" rows="10" cols="80" required>
                         <?=$contents_player->description ?>
                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="photo">Photo</label>
                      <img src="<?=base_url('assets/img/page3/'.$contents_player->photo)?>"/>
                      <input type="file" class="form-control" id="photo" name="photo">
                  </div>
                  <div class="form-group">
                      <label for="attack">Attack</label>
                      <input type="text" class="form-control" id="attack" name="attack" placeholder="Enter attack" value="<?=$contents_player->attack?>" required>
                  </div>
                  <div class="form-group">
                      <label for="technic">Technic</label>
                      <input type="text" class="form-control" id="technic" name="technic" placeholder="Enter technic" value="<?=$contents_player->technic?>" required>
                  </div>
                  <div class="form-group">
                      <label for="stamina">Stamina</label>
                      <input type="text" class="form-control" id="stamina" name="stamina" placeholder="Enter stamina" value="<?=$contents_player->stamina?>" required>
                  </div>
                  <div class="form-group">
                      <label for="defense">Defense</label>
                      <input type="text" class="form-control" id="defense" name="defense" placeholder="Enter defense" value="<?=$contents_player->defense?>" required>
                  </div>
                  <div class="form-group">
                      <label for="power">Power</label>
                      <input type="text" class="form-control" id="power" name="power" placeholder="Enter power" value="<?=$contents_player->power?>" required>
                  </div>
                  <div class="form-group">
                      <label for="speed">Speed</label>
                      <input type="text" class="form-control" id="speed" name="speed" placeholder="Enter speed" value="<?=$contents_player->speed?>" required>
                  </div>
                  <div class="form-group">
                      <label for="age">Age</label>
                      <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" value="<?=$contents_player->age?>" required>
                  </div>
                  <div class="form-group">
                      <label for="weight">Weight</label>
                      <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight" value="<?=$contents_player->weight?>" required>
                  </div>
                  <div class="form-group">
                      <label for="height">Height</label>
                      <input type="text" class="form-control" id="height" name="height" placeholder="Enter height" value="<?=$contents_player->height?>" required>
                  </div>
                  <div class="form-group">
                      <label for="thumbnail">Thumbnail</label>
                      <img src="<?=base_url('assets/img/page3/'.$contents_player->thumbnail)?>"/>
                      <input type="file" class="form-control" id="thumbnail" name="thumbnail"/>
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