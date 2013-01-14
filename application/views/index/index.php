<div class="row" style="margin: 0;">
<?
if (isset($products) AND count($products) > 0) {
    $counter = 1;
    foreach ($products AS $product) {
        if ($counter >= 7) {
            $counter = 1;
        }
?>  
  <div id="product-<?= $product->barcode ?>" class="span2 product-item<?= $counter <= 3 ? ' strip-row' : '' ?>"><div class="product-item-wrapper">
      <a class="pull-left" href="#">
        <img class="product-image-mini" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="<?= $product->picture ?>">
      </a>
      <div class="product-title-box">
        <a href="#"><?= $product->name ?></a>
        <? /*$product->description*/ ?>
      </div>
      <div class="product-basket-box">
        <table><tr>
          <td class="p-price"><?= $product->price ?> <sup>руб.</sup></td>
          <td class="p-count"><input type="text" value="1"></td>
          <td class="p-action"><a href="#" onclick="addToBasket('<?= $product->barcode ?>'); return false;">в корзину</a></td>
        </tr></table>
      </div>
      <div class="product-link-box">
        <table><tr>
          <td class="color-gray"><a href="#">подробнее</a></td>
          <td class="color-blue"><a href="#">сравнить</a></td>
          <td class="color-red"><a href="#">поделиться</a></td>
        </tr></table>
      </div>
  </div></div>
<?
        $counter++;
    }
}
?>
</div>

<script type="text/javascript">
function addToBasket(barcode)
{
    if (barcode == '' || !barcode) return false;
    
    this.quantity = $('#product-' + barcode + ' .p-count input').val();
    
    $('#basket-icon').attr('class', 'icon-shopping-cart-loader');
    
    ajaxController({
        controller: 'basket',
        action: 'add',
        data: {
            barcode: barcode,
            quantity: this.quantity > 0 ? this.quantity : 1
        },
        success: function(data){            
            $('#basket-content').html('товаров - ' + data.result.total_count + ', на ' + data.result.summa + ' руб.');
            $('#basket-menu').css('display', 'inline-block');
            $('#basket-icon').attr('class', 'icon-shopping-cart');
        }
    });
}
</script>