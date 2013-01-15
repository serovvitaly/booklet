<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends ORM {
    
    protected $_has_many = array(
        'orders' => array(
            'model'       => 'Order',
            'foreign_key' => 'user_id',
        ),
        'roles' => array(
            'model'       => 'Role',
            'through'     => 'users_roles',
        )
    );
    
    
    /**
    * Возвращает объект пользователя, если пользователя не существует,
    * то сначала создает его, а потом возвращает.
    * 
    * @param mixed $uid - UID
    */
    public function go($uid)
    {
        if ($uid <= 0) {
            return false;
        }
        
        $current_user = $this->where('uid', '=', $uid)->find();
        
        if ($current_user->uid <= 0) {
            $current_user->uid = $uid;
            $current_user->save();
        }
        
        if ($current_user->uid > 0) {
            return $current_user;
        }
        
        return false;
    }
    
    
    /**
    * Возвращает текущее состояние корзины
    * 
    */
    public function get_basket()
    {
        $orders_table = 'bk_' . $this->orders->table_name();
        
        $query = DB::query(Database::SELECT, "SELECT SUM(quantity) AS total_count, SUM(actual_price*quantity) AS summa FROM {$orders_table} WHERE uid = {$this->uid} AND status = 0");
        
        $result = $query->execute();
        
        return array(
            'total_count' => $result->get('total_count'),
            'summa'       => $result->get('summa')
        );
    }
    
    
    /**
    * Добавляет товар в корзину пользователя
    * 
    * @param mixed $quantity     - количество единиц товара
    * @param mixed $unique_value - уникальный идентификатор товара
    * @param mixed $unique_key   - название поля в БД для $unique_value
    */
    public function add_to_basket($quantity, $unique_value, $unique_key = 'id')
    {
        $product = ORM::factory('Product')->where($unique_key, '=', $unique_value)->find();
        
        if ($product->id <= 0) {
            return false;
        }
        
        
        $order = ORM::factory('Order');
        
        $order->values(array(
            'user_id'      => $this->id,
            'quantity'     => $quantity,
            'unique_key'   => $unique_key,
            'unique_value' => $unique_value,
            'actual_price' => $product->price
        ))->save();
        
    }
    
} // End
