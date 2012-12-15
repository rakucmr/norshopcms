<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pages extends Controller_Index {
	
	public function action_page()
	{	
       // Получаем список продукций
	   $alias = $this->request->param('id');
       $pages = Model::factory('page')->page($alias);
       $block_center = View::factory('v_page', array(
            'pages' => $pages,
        ));
       $page = $pages->current();
        // Выводим в шаблон
       $this->template->page_title = $page['page_title'] ;
       $this->template->block_center = $block_center;
		
	}
	
} // End 