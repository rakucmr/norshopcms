<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cart extends Controller_Index {


  public function before(){
      	parent::before();

  }

  public function action_index(){
		//Собираем Корзину
		//$p_session = $this->session->get('products');
       $carts = ORM::factory('product');

		if($this->p_session != Null){
			foreach($this->p_session as $id=>$count){

			$carts->or_where('id', 'IN', array($id));
			}
			$carts = $carts->find_all();

		}
		else{
		$carts = null;
		}
		$showcart = View::factory('v_shoppingcart', array(
            'carts' => $carts, 'p_session'=>$this->p_session
        ));

	$this->template->page_title = 'Корзина';
	$this->template->block_center = array('showcart'=>$showcart);

  }

  public function action_add(){

if(isset($_REQUEST['pid'])){
$pid = $_REQUEST['pid'];
}else $pid = (int)$this->request->param('id');
		
if(isset($_REQUEST['count'])){
$conut = $_REQUEST['count'];
}else $conut = 1;

        if(!empty($pid)){

            if(isset($this->p_session[$pid])){
  			    $this->p_session[$pid]++;
  		    }else{
  			    $this->p_session[$pid] = $conut;
  		    }

  		    $this->session->set('products',$this->p_session);
        }

		$this->request->redirect('cart');
  }


  public function action_update(){

         foreach($_POST as $k=>$v){
           if(empty($v)){
              unset($_POST[$k]);
           }
         }
          $this->p_session = $_POST;
          $this->session->set('products',$this->p_session);
          $this->request->redirect('cart');
  }



  public function action_remove(){
    $id = (int)$this->request->param('id');
    if(!empty($id)){
        if(isset($this->p_session[$id])){
			unset($this->p_session[$id]);
		}
		$this->session->set('products',$this->p_session);
   }
  $this->request->redirect('cart');
  }

  public function action_emptycart(){
		$this->session->delete('products');
		$this->request->redirect('cart');
  }

}