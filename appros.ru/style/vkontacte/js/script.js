/**
* Текущая страница в списке товаров
*/
var current_page = 1;


/**
* Загружает контент с сервера
*/
function loadContent(params){
    $('.ajax-preloader').show();
    ajaxController({
        controller: 'ajax',
        action: params.content,
        data: params,
        timeout: 10000,
        success: function(data){
            $('.ajax-preloader').hide();
            renderContent(data.result);
        },
        failure: function(){
            $('.ajax-preloader').hide();
        }
    });
}


/**
* Выводит контент в основной контейнер
*/
function renderContent(content){
    $('#main-content').html(content);
    $('#main-content').krioImageLoader();
}


/**
* Выводит полную информацию о товаре
*/
function renderFullInfo(art){
    ajaxController({
        controller: 'ajax',
        action: 'full_info',
        data: {
            art: art
        },
        timeout: 10000,
        success: function(data){
            renderContent(data.result);
        }
    });
}


function brendSlideByLiter(liter){
    console.log(liter);
    $('#brands-list-carousel').carousel(20);
}

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

function clearSearchBox(){
    $('.topmenu .search-box input.search-element').val('');
}


/**
* Отображает страницу с товарами
*/
function renderPage(page, completed){
    
    if (page == 'next' || page == '>') {
        current_page++;
    } else if (page == 'prev' || page == '<') {
        current_page--;
    } else {
        current_page = page;
    }
    
    if (completed == 'undefined' || typeof completed != 'function' ) completed = false;
    
    if (current_page < 1) current_page = 1;
    
    var content_box = $('#products-page-content');
    
    ajaxController({
        controller: 'ajax',
        action: 'page_get',
        data: {
            page: current_page
        },
        timeout: 10000,
        success: function(data){
            
            if (data.result && data.result.items && data.result.items.length > 0) {
                
                this.item_template = $('#template-product-item').html().replace('<!--','').replace('-->','');
                
                if (current_page == 1) {
                    content_box.html('');
                    this.item_content = '<div class="coll-item">';
                    this.num_el = 1;
                    for (i=0; i <= data.result.items.length - 1; i++) {
                        this.item_content  += $.nano(this.item_template, data.result.items[i]);
                        this.num_el++;
                        if (this.num_el == 4) {
                            this.item_content += '</div><div class="coll-item">';
                            this.num_el = 1;
                        }
                    }
                    this.item_content += '</div>';
                    content_box.append(this.item_content);
                    content_box.krioImageLoader();
                } else {
                    var newPage = $('<div class="row"></div>');
                    newPage.css({
                        position: 'absolute',
                        right: 0,
                        top: '66px',
                        width: content_box.width(),
                        marginRight: '-'+content_box.width()+'px'
                    });
                    content_box.after(newPage);
                    
                    for (i=0; i <= data.result.items.length - 1; i++) {
                        this.item_content  = $.nano(this.item_template, data.result.items[i]);
                        newPage.append(this.item_content);
                    }
                    newPage.krioImageLoader();
                    
                    content_box.animate({
                        marginLeft: -700
                    }, 300, function(){
                        content_box.remove();
                    });
                    newPage.animate({
                        marginRight: 0,
                    }, 300, function(){
                        newPage.attr('id', 'products-page-content');
                        newPage.attr('style', '');
                    });    
                }
                
                if (completed) completed();
            }                
        }
    });
}