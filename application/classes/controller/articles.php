<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Articles extends Controller_Index{

	public function before()
	{
		parent::before();
	}


	public function action_article()
	{
       // Получаем статию
	   $id = (int)$this->request->param('id');
	   $articles = ORM::factory('article', $id)->as_array();
       $article = View::factory('v_article',array('articles' => $articles));
	   $this->template->page_title = '';
       $this->template->description = $articles['article_description'];
	   $this->template->keywords = $articles['article_keywords'];
	   $this->template->block_center = array('article'=>$article);
	}


	public function action_index(){

      $count = ORM::factory('article')->count_all();
      $pagination = Pagination::factory(array(
      'total_items' => $count,
    ))
    ->route_params(array(
    'controller' => Request::current()->controller(),
    'action' => Request::current()->action(),
  ));


    $articles = ORM::factory('article')
                ->limit($pagination->items_per_page)
  				->offset($pagination->offset)
                ->find_all();
    $article = View::factory('v_articles',array('articles' => $articles, 'pagination'=>$pagination));
  
    $this->template->block_center = array('article'=>$article);
	}



}