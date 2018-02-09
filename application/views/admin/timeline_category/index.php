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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Timeline Category</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Timeline Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Timeline Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-success" onclick="callInsert();" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Insert New Category</a>
                        <table id="table_category" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Timeline Category Name</th>
                                    <th>Timeline Category Icon</th>
                                    <th>Status</th>
                                    <th width="120">Update</th>
                                    <th width="120">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contents as $content) {
                                    echo '<tr>';
                                    echo '<td>'.$content->timeline_category_name.'</td>';
                                    echo '<td><i class="fa '.$content->timeline_category_icon.' fa-2x"></i></td>';
                                    if($content->status == 0) echo '<td>Non Active</td>';
                                    else echo '<td>Active</td>';
                                    echo '<td><a class="btn btn-primary" onclick="callUpdate('.$content->timeline_category_id.')"><i class="fa fa-pencil"></i> Update</a></td>';
                                    echo '<td><a class="btn btn-danger" onclick="callDelete('.$content->timeline_category_id.')"><i class="fa fa-remove"></i> Delete</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
function callInsert()
{
    document.getElementById("modal-title").innerHTML="Insert Timeline Category";
    $.ajax({
        url: "<?php echo base_url();?>admin/timeline_category/open_insert"
    }).done(function( html ) {
        $(".modal-body").html(html);
    });
    $('#modal-default').modal('show');
}

function callUpdate(var_id)
{
    document.getElementById("modal-title").innerHTML="Update Timeline Category";
    $.ajax({
        url: "<?php echo base_url();?>admin/timeline_category/open_update/"+var_id
    }).done(function( html ) {
        $(".modal-body").html(html);
    });
    $('#modal-default').modal('show');
}

function callDelete(var_id)
{
    bootbox.confirm("Are you sure want to delete ?", function(result) {
        if(result){
            window.location.href="<?php echo base_url();?>admin/timeline_category/delete/"+var_id
        }
    });
}

</script>
