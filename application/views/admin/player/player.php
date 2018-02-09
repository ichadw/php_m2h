<div class="content-wrapper">
	<section class="content-header">
		<h1>Player <small>List of Player</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Player</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/player/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Player</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="player" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Name</th>
                          <th>Attack</th>
                          <th>Technic</th>
                          <th>Stamina</th>
                          <th>Defense</th>
                          <th>Power</th>
                          <th>Speed</th>
                          <th>Age</th>
                          <th>Weight</th>
                          <th>Height</th>
                          <th>Thumbnail</th>
                          <th width="80">Action</th>
	                      </tr>
	                  </thead>
	                  <tbody></tbody>
	              </table>
	          </div>
	      </div>
			</div>
		</div>
	</section>
</div>

		<script type="text/javascript">

			$(document).ready(function () {
				$('#player').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax":{
						"url": "<?php echo base_url('admin/player/get_datatable') ?>",
						"dataType": "json",
						"type": "POST",
					},
					"columns": [
						{ "data": "name" },
						{ "data": "attack" },
						{ "data": "technic" },
						{ "data": "stamina" },
						{ "data": "defense" },
						{ "data": "power" },
						{ "data": "speed" },
						{ "data": "age" },
						{ "data": "weight" },
						{ "data": "height" },
						{ "data": null, render: function(data){ return '<img src="<?=base_url('assets/img/page3/')?>'+data.thumbnail+'" width=100/>';} },
						{ "data": "edit" },
					],
					"columnDefs": [{
						"searchable" : false,
						"orderable" : false,
						"targets": [1,10,11]
					},],
				});
			});

      function player_delete(id, title){
	        bootbox.confirm("You are about to delete <b>"+title+",</b> continue?", function(result) {
	            if (result) {
	              location.href = '<?=base_url('admin/player/delete')?>/'+id;
	            }
	        });
      }
		</script>
