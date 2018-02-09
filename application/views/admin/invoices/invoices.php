<div class="content-wrapper">
	<section class="content-header">
		<h1>Invoices <small>List of Invoices</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Invoices</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
		<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="invoices" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>ID</th>
                          <th>Date</th>
                          <th>Due Date</th>
                          <th>Status</th>
                          <th>Action</th>
	                      </tr>
	                  </thead>
	                  <tbody style="width: 100%"></tbody>
	              </table>
	          </div>
	      </div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">

	$(document).ready(function () {
		$('#invoices').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "<?php echo base_url('admin/invoices/get_datatable') ?>",
				"dataType": "json",
				"type": "POST",
			},
			"columns": [
				{ "data": "id" },
				{ "data": "date" },
				{ "data": "due_date" },
				{ "data": "status" },
				{ "data": "detail" },
			],
			"columnDefs": [{
				"searchable" : false,
				"orderable" : false,
				"targets": [4]
			},],
		});
	});

</script>
