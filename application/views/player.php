<?php include('base/header.php');?>
<!--Body-->
<section id="teamdetail"  class="teambg">
	<div class="overlay1"></div>
	<div class="overlay2"></div>
	<div class="container">
		<div class="headerpage">
			<i class="fa fa-circle "></i>&nbsp methodist -2 hawks player &nbsp<i class="fa fa-circle"></i>
		</div>
		<div class="row">
			<div class="col-md-1 col1 nopadding">
				<ul class="player-bar" id="cf7_controls">
					<?php foreach($content_player as $key => $player){?>
						<li class="nav-item <?=$key == 0 ? 'selected': '' ?>">
							<a id='player-<?=$key?>'><img src="<?=base_url('assets/img/page3/'.$player->thumbnail);?>"></a>
						</li>
					<?php }?>
				</ul>
			</div>
			<div class="col-md-11 col2"  id="cf7">
				<?php foreach($content_player as $key => $player){?>
				<!--Start Row-->
				<div class="row <?php if($key == 0) echo 'opaque'; ?> ">
					<div class="col-md-6">
						<img src="<?=base_url('assets/img/page3/'.$player->photo);?>">
						<table>
							<tr>
								<th>AGE</th>
								<th>HEIGHT</th>
								<th>WEIGHT</th>
							</tr>
							<tr>
								<td><?= $player->age?></td>
								<td><?= $player->height?></td>
								<td><?= $player->weight?></td>
							</tr>
							<tr>
								<td><div class="hrdetails"></div></td>
								<td><div class="hrdetails"></div></td>
								<td><div class="hrdetails"></div></td>
							</tr>
						</table>
					</div>
					<div class="col-md-5">
						<div class="playerdetail">
							<h6 class="headername">Player Name</h6>
							<h2 class="playername"><?= $player->name?></h2>
							<div class="hrname"> </div>
							<h6 class="biodata">BIODATA</h6>
							<div class="biodatabody"><?= $player->description?></div>
						</div>
						<div class="box">
							<canvas id="marksChart-<?=$key?>" width="100" height="50"></canvas>
						</div>
					</div>
				</div>
				<!--End Row-->

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

					var marksCanvas = document.getElementById("marksChart-<?=$key?>");

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
			</div>
		</div>
		<!-- <div class="scroll-bar">
			<a href="#"><i class="fa fa-caret-up"></i></a>
			<a href="#"><i class="fa fa-caret-down"></i></a>
		</div> -->
	</div>
</section>
<?php include("base/footer.php");?>
