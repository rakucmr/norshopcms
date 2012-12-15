<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Личный кабинет
 */
class Controller_Account extends Controller_Index {
    public function before(){
        parent::before();
        if(!$this->auth->logged_in()) {
            $this->request->redirect('login');
        }
}
    public function action_index() {
 	
        $account = View::factory('v_account');
        // Выводим в шаблон
        $this->template->title = 'Личный кабинет';
        $this->template->page_title = 'Личный кабинет';
        $this->template->block_center = array('account'=>$account);
    }

	public function action_myprofile(){
	
	if(isset($_POST['submit'])){
			$users = ORM::factory('user');
			try {
				$users->where('id', '=', $this->user->id)
						->find()
						->update_user($_POST, array('username','first_name', 'email', 'phone','address'));
				$this->request->redirect('account/myprofile');
			}
			
			catch (ORM_Validation_Exception $e){
				$errors = $e->errors('user');
			}
	}
	
		// Выводим в шаблон
		$profile = View::factory('v_myprofile')->bind('user', $this->user)->bind('errors', $errors);

        $this->template->title = 'Личный кабинет - Персональная информация';
        $this->template->page_title = 'Посмотреть или изменить персональные данные';
        $this->template->block_center = array('profile'=>$profile);
		
	}

	
	public function action_changepassword(){
	
		if(isset($_POST['submit'])){
			$users = ORM::factory('user');
			try {
				$users->where('id', '=', $this->user->id)
						->find()
						->update_user($_POST, array('password'));
				$this->request->redirect('account/changepassword');
			}
			
			catch (ORM_Validation_Exception $e){
				$errors = $e->errors('user');
			}
		}
	
	
	    $chpassword = View::factory('v_change_password')->bind('user', $this->user)->bind('errors', $errors);
        // Выводим в шаблон
        $this->template->title = 'Личный кабинет - ';
        $this->template->page_title = 'Изменение пароля';
        $this->template->block_center = array('chpassword'=>$chpassword);
	}
	
}