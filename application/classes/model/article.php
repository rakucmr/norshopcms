<?php defined('SYSPATH') or die('No direct script access.');

class Model_Article extends ORM {

   // protected $_table_name = 'articles';

    protected $_primary_key = 'article_id';

//    protected $_db_group = 'default';

	public function rules()
    {
        return array(
            'article_title' => array(
                array('not_empty'),
            ),
            'article_alias' => array(
                array('not_empty'),
                array('alpha_dash'),
                array(array($this, 'uniq_alias'), array(':value', ':field')),
            ),
            'article_text' => array(
                array('not_empty'),
            ),
        );


    }


    public function labels()
    {
        return array(
            'article_title' => 'Название',
            'article_alias' => 'Алиас',
            'article_text' => 'Текст',
        );
    }

    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'article_title' => array(
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