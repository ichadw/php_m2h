<div class="content-wrapper">
	<section class="content-header">
		<h1>News <small>List of News</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">News</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/news/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add News</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="news" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Posting Date</th>
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
		$('#news').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "<?php echo base_url('admin/news/get_datatable') ?>",
				"dataType": "json",
				"type": "POST",
			},
			"columns": [
				{ "data": "title" },
				{ "data": "author" },
				{ "data": "timestamp" },
				{ "data": "publish" },
				{ "data": "edit" },
			],
			"columnDefs": [{
				"searchable" : false,
				"orderable" : false,
				"targets": [4]
			},],
		});
	});

function news_delete(id, title){
    bootbox.confirm("You are about to delete <b>"+title+",</b> continue?", function(result) {
        if (result) {
          location.href = '<?=base_url('admin/news/delete')?>/'+id;
        }
    });
}
</script>
