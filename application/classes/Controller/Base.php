<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

    public $template = '_layout/default';
    
    public function before()
    {        
        parent::before();
        
        $brends = ORM::factory('Product')->group_by('vendor')->find_all();
        
        $compiled = array();
        if (count($brends) > 0) {
            
            foreach ($brends AS $brend) {
                $liter = strtoupper( substr( ltrim($brend->vendor) , 0, 1) );
                
                if (!empty($liter)) {
                    if (isset($compiled[$liter])) {
                        $compiled[$liter]['count']++;
                        $compiled[$liter]['items'][] = $brend->vendor;
                    }
                    else {
                        $compiled[$liter] = array(
                            'count' => 1,
                            'items' => array($brend->vendor)
                        );
                    }     
                }
            }            
        }
        
        $this->template->brends = $compiled;
    }
    
    public function after()
    {        
        if (!isset($this->template->content)) {
            $this->template->content = 'Content is empty';
        }        
        
        parent::after();
    }

} // End
