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
        $this->response->body('');
    }
    
    
    public function action_page_get()
    {
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
                    'description'  => $product->description,
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
