<div class="navbar" style="margin: 0; width: 607px;">
  <div class="navbar-inner">
    <a class="brand" href="#">Title</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
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
    </ul>
    <ul class="nav pull-right">
      <li><a href="#"><i class="icon-th"></i></a></li>
      <li class="active"><a href="#"><i class="icon-th-list"></i></a></li>
    </ul>
  </div>
</div>