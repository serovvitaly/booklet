<!-- <a class="logo" href="/" title="На стартовую"><img src="/style/default/img/logo.png"></a> -->

<?
    $litters_list = $vendoers_list = '';
    
    $st = true;
    
    if (count($brends) > 0) {
        foreach ($brends AS $brend_liter => $brends_by_liter) {
            
            $rus = preg_match('/[А-Я]{1}/', $brend_liter) ? ' rus' : '';
            
            $litters_list .= '<div class="liter-item' . $rus . '"><strong>' . $brend_liter . '</strong> - ' . $brends_by_liter['count'] . '</div>';
            
            if (count($brends_by_liter['items']) > 0){
                
                $vendoers_list_items = '';
                foreach ($brends_by_liter['items'] AS $liter_item) {
                    $vendoers_list_items .= '<div class="vendor-item"><a href="#">' . $liter_item . '</a></div>';
                }
                
                $vendoers_list .= '<div class="' . ($st ? 'active ' : '') . 'item">' . $vendoers_list_items . '</div>';
                $st = false;
            }
        }
    }
?>

<div class="topsubmenu">
  <a href="/help/rules/">Правила</a>
  <span>&bull;</span>
  <a href="/help/delivery/">Оплата и доставка</a>
  <span>&bull;</span>
  <a href="/help/rules/">Обратная связь</a>
</div>

<div class="navbar topmenu" style="margin: 0; width: 700px;">
  <div class="navbar-inner">
    <ul class="nav"> 
      <li class="dropdown">
        <a title="Поиск" style="padding: 5px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></a>
        <ul class="dropdown-menu">
          <li>
            <div class="input-append search-box">
              <form action="">
                <input class="search-element" type="text" data-provide="typeahead" placeholder="введите запрос для поиска...">
                <button class="btn" type="button" onclick="return false;">Искать</button>
              </form>
            </div>
          </li>
        </ul>
      </li>
      <li class="divider-vertical"></li>     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">БРЕНД <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <div class="brands-list-collection">
              <form action="">
              <table><tr>
                <td class="u-left">
                  <?= $litters_list ?>
                </td>
                <td class="u-right">
                  <div id="brands-list-carousel" class="carousel slide">
                      <div class="carousel-inner">
                        <?= $vendoers_list ?>
                      </div>
                  </div>
                  <ul class="pager">
                      <li class="previous"><a href="#brands-list-carousel" data-slide="prev">&larr; Сюда</a></li>
                      <li class="next"><a href="#brands-list-carousel" data-slide="next">Туда &rarr;</a></li>
                  </ul>
                </td>
              </tr></table>
              </form>
            </div>
          </li>
        </ul>
      </li>
      <li class="divider-vertical"></li>     
    </ul>
    <ul class="nav pull-right">
      <li><a href="#" onclick="renderPage('<'); return false;">«</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="pagination-top-page">1</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/help/delivery/">2</a></li>
          <li><a href="/help/rules/">3</a></li>
          <li><a href="/help/rules/">4</a></li>
        </ul>
      </li>
      <li><a href="#" onclick="renderPage('>'); return false;">»</a></li>
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