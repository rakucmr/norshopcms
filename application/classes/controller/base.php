<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template{

	public $template = 'v_base';
	protected $user;
	protected $auth;
	protected $cache;
	protected $session;
	protected $captcha;

	public function before()
	{
		parent::before();
		
		I18n::lang('ru');
		Cookie::$salt = 'eqw67dakbs';
		Session::$default = 'cookie';
		
		//$this->cache = Cache::instance('file');
		$this->session = Session::instance();
		$this->auth = Auth::instance();
		$this->user = $this->auth->get_user();
		//$captcha = Captcha::instance();
		
		// Подключаем стили и скрипты
        $this->template->styles = array();
        $this->template->scripts = array();
	
		//Вывод в шаблон
		$this->template->title = null;
		$this->template->site_name = null;
		$this->template->page_title = null;
        $this->template->description = null;
		$this->template->keywords = null;

		
		//Подключаем главный шаблон
		$this->template->userarea = null;
		$this->template->top_menu = null;
		$this->template->slider_banner = null;
		$this->template->block_top = null;
		$this->template->block_left = null;
		$this->template->block_center = null;
		$this->template->block_right = null;
		$this->template->block_footer = null;

	}
}