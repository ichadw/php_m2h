<div class="content-wrapper">
	<section class="content-header">
		<h1>Edit Schedule</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Schedule</li>
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
                      <label for="home_name">Home Team</label>
                      <input type="text" class="form-control" id="home_name" name="home_name" placeholder="Enter Home Team" value="<?=$content_schedule->home_name?>" readonly>
                  </div>
                  <div class="form-group">
                      <label for="away_name">Away Team</label>
                      <input type="text" class="form-control" id="away_name" name="away_name" placeholder="Enter Away Team" value="<?=$content_schedule->away_name?>" readonly>
                  </div>
                  <div class="form-group">
                      <label for="home_score">Home Score</label>
                      <input type="text" class="form-control" id="home_score" name="home_score" placeholder="Enter Home Score" value="<?=$content_schedule->home_score?>" required>
                  </div>
                  <div class="form-group">
                      <label for="away_score">Away Score</label>
                      <input type="text" class="form-control" id="away_score" name="away_score" placeholder="Enter Away Score" value="<?=$content_schedule->away_score?>" required>
                  </div>
                  <div class="form-group">
                      <label for="date">Date</label>
                      <input type="date" class="form-control" id="date" name="date" value="<?=$content_schedule->date?>">
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