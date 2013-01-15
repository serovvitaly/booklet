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
        oLog::add($_POST, 'VK_PAYMENT_REQUEST');
      
        $notification_type = $this->request->post('notification_type');
        
        $order_id  = $this->request->post('order_id');
        
        $_out = NULL;
        
        switch ($notification_type) {
            
            //получение информации о товаре
            case 'get_item_test':
                $item = $this->request->post('item');
                
                preg_match('/ar\-([0-9]+)_ct\-([0-9]+)/', $item, $item_mix);
                
                $item_articul = (isset($item_mix[1]) AND $item_mix[1] > 0) ? $item_mix[1] : NULL;
                $item_count   = (isset($item_mix[2]) AND $item_mix[2] > 0) ? $item_mix[2] : 1;
                
                $product = $item_articul ? ORM::factory('Product')->where('barcode', '=', $item_articul)->find() : NULL;
                
                if ($product AND $product->id > 0) {
                    
                    $price = ceil( $product->price * $item_count / VK_RATE );
                    
                    $_out = array('response' => array(
                        'title'      => ( $item_count > 1 ? "{$item_count} шт. - " : '' ) . $product->name,
                        'price'      => $price,
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
                
                $_out = array('response' => array(
                     'order_id' => $order_id
                 ));
                
                break;
        }
       
        
        
        $this->out = $_out;
    }

} // End
