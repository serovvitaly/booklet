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
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ФИЛЬТР <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><input type="checkbox"> женские</a></li>
          <li><a href="#"><input type="checkbox"> мужские</a></li>
          <li><a href="#"><input type="checkbox"> унисекс</a></li>
        </ul>
      </li>
      <li class="divider-vertical"></li>
      <li><a href="/help/delivery/">Оплата и доставка</a></li>
      <li><a href="/help/rules/">Правила</a></li>
    </ul>
    <ul class="nav pull-right">
      <li class="active"><a href="#" onclick="return false;"><i class="icon-shopping-cart" style="padding-right: 5px;"></i> Корзина пуста</a></li>
    </ul>
  </div>
</div>