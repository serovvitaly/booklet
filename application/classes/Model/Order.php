<?php defined('SYSPATH') or die('No direct script access.');

class Model_Order extends ORM {

    protected $_belongs_to = array(
        'user' => array(
            'model'       => 'User',
            'foreign_key' => 'user_id',
        ),
    );

} // End
