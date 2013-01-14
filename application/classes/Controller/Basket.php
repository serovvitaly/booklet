<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Basket extends Controller {

    protected $success = false;
    
    protected $result  = NULL;
    
    protected $out     = array();
    
    protected $user    = NULL;
    
    public function before()
    {
        if (USER_ID <= 0) {
            $this->out['error'] = 'Access denied';
            return;
        }
        
        $this->user = ORM::factory('User', USER_ID);
    }
    
    
    public function after()
    {        
        $this->out['success'] = $this->success;
        $this->out['result']  = $this->result;
        
        $this->response->body( json_encode($this->out) );
    }
    
    
    /**
    * Добавляет заказ в корзину
    * 
    */
    public function action_add()
    {           
        $this->user->add_to_basket($_POST['quantity'], $_POST['barcode'], 'barcode');
        
        $this->result = $this->user->get_basket();        
    }

} // End
