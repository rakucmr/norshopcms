<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controller_Admin_Base{

	public function before()
	{
		parent::before();
		
		if(!Auth::instance()->logged_in('admin')) {
				$this->request->redirect('/admin/auth');
		}
		
		if(Auth::instance()->logged_in('admin')){
			$admin_info = $this->user;
		$this->template->admin_info = $admin_info;
		}
			
		$admin_menu = View::factory('/admin/v_admin_menu');
		$this->template->admin_menu = $admin_menu;
		
		//Вывод в шаблон
		$this->template->title = 'Админисртрирование';
		$this->template->page_title = 'Главная страница админки';
		
		$this->template->scripts[] = 'js/jquery-1.8.3.min.js';
		$this->template->scripts[] = 'js/jquery-ui-1.8.16.custom.min.js';
		$this->template->scripts[] = 'js/jquery.MultiFile.pack.js';
		$this->template->scripts[] = 'js/upload.js';
		$this->template->scripts[] = 'js/view_images.js';
	
		//JavaScripts для superfish меню (верхный меню)
		$this->template->scripts[] = 'js/tabs.js';
		$this->template->scripts[] = 'js/superfish.js';
		
		$this->template->styles[] = 'js/jquery-ui-1.8.16.custom.css';
		$this->template->styles[] = 'themes/css/framework.css';
		$this->template->styles[] = 'themes/stylesheet.css';
		
		
		

		
	}

	public function action_index(){
		$this->request->redirect('admin/menus');
	}
	
}