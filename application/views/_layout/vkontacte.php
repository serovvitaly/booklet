<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Untitled</title>
  <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/style/vkontacte/css/bootstrap.fixed.css">
  <link rel="stylesheet" type="text/css" href="/style/vkontacte/css/style.css">
  
  <script type="text/javascript" src="/vendor/jquery/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/style/vkontacte/js/functions.js"></script>
  
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
            //apiId: 3355850
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
        renderPage(1);
        
    }); 
  
  
    /**
    * Сбрасывает товары на дефолтовые установки
    */
    function clearItems(){
        // сбрасываем все поля ввода количества товара
        $('.product-item input.p-count').val(1);
    }
    
    
    /**
    * Обновляет содержимое корзины
    */
    function updateBasket(){
        
        // ставим гифку прелодера в корзину
        $('#basket-icon').attr('class', 'icon-shopping-cart-loader');
        
        ajaxController({
            controller: 'basket',
            action: 'get',
            data: {},
            timeout: 10000,
            success: function(data){
            
                this.bcontent = 'Корзина пуста';
                
                if (data.result.total_count && data.result.total_count > 0) {
                    this.bcontent = 'товаров - ' + data.result.total_count + ', на ' + data.result.summa + ' руб.';
                    $('#basket-menu').css('display', 'inline-block');
                } else {
                    $('#basket-menu').css('display', 'none');
                }
                       
                $('#basket-content').html(this.bcontent);
                
                // убираем гифку прелодера из корзины
                $('#basket-icon').attr('class', 'icon-shopping-cart');
            }
        });
    }
  
  
    /**
    * Добавляет покупку в корзину
    */
    function addToBasket(orderId){
        
        if (orderId == '' || !orderId || orderId <= 0) return false;
        
        updateBasket();
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
  
  
    /**
    * Отображает страницу с товарами
    */
    function renderPage(page){
        ajaxController({
            controller: 'ajax',
            action: 'page_get',
            data: {
                page: page > 1 ? page : 1
            },
            timeout: 10000,
            success: function(data){
            
                this.content_box = $('#products-page-content');
                
                if (data.result && data.result.items && data.result.items.length > 0) {
                    this.content_box.html('');
                    for (i=0; i<=9; i++) {
                        this.item_template = $('#template-product-item').html();
                        this.item_content = $.nano(this.item_template, data.result.items[i]);
                        this.content_box.append(this.item_content);
                    }
                    
                }                
            }
        });
    }
  
  </script>
  
</head>
<body>
  <?= View::factory('_common/topmenu', array('brends' => $brends)) ?>
  <div class="container-fluid main">
    <?= $content ?>
  </div>
  
  <div style="display: none;">
    <div id="template-product-item">
    
      <div id="product-{barcode}" class="span2 product-item"><div class="product-item-wrapper">
          <div style="text-align: center;">
            <a href="#">
              <img class="product-image-mini" data-src="holder.js/120x120" alt="120x120" style="width: 120px; height: 120px;" src="{picture}">
            </a>
          </div>
          <div class="product-title-box"><a href="#">{name}</a></div>
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
      
    </div>
  </div>
  
</body>
</html>