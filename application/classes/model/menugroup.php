<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menugroup extends ORM {
    
    protected $_table_name = 'menu_groups';

    protected $_primary_key = 'menu_group_id';

    protected $_db_group = 'default';
	
}