<script>
$(document).ready(function(){

	$('#cat').change(function() {
		$('#fromselect').submit();                
	});
});

</script>


<form id="fromselect" action="" method="get">
		<select id="cat" name="cat_id">
		<option>Выберите каталог товаров</option>
		<?foreach ($categories as $cat):?>
        <option value="<?=$cat->id?>">
            <?=str_repeat('&nbsp;', 2 * $cat->lvl) .$cat->category_title ?>
        </option>
		<?endforeach?>
		</select>
</form>

<p align="right">
<a href="products/add"><img src="/themes/images/add.png" alt="Добавить" />Добавить</a>
</p>

<? if(isset($_GET['cat_id'])):?>
<table width="100%" class="border">
    <thead>
        <tr height="30">
            <th>N</th><th>Категория</th><th>Изображения</th><th>Название</th><th>Цена</th><th>Функции</th>
        </tr>
    </thead>
<? 
$i=0;
foreach ($products as  $product):
$i++;
?>
<tr>
<td><?=$i?></td>
<td><?//=$product->category_id?></td>
<td><a href="/media/products/<?=$product->main_img->name?>"><img width="120" src="/media/products/<?=$product->main_img->name?>"></a></td>
    <td ><a href="products/edit/<?=$product->id?>"><?=$product->title?></a></td>
    <td width="100" align="center"><?=$product->price?></td>
    <td width="100" align="center">
    <a href="products/edit/<?=$product->id?>"><img src="/themes/images/edit.png" alt="Редактировать" /></a>
    <a href="products/delete/<?=$product->id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a>
</td>
</tr>
<? endforeach?>

</table>

<?=$pagination?>
<?endif?>