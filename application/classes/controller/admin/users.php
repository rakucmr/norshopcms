<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Users extends Controller_Admin_Index{

	public function before()
	{
		parent::before();
		$this->template->page_title = 'Пользовательи';
	}

	public function action_index(){

			$users = ORM::factory('user')->find_all();
			$content = View::factory('/admin/v_users',array('users' =>$users,'url'=>$this->url));
			$this->template->block_center = $content;
	}	

	public function action_add(){
	
	    if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array('username', 'password', 'first_name', 'password_confirm', 'email', 'phone','status'));
			
			$users = ORM::factory('user');

            try {
                $users->create_user($_POST, array(
                    'username',
                    'password',
                    'email',
                    'first_name',
					'phone',
                    'address',
                    'country_id',
                    'zone_id',
					'status'
                ));

                $role = ORM::factory('role', array('name' => 'login'));
             //   $users->add('roles', $role);
				$users->add('roles', ORM::factory('role', array('name' => 'login')));
				$users->add('roles', ORM::factory('role', array('name' => 'admin')));
                $this->request->redirect('/admin/users');
            }
            catch (ORM_Validation_Exception $e) {
                 $errors = $e->errors('user');
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
		$users = ORM::factory('user');
	    try {
                    $users->where('id', '=', $id)
                            ->find()
                            ->update_user($_POST, array(
                                'username',
								'password',
                                'first_name',
                                'email',
								'phone',
								'status'
                            ));

				 $this->request->redirect('admin/users');
                }
                catch (ORM_Validation_Exception $e) {
                    $errors = $e->errors('user');
                }
		}	
		
		$user = ORM::factory('user',$id);
		if(!$user->loaded()) {
            $this->request->redirect('admin/users');
        }
				
			// Выводим в шаблон
		$content = View::factory('/admin/v_usersedit')->bind('users', $user)->bind('errors', $errors);
        $this->template->page_title = 'Редактирование ползователя';
        $this->template->block_center = $content;
	}

	public function action_delete(){
			$id = (int) $this->request->param('id');
			$user = ORM::factory('user', $id);
			
			if(!$user->loaded()) {
				$this->request->redirect('admin/users');
			}
			
			$user->delete();
			$this->request->redirect('/admin/users');
		}	
}