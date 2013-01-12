<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

    public $template = 'layout';
    
    public function after()
    {        
        if (!isset($this->template->content)) {
            $this->template->content = 'Content is empty';
        }
        
        parent::after();
    }

} // End
