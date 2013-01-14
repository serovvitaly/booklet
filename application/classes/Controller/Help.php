<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Help extends Controller_Base {

    public function action_index()
    {        
        $this->response->body('');
    }
    
    public function action_delivery()
    {        
        $this->template->content = View::factory('help/delivery');
    }
    
    public function action_rules()
    {        
        $this->template->content = 'rules';
    }

} // End
