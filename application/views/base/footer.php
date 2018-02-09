	<footer class="nopadding">
		<div class="container-fluid">
			<div class="row footer">
				<ul class="list-inline sponsor-buttons">
					<?php foreach($content_sponsor as $key => $sponsor){?>
						<li class="list-inline-item"><img src="<?=base_url('assets/img/footer/'.$sponsor->icon);?>" title="<?=$sponsor->name;?>"></li>
					<?php } ?>
				</ul>
			</div>
			<div class="row footerbottom nopadding">
				<div class="col-md-10 col-sm-10">
					<span class="copyright">Copyright &copy;<?=date('Y')?> | All Right Reserved | Template Designed by <a href="http://www.lumi-one.com" target="_new"> LumiOne</a></span>
				</div>
				<div class="col-md-2 col-sm-2 socialpadding">
					<ul class="list-inline pull-right">
					  <li class="list-inline-item social-buttons-fb">
					    <a href="#">
					    	<i class="fa fa-facebook"></i>
					    </a>
					  </li>
					  <li class="list-inline-item social-buttons-gp">
					    <a href="#">
					      <i class="fa fa-google-plus"></i>
					    </a>
					  </li>
					  <li class="list-inline-item social-buttons-tw">
					    <a href="#">
					    	<i class="fa fa-twitter"></i>
					    </a>
					  </li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	</body>
</html>
