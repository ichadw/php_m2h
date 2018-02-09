<?php include('base/header.php');?>
<!--Body-->
<section id="newsdetail"  class="newsbg">
	<div class="overlay1"></div>
	<div class="overlay2"></div>
	<div class="container">
		<div class="margin_blog">
			<div class="blog_detail">
				<div class="blog_detail_padding">
					<div class="blog_detail_main">
						<div class="blog_detail_main_judul">
							<h2><?php echo $content_news->title; ?></h2>
						</div>
						<div class="blog_detail_main_gambar">
							<img src="<?php echo base_url(); ?>assets/img/page2/<?php echo $content_news->thumbnail; ?>" class="img-responsive">
						</div>
						<div class="blog_detail_main_isi">
							<?php echo nl2br($content_news->content)?>
						</div>
						<a href="<?php echo base_url();?>news">
							<button type="button" class="btn btn-default blog_detail_button">BACK</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include("base/footer.php");?>