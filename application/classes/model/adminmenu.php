<?php defined('SYSPATH') or die('No direct script access.');

class Model_Adminmenu extends Model {

	public function all_menu(){
	return array('Главная'=>'./', 'Каталог'=>'/admin/category', 'Товары'=>'/admin/products', 'Производительи'=>'/admin/manufactures', 'Покупательи'=>'/admin/customers', 'Пользователи'=>'/admin/users', ' Страницы'=>'/admin/pages', 'Модульи'=>'/admin/modules', 'Настройки'=>'/admin/settings');
	}

}


