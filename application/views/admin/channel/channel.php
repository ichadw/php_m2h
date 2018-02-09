<div class="content-wrapper">
	<section class="content-header">
		<h1>Channel <small>List of Channel</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Channel</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/channel/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Channel</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="channel" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Url</th>
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
				$('#channel').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax":{
						"url": "<?php echo base_url('admin/channel/get_datatable') ?>",
						"dataType": "json",
						"type": "POST",
					},
					"columns": [
						{ "data": "title" },
						{ "data": "description" },
						{ "data": "url_video" },
						{ "data": "edit" },
					],
					"columnDefs": [{
						"searchable" : false,
						"orderable" : false,
						"targets": [2,3]
					},],
				});
			});

      function channel_delete(id_video, title){
	        bootbox.confirm("You are about to delete <b>"+title+",</b> continue?", function(result) {
	            if (result) {
	              location.href = '<?=base_url('admin/channel/delete')?>/'+id_video;
	            }
	        });
      }
		</script>
