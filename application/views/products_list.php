<script>
$(document).ready(function() {

$(function() { 
		$("form.addtocart").submit(function(){
			$.post("/cart/add", $(this).serialize(), function(data){
			});
		  
			return false;
		});
 
}); 

$(function() {
	$(".addcart").keyup(function() {
			
			$.post("/cart/add", $(this.form).serialize(), function(data){
	          //    alert('sended')
			});	
	});
	return false;
}); 
	
	

	$(".addcart").keyup(function() {
	$(this).css("background","#ccc");
	});
 
        
}); 
</script>


<table style="width:100%" class="border">
<tr><th>Наименовани</th><th>Цена</th><th></th><tr>
<?foreach($products as $product):?>
<form action="/cart/add" class="addtocart" id="formprod" method="post">
<tr>
	<td><a href="/products/product/<?=$product->id?>"><?=$product->title?></a></td>
	<td width="60"><input type="hidden" name="pid" value="<?=$product->id?>"/><b><?=$product->price?></b> руб.</td><td width="150"><input style="float:left;" class="addcart" type="text"  size="1" name="count" value="1"> <a class="f-bu" href="/cart/add/<?=$product->id?>">в корзину</a></td>
<tr>
</form>
<?endforeach?>
</table>
<?=$pagination;?>