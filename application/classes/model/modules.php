<?php defined('SYSPATH') or die('No direct script access.');

class Model_Modules extends ORM {
    
    protected $_table_name = 'modules';

    protected $_primary_key = 'module_id';

    protected $_db_group = 'default';
	
	public function rules()
    {
        return array(
            'module_title' => array(
                array('not_empty'),
            ),
            'module_alias' => array(
                array('not_empty'),
                array('alpha_dash'),
                array(array($this, 'uniq_alias'), array(':value', ':field')),
            ),
            'module_text' => array(
                array('not_empty'),
            ),
        );


    }


    public function labels()
    {
        return array(
            'module_title' => 'Название',
            'module_alias' => 'Алиас',
            'module_text' => 'Текст',
        );
    }

    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'module_title' => array(
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