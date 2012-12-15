<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Index{

    public function action_index() {
		    $this->action_login();
    }

    public function action_login() {
	
	     if(Auth::instance()->logged_in('login')) {
            $this->request->redirect('account');
        }

        if (isset($_POST['submit'])){
          $data = Arr::extract($_POST, array('username', 'password', 'remember'));

		    $status = Auth::instance()->login($data['username'], $data['password'], (bool) $data['remember']);

            if ($status){
                if(Auth::instance()->logged_in('login')) {
                    $this->request->redirect('account');
                }
                
                $this->request->redirect('account');
            }
            else {
                $errors = array(Kohana::message('validation', 'no_user'));
            }
        }
	
	
        $login = View::factory('v_loginform')
                    ->bind('errors', $errors)
					->bind('reg_ok', $this->reg_ok)
                    ->bind('data', $data);
					
	       // Выводим в шаблон
        $this->template->title = 'Авторизация';
        $this->template->page_title = 'Войти в Личный Кабинет';
        $this->template->block_center = array('login'=>$login);
	}
	
	 public function action_register() {

        if (isset($_POST['submit'])){
           $data = Arr::extract($_POST, array('username', 'password', 'first_name', 'password_confirm', 'email', 'phone', 'address', 'country_id', 'zone_id', 'city_id', 'agree'));
           $users = ORM::factory('user');

          // $content->message = '';
           // $content->message = Captcha::valid($_POST['captcha'])? 'Не угадал';
            try {
			    $regdate = date("Y-m-d");
                $users->create_user($_POST, array(
                    'username',
                    'first_name',
                    'password',
                    'email',
					'phone',
					'address',
					'country_id',
					'zone_id',
					'city_id',
					'regdate'=>$regdate,
                ));
                $role = ORM::factory('role', array('name' => 'login'));
			    $users->add('roles', $role);

                $email = Email::factory('Регистрация на сайте','Регистрация на сайте успешно завешена')
                        ->to($data['email'],$data['first_name'])
                        ->from('admin@mykohana.loc','mykohan')
                        ->send();

                $this->action_login();
                $this->request->redirect('account');

			   //	$this->reg_ok = "<p><b>Ваш профил успешно созданно</b></p>";
				
                $this->action_login();
                $this->request->redirect('account');

            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('user');
            }
        }

      //  $captcha = Captcha::instance();

        //$captcha_image = $captcha->render();

		$country = ORM::factory('country')->find_all();
		$zones = ORM::factory('zone')->where('country_id', '=', 176)->find_all();
        $form_register = View::factory('v_registration',array('country'=>$country, 'zones'=>$zones))
                            ->bind('errors', $errors)
                            ->bind('data', $data)
                          ->bind('captcha_image', $captcha_image);

        // Выводим в шаблон
        $this->template->page_title = 'Регистрация новога пользователя';
        $this->template->block_center = array('form_register'=>$form_register);
    }

	
    public function action_logout() {
        if(Auth::instance()->logout()) {
            $this->request->redirect();
        }
    }


}