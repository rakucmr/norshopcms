<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pages extends Controller_Index {
	
	public function action_page()
	{	
       // Получаем список продукций
	   $alias = $this->request->param('id');
       $pages = Model::factory('page')->page($alias);
       $viewpage = View::factory('v_page', array(
            'pages' => $pages,
        ));
       $page = $pages->current();
        // Выводим в шаблон
       $this->template->page_title = $page['page_title'] ;
       $this->template->description = $page['page_description'] ;
       $this->template->keywords = $page['page_keywords'] ;
       $this->template->block_center = array('viewpage'=>$viewpage);
		
	}
	
} // End 
