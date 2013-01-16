<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Nolayout extends Controller_Base {

    public $template = '_layout/empty';
    
    public function action_index()
    {        
        $this->template->content = 'приехали на дачу';
    }

} // End
