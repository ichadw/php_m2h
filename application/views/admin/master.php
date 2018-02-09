<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hawks | <?php echo $page_title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="icon" type="image/png" href="<?= base_url ('assets/img/hawks_ico.png');?>"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/skins/skin-blue.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/custom.css">

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-3/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/admin/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/admin/js/app.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/chartjs/Chart.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- bootbox -->
    <script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="<?php echo base_url();?>admin/dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>H</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>HAWKS</b> Admin</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li><span>Welcome, <?php echo $this->session->userdata('username');?></span></li>
                        <li><a href="<?php echo base_url().'admin/logout';?>">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <li <?php if($this->uri->rsegment(1) == 'dashboard') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'slider') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/slider"><i class="fa fa-image"></i> <span>Home Slider</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'news') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/news"><i class="fa fa-newspaper-o"></i> <span>News</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'schedule') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/schedule"><i class="fa fa-calendar"></i> <span>Schedule</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'team') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/team"><i class="fa fa-users"></i> <span>Team</span></a>
                    </li>
                    <li class="treeview <?= $this->uri->rsegment(1) == 'products' || $this->uri->rsegment(1) == 'invoices' ? 'active menu-open' : '';?>">
                      <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Store</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li <?php if($this->uri->rsegment(1) == 'products') echo 'class="active"';?>><a href="<?php echo base_url()?>admin/products"><i class="fa fa-circle-o"></i> Products</a></li>
                        <li <?php if($this->uri->rsegment(1) == 'invoices') echo 'class="active"';?>><a href="<?php echo base_url()?>admin/invoices"><i class="fa fa-circle-o"></i> Invoices</a></li>
                      </ul>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'channel') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/channel"><i class="fa fa-link"></i> <span>Channel</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'player') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/player"><i class="fa fa-id-card"></i> <span>Player</span></a>
                    </li>
                    <li <?php if($this->uri->rsegment(1) == 'user') echo 'class="active"';?>>
                        <a href="<?php echo base_url()?>admin/user"><i class="fa fa-user-circle"></i> <span>User</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content -->
        <?php if(isset($content_for_layout)) { ?>
            <?php echo $content_for_layout; ?>
        <?php } ?>
        <!-- End Content -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2017 <a href="http://lumi-one.com">LumiOne</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
    </script>
</body>
</html>
