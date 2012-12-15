<?php defined('SYSPATH') or die('No direct script access.');

class Model_Pages extends ORM {
    
    protected $_table_name = 'pages';

    protected $_primary_key = 'page_id';

    protected $_db_group = 'default';
	
	public function rules()
    {
        return array(
            'page_title' => array(
                array('not_empty'),
            ),
            'page_alias' => array(
                array('not_empty'),
                array('alpha_dash'),
                array(array($this, 'uniq_alias'), array(':value', ':field')),
            ),
            'page_text' => array(
                array('not_empty'),
            ),
        );


    }


    public function labels()
    {
        return array(
            'page_title' => 'Название',
            'page_alias' => 'Алиас',
            'page_text' => 'Текст',
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