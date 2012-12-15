<?php defined('SYSPATH') or die('No direct script access.');

class Model_Page extends Model {

	public function page($alias){
	return $row = $query = DB::query(Database::SELECT, "select * from pages where page_alias='$alias'")->execute();
	}
}
