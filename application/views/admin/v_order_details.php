<<<<<<< HEAD
<?	  print "<pre>";
	 print_r($order->order_id);
//	 print_r($order->users);
//print_r($order->orders_products);
	  print "</pre>";?>
<?/*
<table class="border">
<tr><td>Номер заказа</td><td> <?=$order->order_id?></td></tr>
<tr><td>Имя</td><td> <?=$order->users->first_name?></td></tr>
<tr><td>e-mail</td><td><?=$order->users->email; ?></td></tr>
<tr><td>Сумма</td><td><?=$order->total_price; ?></td></tr>
<tr><td>Адрес</td><td> <?=$order->users->address; ?></td></tr>
<tr><td>Статус заказа</td><td> <?=$order->order_status; ?></td></tr>
</table>

*/?>

=======
<table class="border">
<tr><td><?=$order->order_id?></td></tr>
<tr><td><?=$order->users->first_name?></td></tr>
<tr><td><?=$order->users->email; ?></td></tr>
<tr><td><?=$order->total_price; ?></td></tr>
</table>

>>>>>>> cecd84aa8eff3704118dd19e9035f0b783088b14






