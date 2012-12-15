<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menu extends ORM {
    
    protected $_table_name = 'menus';

    protected $_primary_key = 'menu_id';

    protected $_db_group = 'default';
	
}