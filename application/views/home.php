<?php include 'base/header.php';?>

<!-- Header -->
<header id="home" class="masthead">
  <div id="carouselExampleIndicators" class="carousel slide bxslider">
    <?php foreach($content_slider as $key => $slider){?>
      <div class="carousel-item" style="background-image: url(<?=base_url('assets/img/page1/'.$slider->background)?>); background-size: cover;">
        <div class="overlay"></div>
        <div class="carousel-caption d-md-block intro-text">
          <h3 class="intro-heading"><?=$slider->title?></h3>
          <p class="intro-lead-in"><?=$slider->description?></p>
          <div class="container-btn">
            <a class="btn btn-xl" href="<?=$slider->url?>" target="_new">Read More</a>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
</header>

<!--News-->
<section id="news">
  <div class="container-fluid">
    <div class="row">
      <?php foreach($content_news as $key => $news){ ?>
        <div class="col-md-4 news-item">
          <a class="news-link" href="<?=base_url('newsfeed/'.$news->slug)?>">
            <img class="img-fluid" src="assets/img/page1/homebg1_smallpic1.png" alt="">
            <div class="newsdetails">
              <div class="header-newsdetail">NEWS</div>
              <div class="body-newsdetail"><?=$news->title?></div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Schedule -->
<section id="schedule">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">OUR MATCHES</div>
      </div>
    </div>
    <div class="shadow">
      <!--Start Row-->
      <div class="row text-center opaque1">
        <?php foreach($content_matches as $key => $match){ ?>
          <div class="col-lg-4 yborder"><a href="<?=base_url('schedule')?>">
            <table width="100%" class="tablematch">
              <tbody>
                <tr>
                  <td><img src="<?=base_url()?>/assets/img/page4/<?=$match->home_image?>"></td>
                  <td><b>VS</b></td>
                  <td><img src="<?=base_url()?>/assets/img/page4/<?=$match->away_image?>"></td>
                </tr>
                <tr>
                  <td><?=$match->home_score?></td>
                  <td></td>
                  <td><?=$match->away_score?></td>
                </tr>
                <tr>
                  <td colspan="3" style="padding-top:20px">
                    <span class="info">
                      <?php
                      $date = date('Y-m-d', strtotime($match->date));
                      if($date < date('Y-m-d')) echo 'COMPLETE MATCH';
                      else if($date == date('Y-m-d')) echo 'TODAY MATCH';
                      else echo 'NEXT MATCH';
                      ?>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="padding-top: 10px">
                    <span class="date"><?=date('d F Y', strtotime($match->date))?></span>
                  </td>
                </tr>
              </tbody>
            </table></a>
          </div>
        <?php } ?>
      </div>
      <!--End Row-->
    </div>

  </div>
</section>

<!-- Team Grid -->
<section id="team">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 text-left">
        <div class="section-heading nopadding"><p class="letter">TEAM </br> PLAYER</br> IDENTITY</p></div>
      </div>
      <div class="col-lg-8" style="background-color: #01234e">
        <ul class="player-bar" id="cf7_controls" style="list-style-type: none; align-content: center">
          <?php foreach($content_players as $key => $player){?>
            <li class="nav-item <?=$key == 0 ? 'selected': '' ?>">
              <a id='player-<?=$key?>'><img src="<?=base_url('assets/img/page3/'.$player->thumbnail)?>"></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="cf7">
    <!-- Start row -->
    <?php foreach($content_players as $key => $player){?>
      <div class="row <?=$key == 0 ? 'opaque': '' ?>">
        <div class="col-lg-4 text-left nopadding shadow">
          <img src="<?=base_url('assets/img/page3/'.$player->photo);?>" style="width: 100%">
        </div>
        <div class="col-lg-3 text-left" style="background-color: #01234e">
          <div class="playerdetail">
            <h6 class="headername">Player Name</h6>
            <h2 class="playername"><?=$player->name?></h2>
            <div class="hrname"> </div>
            <h6 class="biodata">BIODATA</h6>
            <div class="biodatabody"><?= $player->description?></div>
            <a href="<?=base_url('player')?>">
              <div class="next-page" style="text-align: left">Learn More >></div>
            </a>
          </div>
        </div>
        <div class="col-lg-5 homebg3 nopadding">
          <div class="overlay1"></div>
          <canvas id="marksChart<?=$key?>" width="100" height="50" style="margin-top: 100px; position: relative; z-index: 1001;"></canvas>
          <center>
            <table>
              <tr>
                <th width="100px">AGE</th>
                <th width="100px">HEIGHT</th>
                <th width="100px">WEIGHT</th>
              </tr>
              <tr style="color: #d4d523; font-size: 30px;">
                <td><?=$player->age?></td>
                <td><?=$player->height?></td>
                <td><?=$player->weight?></td>
              </tr>
              <tr>
                <td><div class="hrdetails"></div></td>
                <td><div class="hrdetails"></div></td>
                <td><div class="hrdetails"></div></td>
              </tr>
            </table>
          </center>
        </div>
      </div>

      <script type="text/javascript">
        Chart.defaults.global.defaultFontSize = 20;
        Chart.defaults.global.defaultFontColor = '#fff';

        var chartOptions = {
          scale: {
            ticks: {
              display: false
            }
          },
          legend: {
            display: false
          }
        };

        var marksCanvas = document.getElementById("marksChart<?=$key?>");

        var marksData = {
          labels: ["ATT", "TEC", "STA", "DEF", "POW", "SPD"],
          datasets: [{
            label: "<?=$player->name?>",
            backgroundColor: "rgba(196,197,76,0.6)",
            borderColor: "rgba(212,213,35,1)",
            fill: true,
            radius: 1,
            pointHoverRadius: 5,
            data: [<?= $player->attack?>, <?= $player->technic?>, <?= $player->stamina?>, <?= $player->defense?>, <?= $player->power?>, <?= $player->speed?>]
          }, {
            label: "Full",

            backgroundColor: "rgba(1,35,78,0.5)",
            // borderColor: "rgba(1,35,78,0.8)",
            fill: true,
            radius: -1,
            data: [100, 100, 100, 100, 100, 100]
          }]
        };

        var radarChart = new Chart(marksCanvas, {
          type: 'radar',
          data: marksData,
          options: chartOptions
        });
      </script>
    <?php } ?>
    <!-- End row -->
  </div>
</section>

<!-- Store -->
<section id="store" class="homebg4" style="margin-top: -10px;">
  <div class="overlay"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6"></div>
      <div class="productdetail col-md-3">
        <div class="bgproduct">
          <a href="<?=base_url('channel')?>?category=costume">
            <img src="assets/img/page1/homebg4_uni1.png">
            <h6 class="next-page2">Costume >></h6>
          </a>
        </div>
      </div>
      <div class="productdetail col-md-3">
        <div class="bgproduct">
          <a href="<?=base_url('channel')?>?category=accessories">
            <img src="assets/img/page1/homebg4_uni2.png">
            <h6 class="next-page2">Accessories >></h6>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Channel-->
<section id="channel">
  <div class="container-fluid">
    <div class="row">
      <?php foreach($content_videos as $key => $videos){ ?>
        <div class="col-md-4 nopadding columns-img" style="background-image: url('assets/img/page1/homebg4_smallpic.png');">
          <div class="channeldetails">
            <div class="header-channeldetail">LATEST VIDEO</div>
            <div class="body-channeldetail"><?=$videos->title?></div>
          </div>
          <a class="channel-link" href="<?=$videos->url_video?>" target="_new"></a>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-md-12 streambg nopadding">
        <div class="overlay"></div>
        <div class="container-btn">
          <a class="btn btn-xl" href="<?=base_url('channel')?>">TV Streaming</a>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
$(function(){
  $('.bxslider').bxSlider({
    mode: 'fade',
    infiniteloop: true,
    speed: 2000,
    auto: true
  });
});
</script>
<?php include("base/footer.php");?>
