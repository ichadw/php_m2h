<?php include('base/header.php');?>
<section id="storedetail"  class="storebg success-order" style="height: 100%;">
	<div class="overlay1"></div>
	<div class="container">
		<div class="headerpage">
			<p>Thank you, your order is being processed.. We will contact you through your phone soon.</p>
	    </div>
	</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
	$('.success-order').css('height',$(window).height() - $('footer').height() - $('nav').height() - 100);
	if($(window).width() < 480){
		$('.success-order p').css('font-size', '16px');
	}
});
</script>
<?php include('base/footer.php');?>
