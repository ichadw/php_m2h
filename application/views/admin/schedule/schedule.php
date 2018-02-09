<div class="content-wrapper">
	<section class="content-header">
		<h1>Schedule <small>List of Schedule</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Schedule</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/schedule/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Schedule</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
          <div class="col-md-12">
	          <table class="table table-bordered table-hover dataTable" id="schedule" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Home Team</th>
                  <th>Away Team</th>
                  <th>Score Home Team</th>
                  <th>Score Away Team</th>
                  <th>Date of Match</th>
                  <th width="80">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($content_schedule as $key => $schedule){ ?>
              	<tr>
              		<td><?= $schedule->home_name;?></td>
              		<td><?= $schedule->away_name;?></td>
              		<td><?= $schedule->home_score;?></td>
              		<td><?= $schedule->away_score;?></td>
              		<td><?= date('d F Y', strtotime($schedule->date))?></td>
              		<td><a href="<?=base_url('admin/schedule/edit/'.$schedule->id) ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a> <a class="btn btn-sm btn-danger" id="del" onclick="schedule_delete('<?=base_url('admin/schedule/delete/'.$schedule->id)?>')"><i class="fa fa-times"></i></a></td>
              	</tr>
              <?php }?>
              </tbody>
	          </table>
          </div>
	      </div>
			</div>
		</div>
	</section>
</div>

		<script type="text/javascript">

			$(document).ready(function () {
				$('#schedule').dataTable({
					"columns": [
						{ "data": "home_name" },
						{ "data": "away_name" },
						{ "data": "home_score" },
						{ "data": "away_score" },
						{ "data": "date" },
						{ "data": "edit" },
					],
					"columnDefs": [{
						"searchable" : false,
						"orderable" : false,
						"targets": [2,3,5]
					},],
					"order": [[ 4, "desc" ]]
				});
			});

      function schedule_delete(id){
	        bootbox.confirm("You are about to delete this schedule. Continue?", function(result) {
	            if (result) {
	              location.href = '<?=base_url('admin/schedule/delete')?>/'+id;
	            }
	        });
      }
		</script>
