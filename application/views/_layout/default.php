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
  
  <link rel="stylesheet" href="/vendor/flexpager/flexpager.css">
  <script src="/vendor/flexpager/jquery.flexpager.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
        
        setBody();
        
        $(window).resize(function(){
            setBody();
        });
        
        $('body').flexpager({
            startContent: {
                url: 'nolayout'
            }
        });     
    });
    
    function setBody(){
        $('body').height($(document).height());
    }
      
  </script>
  
</head>
<body style="margin: 0; padding: 0;">
  
</body>
</html>