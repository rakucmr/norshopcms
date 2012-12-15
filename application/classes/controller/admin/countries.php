<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Countries extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Страны';
	}

	public function action_index(){

			$count = ORM::factory('country')->count_all();

            $pagination = Pagination::factory(array('total_items' => $count,))
						->route_params(array(
						'controller' => Request::current()->controller(),
						'action' => Request::current()->action(),
						));
			
			$countries = ORM::factory('country')
							->limit($pagination->items_per_page)
							->offset($pagination->offset)
							->find_all();
				
			$content = View::factory('/admin/v_countries',array('countries' => $countries, 'pagination'=>$pagination));
			$this->template->page_title = 'Страны';
			$this->template->block_center = $content;
	}	

	public function action_add(){
		if(isset($_POST['submit'])){
 
			$data = Arr::extract($_POST, array('country_name', 'iso_code_2', 'iso_code_3'));
			$countries = ORM::factory('country');
			$countries->values($data);
				
			try{
					$countries->save();
					$this->request->redirect('/admin/countries');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}

		}
		
		$content = View::factory('/admin/v_addcoutry')
					->bind('errors', $errors)
					->bind('data',$data);
		
		$this->template->page_title = 'Добавить страницу';
		$this->template->block_center = $content;
	}
	
	public function action_edit(){
	$id =(int) $this->request->param('id');
	$countries = ORM::factory('country', $id);
	
	if(!$countries->loaded()){
		$this->request->redirect('/admin/countries');
	}
	
	$data = $countries->as_array();
	
		
	// Редактирование
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('page_title', 'page_alias', 'page_text'));
            $countries->values($data);

            try {
                $countries->save();
                $this->request->redirect('admin/pages');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }
		$content = View::factory('/admin/v_editcountry')
					->bind('id', $id)
					->bind('errors', $errors)
					->bind('data', $data);
					
		$this->template->page_title = 'Редактировть страницу';
		$this->template->block_center = $content;
	}
	
	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $countries = ORM::factory('country', $id);

        if(!$pages->loaded()) {
            $this->request->redirect('admin/countries');
        }

        $countries->delete();
        $this->request->redirect('admin/countries');
	
	}
}