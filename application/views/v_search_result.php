
<?
if($products){

//print_r($products);
   foreach($products as $product){
      print '<table width="100%" class="border">
      <tr>
      <td colspan="2">
      <h3><a href="/products/product/'.$product->id.'">'.$product->title.'</a> </h3>
      </td>
      </tr>
      <tr>
        <td width="130"><a href="/media/uploads/'.$product->main_img->name.'"><img width="120" src="/media/products/'.$product->main_img->name.'"></a></td>
        <td><p>Производитель: '.$product->manufactures->title.'</p><p>Наличие: Есть в наличии</p>
        <p><b>Цена '.$product->price.' руб. </b></p><div style="width:300px; height:30px; border:0px solid red" ><label>Количество:</label><input style="margin-bottom:20px;" type="count" size="2" value="1"> <a href="/cart/add/'.$product->id.'"><img src="/themes/images/tocart.gif" alt="в корзину"></a> </div>
        </td>
      </tr>
      <tr><td colspan="2">'.substr($product->description, 0, 255) .'</td></tr>
      </table><br><br>';
    }
//print $pagination;
}  else
 if(isset($noresult))print $noresult;



?>