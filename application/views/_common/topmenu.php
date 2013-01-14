<a class="logo" href="/" title="На стартовую"><img src="/style/default/img/logo.png"></a>
<div class="navbar" style="margin: 0; width: 607px;">
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
      <? /*     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ФИЛЬТР <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><input type="checkbox"> женские</a></li>
          <li><a href="#"><input type="checkbox"> мужские</a></li>
          <li><a href="#"><input type="checkbox"> унисекс</a></li>
        </ul>
      </li> */ ?>
      <li class="divider-vertical"></li>      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Помощь <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/help/delivery/">Оплата и доставка</a></li>
          <li><a href="/help/rules/">Правила</a></li>
        </ul>
      </li>      
    </ul>
    <ul class="nav pull-right">
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i id="basket-icon" class="icon-shopping-cart" style="padding-right: 5px;"></i> <span id="basket-content"><?= $basket['content'] ?></span> <b id="basket-menu"<?= $basket['empty'] ? ' style="display:none"' : '' ?> class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/help/delivery/">Перейти в корзину</a></li>
          <li><a href="/help/rules/">Оформить заказ</a></li>
          <li class="divider"></li>
          <li><a href="/help/rules/">Очистить корзину</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>