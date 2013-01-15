<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

    public $template = 'layout';
    
    public function before()
    {        
        parent::before();
        
        $this->template->brends = ORM::factory('Product')->group_by('vendor')->find_all();
    }
    
    public function after()
    {        
        if (!isset($this->template->content)) {
            $this->template->content = 'Content is empty';
        }
        
        
        $basket_empty   = true;
        $basket_content = 'Корзина пуста';
        
        if (USER_ID > 0) {
            
            $user = ORM::factory('User', USER_ID);
            
            $user_basket = $user->get_basket();
            
            if ($user_basket['total_count'] > 0) {
                
                $basket_empty   = false;
                
                $basket_content = "товаров - {$user_basket['total_count']}, на {$user_basket['summa']} руб.";
            }
        }
        
        $this->template->basket = array(
            'empty'   => $basket_empty,
            'content' => $basket_content
        );
        
        
        parent::after();
    }

} // End
