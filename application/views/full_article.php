<?php include('base/header.php');?>
<!--Body-->
<section id="newsdetail"  class="newsbg">
	<div class="overlay1"></div>
	<div class="overlay2"></div>
	<div class="container">
		<div class="headerpage">
			Ini Title 1
		</div>
		<div class="date"><?=date('d M Y',strtotime($news->date));?></div>
		<div>
			<?= $news->description?>
		</div>
	</div>
</section>
<?php include("base/footer.php");?>