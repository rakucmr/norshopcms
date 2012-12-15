<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Articles extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Статии';

	}

	public function action_index(){

			$articles = ORM::factory('article')->find_all();
			$content = View::factory('/admin/v_articles',array('articles' => $articles));
			$this->template->page_title = 'Статии';
			$this->template->block_center = $content;
	}

	public function action_add(){
		if(isset($_POST['submit'])){

			$data = Arr::extract($_POST, array('article_title', 'article_alias', 'article_text', 'article_description', 'article_keywords', 'article_status'));
			$pages = ORM::factory('article');
			$pages->values($data);

			try{
					$pages->save();
					$this->request->redirect('/admin/articles');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}

		}

		$content = View::factory('/admin/v_articlesadd')
					->bind('errors', $errors)
					->bind('data',$data);

		$this->template->page_title = 'Добавить страницу';
		$this->template->block_center = $content;
	}

	public function action_edit(){
	$id =(int) $this->request->param('id');
	$pages = ORM::factory('article', $id);

	if(!$pages->loaded()){
		$this->request->redirect('/admin/articles');
	}

	$data = $pages->as_array();


	// Редактирование
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('article_title', 'article_alias', 'article_text', 'article_description', 'article_keywords', 'article_status'));
            $pages->values($data);

            try {
                $pages->save();
                $this->request->redirect('admin/articles');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }
		$content = View::factory('/admin/v_articlesedit')
					->bind('id', $id)
					->bind('errors', $errors)
					->bind('data', $data);

		$this->template->page_title = 'Редактировть страницу';
		$this->template->block_center = $content;
	}

	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $pages = ORM::factory('article', $id);

        if(!$pages->loaded()) {
            $this->request->redirect('admin/articles');
        }

        $pages->delete();
        $this->request->redirect('admin/articles');

	}
}