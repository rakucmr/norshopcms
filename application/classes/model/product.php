<?php defined('SYSPATH') or die('No direct script access.');

class Model_Product extends ORM {
    
    protected $_table_name = 'products';

    protected $_primary_key = 'id';

    protected $_db_group = 'default';

    protected $_has_many = array(
        'comments' => array(
            'model' => 'comment',
            'foreign_key' => 'product_id',
        ),
        'images' => array(
            'model' => 'image',
            'foreign_key' => 'product_id',
        ),
        'categories' => array(
            'model' => 'category',
            'foreign_key' => 'product_id',
            'through' => 'products_categories',
            'far_key' => 'category_id',
        ),

        'orders' => array(
            'model' => 'order',
            'foreign_key' => 'product_id',
            'through' => 'orders_products',
            'far_key' => 'orders_id',
        ),
    );

    protected $_belongs_to = array(
        'main_img' => array(
            'model' => 'image',
            'foreign_key' => 'image_id',
        ),

        'manufactures' => array(
            'model' => 'manufactures',
            'foreign_key' => 'manufacture_id',
        ),
    );


    public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
            ),
            'description' => array(
                array('not_empty'),
            ),
            'price' => array(
              //  array('not_empty'),
                array('numeric'),
            ),
        );
    }


    public function labels()
    {
        return array(
            'title' => 'Наименование',
            'description' => 'Описание',
            'price' => 'Цена',
        );
    }

    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'title' => array(
                array('strip_tags'),
            ),
            'price' => array(
                array('strip_tags'),
            ),
        );
    }

} 
