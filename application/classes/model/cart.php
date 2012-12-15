<?php defined('SYSPATH') or die('No direct script access.');

class Model_Cart extends Model {

	public function show_cart(){
	return $query = DB::query(Database::SELECT, "select *, count(cart.product_id) as count, sum(products.price) as total from cart, products Where cart.product_id=products.id GROUP BY products.id"  )->execute();
	}

	public function mini_cart(){
	return $query = DB::query(Database::SELECT, "select price, count(cart.product_id) as count, sum(products.price) as total from cart, products Where cart.product_id=products.id GROUP BY products.id"  )->execute();
	}
	
}