<!-- <a class="logo" href="/" title="На стартовую"><img src="/style/default/img/logo.png"></a> -->

<div class="topsubmenu">
  <a href="/help/rules/">Правила</a>
  <span>&bull;</span>
  <a href="/help/delivery/">Оплата и доставка</a>
  <span>&bull;</span>
  <a href="/help/rules/">Обратная связь</a>
</div>

<div class="navbar topmenu" style="margin: 0; width: 700px;">
  <div class="navbar-inner">
    <a class="brand" href="#">;)</a>
    <ul class="nav">      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">БРЕНД <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="divider"></li>
          <li class="nav-header">A</li>
          <?
          if (isset($brends) AND count($brends) > 0) {
              foreach ($brends AS $brend) {
          ?>
          <li><a href="#"><?= $brend->vendor ?></a></li>
          <?
              }
          }
          ?>
        </ul>
      </li>
      <li class="divider-vertical"></li>     
    </ul>
    <ul class="nav pull-right">
      <li><a href="#">«</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="pagination-top-page">1</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/help/delivery/">2</a></li>
          <li><a href="/help/rules/">3</a></li>
          <li><a href="/help/rules/">4</a></li>
        </ul>
      </li>
      <li><a href="#">»</a></li>
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i id="basket-icon" class="icon-shopping-cart" style="margin: 0 10px 0 0"></i> <span id="basket-content">Корзина пуста</span> <b id="basket-menu" style="display:none" class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/help/delivery/">Перейти в корзину</a></li>
          <li><a href="/help/rules/">Оформить доставку</a></li>
          <li class="divider"></li>
          <li><a href="/help/rules/">История покупок</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>