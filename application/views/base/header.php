<html>
	<head>
		<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		    <meta name="description" content="<?=$content_header->description;?>">
		    <meta name="author" content="<?=$content_header->author;?>">
        <meta name="keywords" content="<?=$content_header->keywords;?>">
        <link rel="icon" type="image/png" href="<?= base_url ('assets/img/'.$content_header->icon);?>"/>

		    <title><?=$content_header->title;?></title>

		    <!-- Bootstrap core CSS -->
		    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		    <!-- Custom fonts for this template -->
		    <link href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

		    <!-- Bootstrap core JavaScript -->
		    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
		    <script src="<?= base_url()?>assets/vendor/popper/popper.min.js"></script>
		    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

		    <!-- Plugin JavaScript -->
		    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

		    <!-- Contact form JavaScript -->
		    <script src="<?= base_url()?>assets/js/jqBootstrapValidation.js"></script>
		    <script src="<?= base_url()?>assets/js/contact_me.js"></script>

		    <!-- Custom scripts for this template -->
		    <script src="<?= base_url()?>assets/js/agency.js"></script>
		    <script src="<?= base_url()?>assets/js/Chart.min.js"></script>

        <!-- bxSlider -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.css">

		<!-- Custom styles for this template -->
		<link href="<?= base_url()?>assets/css/agency.css" rel="stylesheet">
		<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">

	</head>

	<body id="page-top">

		<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url()?>"><img src="<?= base_url()?>assets/img/header/hawks.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item <?=$this->uri->rsegment('1') == 'home' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>">HOME</a>
            </li>
            <li class="nav-item <?=$this->uri->rsegment('1') == 'news' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>news">NEWS</a>
            </li>
            <li class="nav-item <?=$this->uri->rsegment('1') == 'schedule' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>schedule">SCHEDULE</a>
            </li>
            <li class="nav-item <?=$this->uri->rsegment('1') == 'player' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>player">PLAYER</a>
            </li>
            <li class="nav-item <?=$this->uri->rsegment('1') == 'store' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>store">STORE</a>
            </li>
            <li class="nav-item <?=$this->uri->rsegment('1') == 'channel' ? 'active' : '' ?>">
              <a class="nav-link js-scroll-trigger" href="<?= base_url()?>channel">CHANNEL</a>
            </li>
            <?php if($this->session->userdata('email')) { ?>
              <li class="nav-item"><div class="login">Hello, <?=$this->session->userdata('fname')?></div></li>
			  <li class="nav-item"><?php echo anchor('logout', 'LOGOUT',['class'=>'nav-link js-scroll-trigger']);?></li>
            <?php } else { ?>
              <li class="nav-item <?=$this->uri->rsegment('1') == 'login' ? 'active' : '' ?>"><?php echo anchor('login', 'LOGIN',['class'=>'nav-link js-scroll-trigger']);?></li>
            <?php } ?>
            <!-- <li class="nav-item ">
                <form>
                    <div class="input-group dark" style="padding: 8px 0;">
                        <input type="text" class="form-control" placeholder="search...">
                        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
                    </div>
                </form>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
