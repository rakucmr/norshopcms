<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Pages extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Страницы';
	
	}

	public function action_index(){

			$pages = ORM::factory('pages')->find_all();
			$content = View::factory('/admin/v_pages',array('pages' => $pages,'url'=>$this->url));
			$this->template->page_title = 'Страницы';
			$this->template->block_center = $content;
	}	

	public function action_add(){
		if(isset($_POST['submit'])){
 
			$data = Arr::extract($_POST, array('page_title', 'page_alias', 'page_text', 'page_description', 'page_keywords', 'page_status' ));
			$pages = ORM::factory('pages');
			$pages->values($data);
				
			try{
					$pages->save();
					$this->request->redirect('/admin/pages');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}

		}
		
		$content = View::factory('/admin/v_addpages')
					->bind('errors', $errors)
					->bind('data',$data);
		
		$this->template->page_title = 'Добавить страницу';
		$this->template->block_center = $content;
	}
	
	public function action_edit(){
	$id =(int) $this->request->param('id');
	$pages = ORM::factory('pages', $id);
	
	if(!$pages->loaded()){
		$this->request->redirect('/admin/pages');
	}
	
	$data = $pages->as_array();
	
		
	// Редактирование
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('page_title', 'page_alias', 'page_text','page_description', 'page_keywords', 'page_status'));
            $pages->values($data);

            try {
                $pages->save();
                $this->request->redirect('admin/pages');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }
		$content = View::factory('/admin/v_editpages')
					->bind('id', $id)
					->bind('errors', $errors)
					->bind('data', $data);
					
		$this->template->page_title = 'Редактировть страницу';
		$this->template->block_center = $content;
	}
	
	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $pages = ORM::factory('pages', $id);

        if(!$pages->loaded()) {
            $this->request->redirect('admin/pages');
        }

        $pages->delete();
        $this->request->redirect('admin/pages');
	
	}
}