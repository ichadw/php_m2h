<?php include('base/header.php');?>
   <!--Body-->
    <section id="channeldetail" class="channelbg">
    <div class="overlay1"></div>
    <div class="overlay2"></div>
    	<div class="container">
    		<div class="headerpage">
    			<i class="fa fa-circle "></i>&nbsp methodist -2 hawks channel &nbsp<i class="fa fa-circle"></i>
    		</div>
            <div class="tvstreaming">
                <iframe id="video" src= 'https://www.youtube.com/embed/RIZKCaWyxns' width="100%" class="rounded"></iframe>
                <!-- <div class="overlay1"></div> -->
                <!-- <div class="container-btn">
                    <a class="btn btn-xl js-scroll-trigger" href="" id="play-video">TV STREAMING</a>
                </div> -->
            </div>
            <div class="btnserver">
                <a class="btn btn-xl js-scroll-trigger nopadding" href="#">SERVER 1</a>
                <a class="btn btn-xl js-scroll-trigger nopadding" href="#">SERVER 2</a>
            </div>
            <div class="channeltext">latest video</div>
            <div class="row imgrow" style="margin-top: 10px;">
              <?php foreach($content_channel as $key => $channel){?>
                <div class="col-xs-12 col-sm-1-5 col-lg-2-5" style="padding-right: 5px; padding-bottom: 10px;">
                    <iframe id="video" width="100%" src="<?=$channel->url_video?>"></iframe>
                </div>
              <?php }?>
            </div>
		</div>
	</section>

<?php include("base/footer.php");?>

<script type="text/javascript">
$(document).ready(function() {
  $('#play-video').on('click', function(ev) {

    $("#video")[0].src += "&autoplay=1";
    ev.preventDefault();

  });
});

</script>
