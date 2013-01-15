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
            //apiId: 3355850
            //
        });

        /**
        * Событие происходит, когда пользователь отменяет покупку.
        */
        VK.addCallback('onOrderCancel', function(){
            //
        });

        /**
        * Событие происходит, когда покупка закончилась успешно.
        */
        VK.addCallback('onOrderSuccess', function(orderId){
            addToBasket(orderId);
        });

        /**
        * Событие происходит, когда покупка закончилась неуспешно.
        */
        VK.addCallback('onOrderFail', function(errorCode){
            //
        });
    }); 
  
  
    /**
    * Добавляет покупку в корзину
    */
    function addToBasket(orderId)
    {
        if (orderId == '' || !orderId || orderId <= 0) return false;
        
        // ставим гифку прелодера в корзину
        $('#basket-icon').attr('class', 'icon-shopping-cart-loader');
        
        ajaxController({
            controller: 'basket',
            action: 'get',
            data: {
                orderId: orderId,
            },
            success: function(data){            
                $('#basket-content').html('товаров - ' + data.result.total_count + ', на ' + data.result.summa + ' руб.');
                $('#basket-menu').css('display', 'inline-block');
                
                // сбрасываем все поля ввода количества товара
                $('.product-item input.p-count').val(1);
                
                // убираем гифку прелодера из корзины
                $('#basket-icon').attr('class', 'icon-shopping-cart');
            }
        });
    }
    
    
    /**
    * Вызывает диалог оплаты товара
    */
    function orderWindow(articul){
        VK.callMethod("showOrderBox", {
            type: 'item',
            item: 'ar-' + articul + '_ct-' + $('#product-' + articul + ' input.p-count').val()
        });
    }
  
  </script>
  
</head>
<body>
  <?= View::factory('_common/topmenu', array('brends' => $brends)) ?>
  <div class="container-fluid main">
    <?= $content ?>
  </div>
  
</body>
</html>