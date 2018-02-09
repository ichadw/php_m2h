<div class="content-wrapper">
	<section class="content-header">
		<h1>Slider <small>List of Slider</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Slider</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/slider/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Slider</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="slider" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>URL</th>
                          <th>Background Image</th>
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
	$('#slider').DataTable({
	"processing": true,
	"serverSide": true,
	"ajax":{
		"url": "<?php echo base_url('admin/slider/get_datatable') ?>",
		"dataType": "json",
		"type": "POST",
	},
	"columns": [
		{ "data": "title" },
		{ "data": "description" },
		{ "data": "url" },
		{ "data": null, render: function(data){ return '<img src="<?=base_url('assets/img/page1/')?>'+data.background+'" width=100/>';} },
		{ "data": "edit" },
	],
	"columnDefs": [{
		"searchable" : false,
		"orderable" : false,
		"targets": [3,4]
	},],
	});

	// $('#user tbody a#del.btn.btn-sm.btn-danger[id='1']').css('display', 'none');
	// function hide_button($id){
	// 	if(id == 1){
	//   		document.getElementById('del').style.visibility ='hidden';
	//   	}
	// }
});

function slider_delete(id, title){
bootbox.confirm("You are about to delete <b>"+title+",</b> continue?", function(result) {
	if (result) {
	  location.href = '<?=base_url('admin/product/delete')?>/'+id;
	}
});
}

</script>
