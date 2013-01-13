<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base {
    
	public function action_index()
	{        
        $this->template->content = View::factory('index/index');
        
		$this->template->content->products = ORM::factory('Product')->limit(20)->find_all();
	}

} // End