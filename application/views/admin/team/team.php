<div class="content-wrapper">
	<section class="content-header">
		<h1>Team <small>List of Team</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Team</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/team/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Team</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="team" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Team Name</th>
                          <th>Logo</th>
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
				$('#team').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax":{
						"url": "<?php echo base_url('admin/team/get_datatable') ?>",
						"dataType": "json",
						"type": "POST",
					},
					"columns": [
						{ "data": "name" },
						{ "data": null, render: function(data){ return '<img src="<?=base_url('assets/img/page4/')?>'+data.image+'" width=100/>';} },
						{ "data": "edit" },
					],
					"columnDefs": [{
						"searchable" : false,
						"orderable" : false,
						"targets": [1]
					},],
				});
			});

      function team_delete(id, name){
	        bootbox.confirm("You are about to delete <b>"+name+",</b> continue?", function(result) {
	            if (result) {
	              location.href = '<?=base_url('admin/team/delete')?>/'+id;
	            }
	        });
      }
		</script>
