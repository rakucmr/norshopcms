<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Base extends Controller_Template{

	public $template = 'admin/v_base';
	
	protected $user;
	protected $auth;
	protected $cache;
	protected $session;
	public $url;
	public $uri;
	

	public function before()
	{
		parent::before();

		I18n::lang('ru');
		Cookie::$salt = 'eqw67dakbs';
		Session::$default = 'cookie';
		
	//	$this->cache = Cache::instance('file');
		$this->session = Session::instance();
		$this->auth = Auth::instance();
		$this->user = $this->auth->get_user();
		$this->url = URL::site('admin');
		$this->uri = $this->request->uri();
		
		//Вывод в шаблон
		$this->template->title = '';
		$this->template->page_title = '';

		// Подключаем стили и скрипты
        $this->template->styles = array();
        $this->template->scripts = array();
		
	
		//Подключаем блоки
		$this->template->admin_menu = null;
		$this->template->admin_info = null;
		$this->template->block_left = null;
		$this->template->block_center = null;
		$this->template->block_right = null;
	}

	 // $curdir = Request::current()->directory();
	//	$this->admindir = $this->request->directory();
	//	print $action = $this->request->action();
		//print "<br>";
	//	print $controller = $this->request->controller();
		

				//Вывод в шаблон
		//$menus = Model::factory('adminmenu')->all_menu();
		//$this->template->menus = $menus;	
	
}