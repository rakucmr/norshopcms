<div id="minicart" class="hide_minicart">
<?
$total_count = 0;
$total_price = 0;
print '<a href="/cart"><img width="60" src="/themes/images/shopcart.png"></a>';
  if(isset($carts)){
    foreach($carts as $cart){
      $total_count = $total_count+=$p_session[$cart->id];
      $total_price = $total_price+=$p_session[$cart->id]*$cart->price;
    }

  }

if(!empty($total_count)){

			 print '<p>Общая сумма '.$total_price.' руб.';
			 print '<br>В корзине '.$total_count.' товара(ов)</p>';
				}
			  else print "<p>Ваша корзина пуста</p>";
?>
</div>