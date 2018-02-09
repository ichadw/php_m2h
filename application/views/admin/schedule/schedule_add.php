<div class="content-wrapper">
	<section class="content-header">
		<h1>Add Schedule</h1>
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
                    <select class="form-control" id="home_name" name="home_name">
                      <?php foreach($content_schedule as $key => $content){ 
                          echo '<option value="'.$content->id.'">'.$content->name.'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="away_name">Away Team</label>
                    <select class="form-control" id="away_name" name="away_name">
                      <?php foreach($content_schedule as $key => $content){ 
                          echo '<option value="'.$content->id.'">'.$content->name.'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="home_score"> Home Score</label>
                    <input type="text" class="form-control" id="home_score" name="home_score" placeholder="Leave it empty if match not started yet">
                </div>
                <div class="form-group">
                    <label for="away_score">Away Score</label>
                    <input type="text" class="form-control" id="away_score" name="away_score" placeholder="Leave it empty if match not started yet">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
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


