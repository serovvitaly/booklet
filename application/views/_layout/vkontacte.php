<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Untitled</title>
  <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/style/vkontacte/css/bootstrap.fixed.css">
  
  <script type="text/javascript" src="/vendor/jquery/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/style/vkontacte/js/functions.js"></script>
  <script type="text/javascript" src="/style/vkontacte/js/script.js"></script>
  
  <script src="/vendor/krio/jquery.krioImageLoader.js"></script>
  <script src="/vendor/microfiche/microfiche.js"></script>
  
  <script src="http://vk.com/js/api/xd_connection.js?2" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){        
        
        $.nano = function(template, data) {
            return template.replace(/\{([\w\.]*)\}/g, function (str, key) {
                var keys = key.split("."), value = data[keys.shift()];
                $.each(keys, function () { value = value[this]; });
                return (value === null || value === undefined) ? "" : value;
            });
        };
       
        VK.init(function() {
            apiId: 3355850
            //
        });

        /**
        * Событие происходит, когда пользователь отменяет покупку.
        */
        VK.addCallback('onOrderCancel', function(){
            //
            clearItems();
        });

        /**
        * Событие происходит, когда покупка закончилась успешно.
        */
        VK.addCallback('onOrderSuccess', function(orderId){
            addToBasket(orderId);
            clearItems();
        });

        /**
        * Событие происходит, когда покупка закончилась неуспешно.
        */
        VK.addCallback('onOrderFail', function(errorCode){
            //
            clearItems();
        });
        
        
        // Инициализация
        updateBasket();
        
        $('.topsubmenu a').on('click', function(){
            loadContent({
                content: $(this).attr('href').replace('#', '')
            });
        });
        
        $('#brands-list-carousel')
            .carousel()
            .bind('slid', function(){
                console.log('slid');
            });
            
        $('.brands-list-collection .liter-item').on('click', function(){
            console.log('gogo');
            brendSlideByLiter(2);
        });
        
        $('.search-element').typeahead({
            source: function(query, process){
                ajaxController({
                    controller: 'basket',
                    action: 'search',
                    data: {query:query},
                    timeout: 1000,
                    success: function(data){
                        process(data.result);
                    }
                });
            }
        });
        
        $('.search-box button').on('click', function(){
            var form = $(this).parent('form').get(0);
            var search = $(form).children('.search-element').get(0);
            
            renderPage(1, null, {
                search: $(search).val()
            });
        });
        
    });
  
  </script>
  
  <link rel="stylesheet" type="text/css" href="/style/vkontacte/css/style.css">
</head>
<body>
  <?= View::factory('_common/topmenu', array('brends' => $brends)) ?>
  
  <div class="ajax-preloader"><img src="/style/vkontacte/img/ajax-loader-2.gif"></div>
  
  <div class="container-fluid main" id="main-content">
    <?= $content ?>
  </div>
  

<div id="template-product-item" style="display: none;">
<!--
  <div id="product-{barcode}" class="span2 product-item"><div class="product-item-wrapper">
      <div style="text-align: center;" class="fullinfo">
        <a href="#{barcode}">
          <img class="product-image-mini" data-src="holder.js/120x120" alt="120x120" style="width: 120px; height: 120px;" src="{picture}">
        </a>
      </div>
      <div class="product-title-box fullinfo"><a href="#{barcode}">{name}</a></div>
      <div class="product-price-box">
        <table><tr>
          <td class="p-left">{price} <sup>руб.</sup></td>
          <td class="p-right">{vendor_price} <sup>гол.</sup></td>
        </tr></table>
      </div>
      <div class="product-basket-box">
        <table><tr>
          <td class="p-left"><input class="p-count" type="text" value="1"></td>
          <td class="p-right"><a href="#" onclick="orderWindow('{barcode}'); return false;">КУПИТЬ <i class="icon-shopping-cart"></i></a></td>
        </tr></table>
      </div>
      <div class="product-link-box">
        <table><tr>
          <td><a href="#">подробнее</a></td>
          <td><a href="#">сравнить</a></td>
          <td><a href="#">поделиться</a></td>
        </tr></table>
      </div>
      <div>
        <img src="/style/vkontacte/img/hearts.png" alt="">
      </div>
  </div></div>
-->
</div>
  
</body>
</html>