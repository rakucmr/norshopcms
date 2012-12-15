<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Auth extends Controller_Admin_Base{

	public $template = 'admin/v_login';

	public function before()
	{
		parent::before();
			// Выводим в шаблон
    $this->template->title = 'Вход в пенель управления';
    $this->template->page_title = 'Авторизация';	
	}
	
    public function action_index() {
        $this->action_login();
    }
	
	public function action_login() {


        if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array('username', 'password', 'remember'));
          print $status = Auth::instance()->login($data['username'], $data['password'], (bool) $data['remember']);

	        if ($status){
                if(Auth::instance()->logged_in('admin')) {
					$this->request->redirect('admin');
                }
                
           $this->request->redirect('admin/auth');
            }
            else {
                $errors = array(Kohana::message('validation','no_user'));
				$this->template->errors = $errors;
            }
		 
		}

        	
	}

    public function action_logout() {
        if(Auth::instance()->logout()) {
            $this->request->redirect('admin');
        }
    }	
	
	

}