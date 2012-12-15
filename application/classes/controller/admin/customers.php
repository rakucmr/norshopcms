<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Customers extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		$this->template->page_title = 'Покупательи';
	}

	public function action_index(){
//			$r = ORM::factory('rolecustomers', array('name' => 'admin'));
//print_r($r->name);
			
			$customers = ORM::factory('customer')->find_all();
			$content = View::factory('/admin/v_customers',array('customers' =>$customers));
			$this->template->block_center = $content;
	}	

	public function action_add(){
	
        if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array('username', 'password', 'first_name', 'password_confirm', 'email', 'phone', 'address', 'country_id', 'zone_id', 'city_id', 'agree'));
            $users = ORM::factory('customer');

            try {
			$regdate = date("Y-M-D");
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

			//$users->add('roles', ORM::factory('rolecustomers', array('name' => 'login')));
           $users->add('roles', 1);	 
				$this->request->redirect('/admin/customers');
            }
            catch (ORM_Validation_Exception $e) {
                 $errors = $e->errors('validation');
            }
        }

		$content = View::factory('/admin/v_usersadd')
                            ->bind('errors', $errors)
                            ->bind('data', $data);
	
		$this->template->block_center = $content;
	}
	
	public function action_edit(){
		$id = (int) $this->request->param('id');
		
		if(isset($_POST['submit'])){
		$users = ORM::factory('customer');
	    try {
                    $users->where('id', '=', $id)
                            ->find()
                            ->update_user($_POST, array(
                                'username',
								'password',
                                'first_name',
                                'email',
								'phone',
								'address',
								
								'status'
                            ));

				 $this->request->redirect('admin/customers');
                }
                catch (ORM_Validation_Exception $e) {
                    $errors = $e->errors('validation');
                }
		}	
		
		$user = ORM::factory('customer',$id);
		if(!$user->loaded()) {
            $this->request->redirect('admin/customers');
        }
				
			// Выводим в шаблон
		$content = View::factory('/admin/v_usersedit')->bind('users', $user)->bind('errors', $errors);
        $this->template->page_title = 'Редактирование денные покупателья';
        $this->template->block_center = $content;
	}

	public function action_delete(){
			$id = (int) $this->request->param('id');
			$user = ORM::factory('customer', $id);
			
			if(!$user->loaded()) {
				$this->request->redirect('admin/customers');
			}
			
			$user->delete();
			$this->request->redirect('/admin/customers');
		}	
}