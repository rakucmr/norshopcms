<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Modules extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Модульи';
	
	}

	public function action_index(){

			$modules = ORM::factory('modules')->find_all();
			//$content = View::factory('/admin/v_modules',array('modules' => $modules));
			$this->template->page_title = 'Модульи';
			$this->template->block_center = "";
	}	


	
	public function action_delivery(){
		$delivery = ORM::factory('delivery')->find_all();
		$content = View::factory('/admin/v_modules_delivery',array('delivery' => $delivery));
		$this->template->page_title = 'Модуль доставки';
		$this->template->block_center = $content;
	}	
	
	
	public function action_payments(){
		$payments = ORM::factory('payment')->find_all();
		$content = View::factory('/admin/v_modules_payments',array('payments' => $payments));
		$this->template->page_title = 'Модуль Оплаты';
		$this->template->block_center = $content;
	}
	
	
	
}