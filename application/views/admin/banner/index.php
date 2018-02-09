<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="validation()">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Banner <small>Slider Image</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Banner</li>
        </ol>
    </section>
    <!-- Content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banner Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" name="button" class="btn btn-primary"><i class="fa fa-plus"></i> Insert new banner</button>
                        <table id="table1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Banner Title</th>
                                    <th>Banner Subtitle</th>
                                    <th>Banner Image</th>
                                    <th>Banner Status</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
function callInsert()
{
    document.getElementById("modal-title").innerHTML="Insert New Banner";
    $.ajax({
        url: "<?php echo base_url();?>admin/banner/open_insert"
    }).done(function( html ) {
        $(".modal-body").html(html);
    });
    $('#modal-default').modal('show');
}

function callUpdate(var_id)
{
    document.getElementById("modal-title").innerHTML="Update Banner";
    $.ajax({
        url: "<?php echo base_url();?>admin/banner/open_update/"+var_id
    }).done(function( html ) {
        $(".modal-body").html(html);
    });
    $('#modal-default').modal('show');
}

function callDelete(var_id)
{
    bootbox.confirm("Are you sure want to delete ?", function(result) {
        if(result){
            window.location.href="<?php echo base_url();?>admin/banner/delete/"+var_id
        }
    });
}

</script>
