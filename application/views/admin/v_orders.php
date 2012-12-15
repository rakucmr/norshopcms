<table width="100%" class="border" border="1">

  <tr><td>ID</td><th>Номер заказа</th><th>Покупатель</th><th>email</th><th>Цена</th><th>Статус заказа</th><th></th></tr>

<?$i=0?>
<? foreach ($orders as  $order):?>
<?$i++?>
  <tr><td><?=$i?> </td><td><a href="orders/details/<?=$order->order_id; ?>"><?=$order->order_id; ?></a></td>
  <td>
  <a href=""><?=$order->users->first_name; ?></a>
  </td>

  <td><?=$order->users->email; ?></td><td><?=$order->total_price; ?></td>
  <td><?=$order->order_status; ?></td>
  <td><a href="orders/delete/<?=$order->order_id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a></td>
  </tr>

  <td><?=$order->users->email; ?></td><td><?=$order->total_price; ?></td><td><a href="orders/delete/<?=$order->order_id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a></td></tr>
 <? endforeach?>
</table>
