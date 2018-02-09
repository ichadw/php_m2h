<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard <small>Home Content</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-8">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?=base_url('admin/dashboard/update_header')?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?=$contents_header->title?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="<?=$contents_header->description?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter Keywords" value="<?=$contents_header->keywords?>" required>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon (Maks 10KB)</label>
                                <img src="<?=base_url('assets/img/'.$contents_header->icon)?>">
                                <input type="file" class="form-control" id="icon" name="icon">

                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author" value="<?=$contents_header->author?>" required>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!--.col-->
        </div><!--.row-->
    </section>
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
</script>
