<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
//
  public function labels()
    {
        return array(
            'username' => 'Логин',
            'email' => 'E-mail',
            'first_name' => 'ФИО',
            'password' => 'Пароль',
            'password_confirm' => 'Повторить пароль',
			'phone' => '   Номер телефона',
        );
    }

    public function rules()
	{
		return array(
			'username' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 32)),
				array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
				array(array($this, 'unique'), array('username', ':value')),
			),
            'first_name' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 32)),
			),
			'password' => array(
				array('not_empty'),
				//array('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'))
			),
			'email' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 127)),
				array('email'),
			//	array(array($this, 'email_available'), array(':validation', ':field')),
			array(array($this, 'unique'), array('email', ':value')),
			),
			'phone' => array(
				array('not_empty'),
				//array('phone'),
				),
      		'fax' => array(

				),
            /*'address' => array(
				array('not_empty'),
			), */
           'country_id' => array(
				array('not_empty'),
			),

		);
	}



    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
			'password' => array(
				array(array(Auth::instance(), 'hash'))
			),
			'username' => array(
                array('strip_tags'),
            ),
            'address' => array(
                array('strip_tags'),
            ),
            'first_name' => array(
                array('strip_tags'),
            ),
        );
    }

	
	public function username_available($usern)
    {
        // There are simpler ways to do this, but I will use ORM for the sake of the example
        return ORM::factory('user', array('username' => $usern))->loaded();
    }


  public static function get_password_validation($values)
  {
  return Validation::factory($values)
   ->rule('password', 'min_length', array(':value', 4))
   ->rule('password_confirm', 'matches', array(':validation', ':field', 'password'));
  }

} 
