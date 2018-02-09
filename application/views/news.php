<?php include('base/header.php');?>
<!--Body-->
<section id="newsdetail"  class="newsbg">
	<div class="overlay1"></div>
	<div class="overlay2"></div>
	<div class="container">
		<div class="headerpage">
			<i class="fa fa-circle "></i>&nbsp methodist -2 hawks news &nbsp<i class="fa fa-circle"></i>
		</div>
		<!-- <div id="cf5" class="shadow"> -->
			<!--Page 1-->
		<div class="imagegroup">
			<?php 
				$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$parts = parse_url($url, PHP_URL_QUERY);
				parse_str($parts, $query_params);
				// echo $query_params['page']; 
				// if($query_params==NULL){
				if($query_params==NULL || $query_params['page'] == 1){?>
				<div class="row baris">
					<?php
						foreach ($blog_headline->result() as $rowHeadline) {
					?>
					<div class="col-md-6 col-sm-12">
						<div class="update-news-utama-foto">
							<img src="<?php echo base_url(); ?>assets/img/page2/<?php echo $rowHeadline->thumbnail; ?>" style="height: auto;">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="update-news-utama-teks">
							<div class="update-news-utama-judul">
								<h4><?php echo $rowHeadline->title;  ?></h4>
							</div>
							<div class="update-news-utama-isi">
								<p><?php echo substr(strip_tags($rowHeadline->content), 0, 500); ?>...
									<a href="<?php echo base_url();?>newsfeed/<?php echo $rowHeadline->slug; ?>" class="btn-readmore">
										See More
									</a>
								</p>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="update-garis-pembatas"></div>
			<?php }?>

				<div class="row">
					<?php foreach($content_news as $key => $news){?>
					<div class="col-md-4">
					<a href="<?php echo base_url();?>newsfeed/<?php echo $news->slug; ?>">
						<div class="date"><?=date('d M Y',strtotime($news->timestamp));?></div>
						<img src="<?=base_url('assets/img/page2/'.$news->thumbnail);?>">
						<div class="headertext box">
							<h5><?=$news->title;?></h5>
							<?= substr("$news->content",0,100);?>
						</div>
					</a>
					</div>
					<?php }?>
				</div>
				
				<p id="pagination">
					<!-- Show pagination links -->
					<?php foreach ($links as $link) {
					echo $link;
					} ?>
				</p>

		</div>
	</div>
</section>
<?php include("base/footer.php");?>