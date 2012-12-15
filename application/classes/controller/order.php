<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Order extends Controller_Index{

	public function before(){
		parent::before();
		if(!Auth::instance()->logged_in()) {
            $this->request->redirect('account');
        }
	}
   public function action_index(){
      if(empty($this->payment))
      {
       $this->request->redirect();
      }

       $total_price = 0;
       foreach($this->payment as $cart){

       // $total_count = $total_count+=$this->p_session[$cart->id];
        $total_price = $total_price+=$this->p_session[$cart->id]*$cart->price;
      }
      $order = ORM::factory('order');
<<<<<<< HEAD

=======
>>>>>>> cecd84aa8eff3704118dd19e9035f0b783088b14
      $order->order_user_id = $this->user;
      $order->total_price = $total_price;
      $order->order_date = date("Y-m-d");
      $order->save();
<<<<<<< HEAD
    //print_r($this->p_session);
	
	
	
	//  $this->session->delete('products');
=======
      $this->session->delete('products');
>>>>>>> cecd84aa8eff3704118dd19e9035f0b783088b14
      $this->template->block_center = array(View::factory("v_orderok"));

   }

}