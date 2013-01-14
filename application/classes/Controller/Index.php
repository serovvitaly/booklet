<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base {
    
	public function action_index()
	{        
        $this->template->content = View::factory('index/index');
        
		$this->template->content->products = ORM::factory('Product')->limit(42)->find_all();
        
        
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
        
	}

} // End