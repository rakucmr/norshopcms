<?php

class Model_Menu_Item extends ORM {

    protected $_belongs_to = array(
        'parent' => array(
            'model' => 'menu_item',
            'foreign_key' => 'parent_id',
        )
    );

    protected $_has_many = array(
        'subcategories' => array(
            'model' => 'menu_item',
            'foreign_key' => 'parent_id'
        ),
    );
    
}

?>
