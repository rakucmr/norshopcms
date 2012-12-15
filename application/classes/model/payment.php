<?php defined('SYSPATH') or die('No direct script access.');

class Model_Payment extends ORM {
    
    protected $_table_name = 'payment_metods';

    protected $_primary_key = 'payment_id';

    protected $_db_group = 'default';
	
	public function rules()
    {
        return array(
            'payment_title' => array(
                array('not_empty'),
            ),
            'payment_alias' => array(
                array('not_empty'),
                array('alpha_dash'),
                array(array($this, 'uniq_alias'), array(':value', ':field')),
            ),

        );


    }


    public function labels()
    {
        return array(
            'delivery_title' => 'Название',
            'delivery_alias' => 'Алиас',
        );
    }

    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'page_title' => array(
                array('strip_tags'),
            ),
        );
    }


    public function uniq_alias($value, $field)
    {
        $page = ORM::factory($this->_object_name)
                ->where($field, '=', $value)
                ->and_where($this->_primary_key, '!=', $this->pk())
                ->find();
        
        if ($page->pk())
        {
            return false;
        }
        
        
        return true;
    }
	
	
	
}