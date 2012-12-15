<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Menus extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Меню сайта';
	
	}

	public function action_index(){
	
		$menus = ORM::factory('menugroup')->find_all();
		
		$content = View::factory('/admin/v_menu_groups', array('menus'=>$menus,'url'=>$this->url));
		$this->template->block_center = $content;
	}


	public function action_menu(){
	    $id = (int) $this->request->param('id');
		$menus = ORM::factory('menu')->where('menu_group_id','=',$id)->find_all();

		$content = View::factory('/admin/v_menus', array('menus'=>$menus,'url'=>$this->url));
		$this->template->block_center = $content;
	}
	
	
	
	
	public function action_addgroup(){
	
		if(isset($_POST['submit'])){
		$data = Arr::extract($_POST, array('menu_group_title', 'menu_group_position'));
		$m = ORM::factory('menugroup');
		$m->values($data);

			try{
					$m->save();
					$this->request->redirect('/admin/menus');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}
	
	
	}
	
	
	$content = View::factory('/admin/v_menu_group_add');
	$this->template->block_center = $content;
	
	
	}
	

	
		public function action_editgroup(){

	$id = (int) $this->request->param('id');
    $m = ORM::factory('menugroup', $id);

        if(!$m->loaded()) {
            $this->request->redirect('admin/menus');
    }
	
	if(isset($_POST['submit'])){
	
		$data = Arr::extract($_POST, array('menu_group_title', 'menu_group_position'));
		
		$m->values($data);

			try{
					$m->save();
					$this->request->redirect('/admin/menus');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}
	
	
	}
	
	
	$content = View::factory('/admin/v_menu_group_edit');
	$this->template->block_center = $content;
	}

	


	public function action_deletegroup(){
	    $id = (int) $this->request->param('id');
        $m = ORM::factory('menugroup', $id);

        if(!$m->loaded()) {
            $this->request->redirect('admin/menus');
        }

        $m->delete();
        $this->request->redirect('admin/menus');
	
	}


	
	
	
	public function action_add(){

	if(isset($_POST['submit'])){
		$data = Arr::extract($_POST, array('menu_title', 'menu_type', 'menu_alias', 'menu_url'));
		$m = ORM::factory('menu');
		$m->values($data);

			try{
					$m->save();
					$this->request->redirect('/admin/menus');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}
	
	
	}
	
	
	$content = View::factory('/admin/v_menus_add');
	$this->template->block_center = $content;
	}


	public function action_edit(){

	$id = (int) $this->request->param('id');
    $m = ORM::factory('menu', $id);

        if(!$m->loaded()) {
            $this->request->redirect('admin/menus');
    }
	
	if(isset($_POST['submit'])){
	
		$data = Arr::extract($_POST, array('menu_title', 'menu_type', 'menu_alias', 'menu_url'));
		
		$m->values($data);

			try{
					$m->save();
					$this->request->redirect('/admin/menus');
			}
			catch(ORM_Validation_Exception $e){
					$errors = $e->errors('validation');
			}
	
	
	}
	
	
	$content = View::factory('/admin/v_menus_add');
	$this->template->block_center = $content;
	}


	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $m = ORM::factory('menu', $id);

        if(!$m->loaded()) {
            $this->request->redirect('admin/menus');
        }

        $m->delete();
        $this->request->redirect('admin/menus');
	
	}
	
}