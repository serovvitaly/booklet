<div class="navbar navbar-inverse" style="margin: 0; width: 647px;">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">Title</a>
      <div class="nav-collapse collapse navbar-inverse-collapse">
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
          <li><a href="#">Link</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div>