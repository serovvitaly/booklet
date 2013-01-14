<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base {
    
	public function action_index()
	{        
        $this->template->content = View::factory('index/index');
        
		$this->template->content->products = ORM::factory('Product')->limit(42)->find_all();
        
        
        $basket_content = 'Корзина пуста';
        
        if (UID > 0) {
            $user = ORM::factory('User')->go(UID);
            
            $user_basket = $user->get_basket();
            
            if ($user_basket['total_count'] > 0) {
                $basket_content = "товаров - {$user_basket['total_count']}, на {$user_basket['summa']} руб.";
            }
        }
        
        $this->template->basket = array(
            'content' => $basket_content
        );
        
	}

} // End