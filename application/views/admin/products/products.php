<div class="content-wrapper">
	<section class="content-header">
		<h1>Product <small>List of Product</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Product</li>
        </ol>
	</section>

	<section class="content">
	  <div class="box box-primary">
	  	<div class="box-header">
	  		<a href="<?= base_url('admin/products/add')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Product</a>
	  	</div>
			<div class="box-body">
	      <div class="row">
	          <div class="col-md-12">
	              <table class="table table-bordered table-hover dataTable" id="product" cellspacing="0" width="100%">
	                  <thead>
	                      <tr>
                          <th style="width: 10%;">Product Name</th>
                          <th style="width: 40%; overflow-x: auto; overflow-y: hidden;">Description</th>
                          <th style="width: 15%;">Price</th>
                          <th style="width: 15%;">Image</th>
                          <th style="width: 10%">Stock</th>
                          <th style="width: 10%">Action</th>
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
				$('#product').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax":{
						"url": "<?php echo base_url('admin/products/get_datatable') ?>",
						"dataType": "json",
						"type": "POST",
					},
					"columns": [
						{ "data": "name" },
						{ "data": "description" },
						{ "data": "price" },
						{ "data": null, render: function(data){ return '<img src="<?=base_url('assets/img/page5/')?>'+data.image+'" width=100/>';} },
						{ "data": "stock" },
						{ "data": "edit" },
					],
					"columnDefs": [{
						"searchable" : false,
						"orderable" : false,
						"targets": [3,5]
					},],
				});
			});

      function product_delete(id, title){
	        bootbox.confirm("You are about to delete <b>"+title+",</b> continue?", function(result) {
	            if (result) {
	              location.href = '<?=base_url('admin/product/delete')?>/'+id;
	            }
	        });
      }
		</script>
