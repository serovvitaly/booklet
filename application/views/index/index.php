<div class="row">
<?
if (isset($products) AND count($products) > 0) {
    foreach ($products AS $product) {
?>  
  <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="<?= $product->picture ?>">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><?= $product->name ?></h4>
        <?= $product->description ?>
      </div>
  </div>
<?
    }
}
?>
</div>