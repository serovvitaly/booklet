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
      <div style="text-align: center;">
        <a href="#">
          <img class="product-image-mini" data-src="holder.js/120x120" alt="120x120" style="width: 120px; height: 120px;" src="<?= $product->picture ?>">
        </a>
      </div>
      <div class="product-title-box">
        <a href="#"><?= $product->name ?></a>
        <? /*$product->description*/ ?>
      </div>
      <div class="product-basket-box">
        <table><tr>
          <td class="p-price"><?= $product->price ?> <sup>руб.</sup></td>
          <td class="p-count"><input type="text" value="1"></td>
          <td class="p-action"><a href="#" onclick="orderWindow('<?= $product->barcode ?>'); return false;">КУПИТЬ</a></td>
        </tr></table>
      </div>
      <div class="product-link-box">
        <table><tr>
          <td><a href="#">подробнее</a></td>
          <td><a href="#">сравнить</a></td>
          <td><a href="#">поделиться</a></td>
        </tr></table>
      </div>
      <div>
        <img src="/style/default/img/hearts.png" alt="">
      </div>
  </div></div>
<?
        $counter++;
    }
}
?>
</div>

<div class="pagination pagination-centered pagination-fixed-bottom">
  <ul>
    <li class="disabled"><a href="#">«</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">»</a></li>
  </ul>
</div>