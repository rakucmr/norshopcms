<?php defined('SYSPATH') or die('No direct script access.');

class Model_Category extends ORM_MPTT {

    protected $_has_many = array(
        'products' => array(
            'model'   => 'product',
            'through' => 'products_categories',
        ),
    );
    

    public function labels()
    {
        return array(
            'title' => 'Категория',
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
        );
    }
} 
