<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Index {
	
 public function action_index()
	{
	$keyword = Arr::get($_GET, 'search_keyword');
	$keyword = trim($keyword);
	
	
	   if(!empty($keyword )){

	   $products = ORM::factory("product")->where('title', "like", "%$keyword%")->find_all()->as_array();
       $no = 'нечего не найдена';
       $result = View::factory('v_search_result')->bind('products',$products)->bind('noresult',$no);
       $this->template->block_center = array('result'=>$result);

  		}

	}
}