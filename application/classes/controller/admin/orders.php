<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Orders extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		//Вывод в шаблон
		$this->template->page_title = 'Заказы';
	
	}

	public function action_index(){

				if(!Auth::instance()->logged_in()) {
				$this->request->redirect('/admin/auth');
				}
            $orders = ORM::factory('order')->find_all();
			$this->template->block_center = View::factory('/admin/v_orders', array('orders'=>$orders));
	}

	public function action_details(){
	$id = (int) $this->request->param('id');
	$order = ORM::factory('order',$id);
	$this->template->block_center = View::factory('/admin/v_order_details', array('order'=>$order));
	}
	
	
	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $orders = ORM::factory('order', $id);

        if(!$orders->loaded()) {
            $this->request->redirect('admin/orders');
        }

        $orders->delete();
        $this->request->redirect('admin/orders');

	}
}