<?php defined('SYSPATH') or die('No direct script access.');

class Model_Banner extends ORM {
    
 //   protected $_table_name = 'banners';

    protected $_primary_key = 'banner_id';

    protected $_db_group = 'default';
	
	

    public function labels()
    {
        return array(
            'banner_title' => 'Название',
            'banner_url' => 'ссылка',
        );
    }

    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'banner_title' => array(
                array('strip_tags'),
            ),
        );
    }

	
	
	
}	
?>