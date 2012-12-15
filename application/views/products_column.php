<?foreach($products as $product):?>
<div class="product_column">

	<div class="image"><a href="/media/products/<?=$product->main_img->name?>"><img class="image" src="/media/products/<?=$product->main_img->name?>"></a></div>
	<h2 class="title"><a href="/products/product/<?=$product->id?>"><?=substr($product->title, 0, 50)?></a></h2>
	<p>ID: <?=$product->code?></p>
	<p><b>Цена <?=$product->price?> руб.</b></p>
	<p><a class="f-bu" href="/cart/add/<?=$product->id?>">в корзину</a></p>

</div>
<?endforeach?>
<?=$pagination;?>