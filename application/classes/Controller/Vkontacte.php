<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Vkontacte extends Controller_Base {

    public $template = '_layout/vkontacte';
    
    public function action_index()
    {        
        $this->template->content = View::factory('vkontacte/index');
    }

} // End
