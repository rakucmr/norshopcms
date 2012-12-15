<form action="/cart/update" method="POST">
<table width="100%" class="border">
<tr><th>Товар</th><th>Цена, руб.</th><th>Сумма, руб.</th><th>Кол-во</th><th>Сумма, руб.</th></tr>
<?
$total_count = 0;	
$total_price = 0;

if(isset($carts)){
foreach($carts as $cart){

	print  '<tr>
	<td><a href="/products/product/'.$cart->id.'">'.$cart->title.'</a></td>
	<td>'.$cart->price.'</td>
	<td>'.$p_session[$cart->id]*$cart->price.'</td>
	<td><input type="text" size="2" name="'.$cart->id.'" maxlength=3 value="'.$p_session[$cart->id].'"></td>
	<td><a href="/cart/remove/'.$cart->id.'">Удалить</a></td></tr>';
	$total_count = $total_count+=$p_session[$cart->id];
	$total_price = $total_price+=$p_session[$cart->id]*$cart->price;
	}
	
	print '<tr><td colspan="3"><b>Итого '.$total_price.' руб.</b> &nbsp; <a href="/cart/emptycart">Очистить корзину</a></td><td>'.$total_count.'</td><td>шт.</td></tr>';	
}	
?>

</table>

<br><br>
<table width="100%">
<tr><td><a href="/"><img src="/themes/images/button_continue.gif" alt="Продолжить покупки"></a></td><td><input style="width:104px; height:29px; border:0px; cursor: pointer; background: url('/themes/images/button_update_cart.gif') no-repeat" type="submit" name=" " value=" " /></td><td><a href="/order"><img src="/themes/images/button_checkout.gif"></a></td></tr>
</table>
</form>