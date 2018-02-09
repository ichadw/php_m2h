<div class="content-wrapper">
	<section class="content-header">
		<h1>User <small>List of User</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/user/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="user" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th>Username</th>
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
	$('#user').DataTable({
	"processing": true,
	"serverSide": true,
	"ajax":{
		"url": "<?php echo base_url('admin/user/get_datatable') ?>",
		"dataType": "json",
		"type": "POST",
	},
	"columns": [
		{ "data": "username" },
		{ "data": "edit" },
	],
	"columnDefs": [{
		"searchable" : false,
		"orderable" : false,
		"targets": [1]
	},],
	});

	// $('#user tbody a#del.btn.btn-sm.btn-danger[id='1']').css('display', 'none');
	// function hide_button($id){
	// 	if(id == 1){
	//   		document.getElementById('del').style.visibility ='hidden';
	//   	}
	// }
});

window.onload= function(btn){
	var btn = document.getElementById('del').visibility = 'hidden';
	console.log(123);
}

function user_delete(id, username){
	bootbox.confirm("You are about to delete <b>"+username+",</b> continue?", function(result) {
	if (result) {
	location.href = '<?=base_url('admin/user/delete')?>/'+id;
	}
	});
}

</script>


