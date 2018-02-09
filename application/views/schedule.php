<?php include('base/header.php');?>
    <!--Body-->
    <section id="scheduledetail"  class="schedulebg">
    <div class="overlay1"></div>
    <div class="overlay2"></div>
    	<div class="container">
    		<div class="headerpage">
    			<i class="fa fa-circle "></i>&nbsp methodist -2 hawks schedule &nbsp<i class="fa fa-circle"></i>
    		</div>
            <?php foreach($content_schedule as $key => $schedule){?>
            <table>
                <tr>
                    <th colspan="5">
                        <?= $schedule->id_home == 1 ? 'HOME GAME' : 'AWAY GAME' ?> <!--kondisi true or false-->
                    </th>
                </tr>
                <tr>
                    <td rowspan="2"><img src="<?=base_url('assets/img/page4/'.$schedule->home_image);?>"></td>
                    <td rowspan="2"><?= $schedule->home_score ? $schedule->home_score : '--' ?></td>
                    <td class="headertext">
                        <?php
                            $date = date('Y-m-d', strtotime($schedule->date));
                            if($date < date('Y-m-d')) echo 'COMPLETE MATCH';
                            else if($date == date('Y-m-d')) echo 'TODAY MATCH';
                            else echo 'NEXT MATCH';
                        ?>
                    </td>
                    <td rowspan="2"><?= $schedule->away_score ? $schedule->away_score : '--' ?></td>
                    <td rowspan="2"><img src="<?=base_url('assets/img/page4/'.$schedule->away_image);?>"></td>
                </tr>
                <tr>
                    <td class="bottomtext"><?=date('d F Y', strtotime($schedule->date))?></td>
                </tr>
            </table>
            <?php }?>
            <p id="pagination">
                    <!-- Show pagination links -->
                    <?php foreach ($links as $link) {
                    echo $link;
                    } ?>
                </p>
		</div>
	</section>

<?php include("base/footer.php");?>