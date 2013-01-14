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
    
    
    protected function _login($uid, $vendor = VENDOR_VK)
    {
        $logged_in = Auth::instance()->login($uid, $uid);
        
        if (!$logged_in) {
            /*$pass = Auth::instance()->hash($uid);
            
            $empty_user = ORM::factory('User');
            
            $empty_user->values(array(
                'uid'      => $uid,
                'password' => $pass
            ))->save();*/
        }
        
        var_dump($logged_in);
        
        return Auth::instance()->login($uid, $uid);
    }

} // End
