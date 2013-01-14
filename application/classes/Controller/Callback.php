<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Callback extends Controller {
    
    protected $out = NULL;
    
    public function before()
    {
        $this->response->headers('Content-Type', 'text/json');
    }
    
    public function after()
    {
        $_out = $this->out ? $this->out : array('error' => array(
                         'error_code' => 1,
                         'error_msg'  => 'Неизвестная операция', 
                         'critical'   => false  
                     ));
        
        $this->response->body( json_encode($_out) );
    }
    
    
    
    /**
    * Функция обратного вывода для сервера Вконтакте API
    * 
    */
    public function action_vk()
    {     
        $notification_type = $this->request->post('notification_type');
        
        $_out = NULL;
        
        switch ($notification_type) {
            
            //получение информации о товаре
            case 'get_item_test':
                $item_articul = $this->request->post('item');
                
                $product = ORM::factory('Product')->where('barcode', '=', $item_articul)->find();
                
                if ($product->id > 0) {
                    $_out = array('response' => array(
                        'title'      => $product->name,
                        'price'      => $product->price . '.95',
                        'photo_url'  => $product->picture,
                        'expiration' => 60
                    ));
                }
                else {
                    $_out = array('error' => array(
                         'error_code' => 20,
                         'error_msg'  => 'Такого товара не существует', 
                         'critical'   => true  
                     ));
                }
                
                break;
                
            // изменение статуса заказа
            case 'order_status_change_test':
                //
                break;
        }
       
        
        
        $this->out = $_out;
    }

} // End
