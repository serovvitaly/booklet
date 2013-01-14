<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Untitled</title>
  <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/style/default/css/bootstrap.fixed.css">
  <link rel="stylesheet" type="text/css" href="/style/default/css/style.css">
  
  <script type="text/javascript" src="/vendor/jquery/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/style/default/js/functions.js"></script>
  
  <script src="http://vk.com/js/api/xd_connection.js?2" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      VK.init(function() {
         // API initialization succeeded
         // Your code here
      });    
  }); 
  </script>
  
</head>
<body>
  <?= View::factory('_common/topmenu', array('brends' => $brends, 'basket' => $basket)) ?>
  <div class="container-fluid main">
    <?= $content ?>
  </div>
  
</body>
</html>