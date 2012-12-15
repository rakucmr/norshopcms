<?
foreach($products as $product){
  print '<table width="100%" class="border">
  <tr>
  <td colspan="2" valign="top">
  <h2><a href="/products/product/'.$product->id.'">'.htmlspecialchars($product->title).'</a></h2>
  </td>
  </tr>
  <tr>
    <td width="130">
    <a href="/media/products/'.$product->main_img->name.'"><img width="120" src="/media/products/'.$product->main_img->name.'"></a>
    </td>
    <td>
    <p>ID:'.$product->code.'</p>
    <p>Производитель: '.$product->manufactures->title.'</p>
    <p><b>Цена '.$product->price.' руб. </b><a class="f-bu f-bu-default" href="/cart/add/'.$product->id.'">в корзину</a></p></div>
    </td>
  </tr>
  <tr><td colspan="2">'.substr(strip_tags($product->description), 0, 300).'</td></tr>
  </table><br>';
}
//print $pagination;
?>