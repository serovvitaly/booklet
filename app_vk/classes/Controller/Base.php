<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

    public $template = '_layout/default';
    
    public function before()
    {        
        parent::before();
        
        //
    }
    
    public function after()
    {        
        //      
        
        parent::after();
    }

} // End
