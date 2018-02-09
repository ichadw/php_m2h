<?php include('base/header.php');?>
<!--Body-->
<section id="teamdetail"  class="teambg">
	<div class="overlay1"></div>
	<div class="overlay2"></div>
	<div class="container">
		<div class="headerpage">
			<i class="fa fa-circle "></i>&nbsp; <?= $product->name?> &nbsp;<i class="fa fa-circle"></i>
		</div>
		<div class="row">
			<div class="col-md-11 col2">
				<!--Start Row-->
				<div class="row">
					<div class="col-md-6">
						<img src="<?=base_url('assets/img/page5/'.$product->image);?>">
						<table>
							<tr>
								<td>
							  </td>
							</tr>
						</table>
					</div>
					<div class="col-md-5">
						<div class="productdetail">
							<h6 class="headername">Price</h6>
							<h2 class="productname">Rp <?= number_format($product->price)?></h2>
							<div class="hrname"> </div>
							<p>
							  <?=anchor('store/add_to_cart/' . $product->id, 'Buy' , [
								'class' => 'btn btn-success',
								'role'  => 'button',
							  ])?>
						  	</p>
							<h6 class="biodata">Details</h6>
							<p class="biodatabody"><?= $product->description?></p>
						</div>
					</div>
				</div>
				<!--End Row-->
			</div>
		</div>
	</div>
</section>
<?php include("base/footer.php");?>
