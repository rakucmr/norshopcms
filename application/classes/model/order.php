<?php defined('SYSPATH') or die('No direct script access.');

class Model_Order extends ORM {
    
   // protected $_table_name = 'orders';

    protected $_primary_key = 'order_id';

  //  protected $_db_group = 'default';

        protected $_belongs_to = array(

        'users' => array(
            'model' => 'user',
            'foreign_key' => 'order_user_id'
        ),
	/*
	'orders_products' => array(
	'foreign_key'=>'order_id',
            'model' => 'order',
       'far_key' => 'order_id'
        ),  */

    );

}