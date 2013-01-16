<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Basket extends Controller {

    protected $success = false;
    
    protected $result  = NULL;
    
    protected $out     = array();
    
    protected $user    = NULL;
    
    public function before()
    {        
        if (USER_ID <= 0) {
            $this->out['error'] = 'Access denied';
            return;
        }
        
        $this->user = ORM::factory('User', USER_ID);
    }
    
    
    public function after()
    {        
        $this->out['success'] = $this->success;
        $this->out['result']  = $this->result;
        
        $this->response->body( json_encode($this->out) );
    }
    
    
    /**
    * Возвращает сведение о текущем содержимом корзины
    * 
    */
    public function action_get()
    {
        //echo 'USER_ID=' . USER_ID;
        if ($this->user AND $this->user->id > 0) {
            $this->success = true;
            $this->result  = $this->user->get_basket();
        }
        else {
            $this->result = array(
                'message' => 'Пользователь не найден',
            );
        }    
                
    }
    
    
    public function action_search()
    {
        $query = $this->request->post('query');
        
        $sql = DB::query(Database::SELECT, "SELECT `name` FROM bk_products WHERE `name` LIKE ('%{$query}%') LIMIT 9");
        
        $result = $sql->execute();
        
        $out = array();
        
        if ($result->count() > 0) {
            foreach ($result->as_array() AS $res) {
                $out[] = $res['name']; 
            }
        }
        
        $this->result = $out;
    }

} // End
