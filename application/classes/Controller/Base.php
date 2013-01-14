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
        
        parent::after();
    }

} // End
