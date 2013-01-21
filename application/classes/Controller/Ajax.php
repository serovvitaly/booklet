<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {

    protected $success = true;
    
    protected $result  = NULL;
    
    protected $out     = array();
    
    
    public function after()
    {        
        $this->out['success'] = $this->success;
        $this->out['result']  = $this->result;
        
        $this->response->body( json_encode($this->out) );
    }
    
    
    public function action_index()
    {        
        $this->result = NULL;
    }
    
    
    public function action_catalog()
    {
        $content = View::factory('vkontacte/index');
        
        $content->products = ORM::factory('Product')->limit(9)->find_all();
        
        $this->result = $content->render();
    }
    
    public function action_rules()
    {
        $this->result = View::factory('help/rules')->render();
    }
    
    public function action_delivery()
    {
        $this->result = View::factory('help/delivery')->render();
    }
    
    public function action_feedback()
    {
        $this->result = View::factory('help/feedback')->render();
    }
    
    
    public function action_full_info()
    {
        $articul = $this->request->post('art');
        
        $articul = trim($articul, '#');
        
        $data = (array) ORM::factory('Product')->where('barcode', '=', $articul)->find()->as_array();
        
        $this->result = View::factory('vkontacte/product_full', $data)->render();
    }
    
    
    public function action_page_get()
    {
        $search = $this->request->post('search');
        $filter = $this->request->post('filter');
        
        $page = $this->request->post('page');
        $page = $page > 1 ? $page : 1;
        
        $display = 18;
        
        $offset = $display * ($page - 1);
        
        
        $products = ORM::factory('Product')->offset($offset)->limit($display)->find_all();
        
        $items = array();
        if (count($products) > 0) {
            foreach ($products AS $product) {
                $items[] = array(
                    'barcode'      => empty($product->barcode) ? '1111111111' . $product->id : $product->barcode,
                    'picture'      => $product->picture,
                    'name'         => $product->name,
                    'price'        => $product->price,
                    'vendor_price' => ceil($product->price / VK_RATE)
                );
            }
        }
        
        
        $this->result = array(
            'items' => $items
        );
    }

} // End
