<?php include('base/header.php');?>
<!--Body-->
<section id="storedetail"  class="storebg">
  <div class="overlay1"></div>
  <div class="overlay2"></div>
  <div class="container">
    <div class="headerpage">
    <i class="fa fa-circle "></i>&nbsp methodist -2 hawks store &nbsp<i class="fa fa-circle"></i>
    </div>
    <div class="row">
      <div class="col-md-2 nopadding">
        <table>
          <tr><th>Filter</th></tr>
          <tr><td></td></tr>
          <tr>
            <td class="btnsearch">
              <form>
                <div class="input-group dark">
                  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
                  <input type="text" class="form-control" placeholder="Write Text">
                </div>
              </form>
            </td>
          </tr>
          <tr><td>All</td></tr>
          <tr><td>costume only</td></tr>
          <tr><td>accessories only</td></tr>
          <tr><td style="text-align: center;"><button type="submit" class="btn button">search</button></td></tr>
          <tr><td></td></tr>
          <tr><td style="text-align: center; padding-right: 10px; font-size: 20px; font-family: aleo">
            <?php
              $text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
              $text_cart_url .= ' Inside Cart: '. $this->cart->total_items() .' items';
            ?>
            <?=anchor('Store/cart', $text_cart_url)?>
          </td></tr>
        </table>
        <p id="pagination">
          <!-- Show pagination links -->
          <?php foreach ($links as $link) {
            echo $link;
          } ?>
        </p>
      </div>
      <div class="col-md-10 product">
        <div class="row">
        <?php foreach($content_store as $key=>$store){ ?>
          <div class="col-md-3">
            <table>
              <tr>
                <th><img src="<?=base_url('assets/img/page5/'.$store->image);?>"></th>
              </tr>
              <tr>
                <td class="productname"><?=$store->name?></td>
              </tr>
              <tr>
                <td>IDR <?=$store->price?></td>
              </tr>
              <tr><td style="text-align: center;">
                <?=anchor('store/add_to_cart/' . $store->id, 'Buy' , [
                  'class' => 'btn btn-primary',
                  'role'  => 'button'
                ])?>
              </td></tr>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>        
    </div>
  </div>
</section>

<?php include("base/footer.php");?>

<script type="text/javascript">
  var counter = 0;

  $(document).ready(function() {

    $("#addMe").click(function(){
      counter++;
      $("#theCount").text(counter);
    });

  });
</script>