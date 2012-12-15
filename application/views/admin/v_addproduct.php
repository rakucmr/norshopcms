<!-- TinyMCE -->
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tinymce_config.js" ></script>
<!-- /TinyMCE -->

<?
if($errors){
	foreach($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table class="border">
	<tr>
		<td colspan="2">
		<select name="cat_id">
		<option>--Выберите каталог товаров--</option>
		<?foreach ($cats as $cat):?>
        <option value="<?=$cat->id?>">
            <?=str_repeat('&nbsp;', 2 * $cat->lvl) .$cat->category_title ?>
        </option>
		<?endforeach?>
   	</select>

    <select name="manufacture_id">
    <option value="">--Выберите производителя--</option>
    <?foreach($manufactures as $m):?>
    <option value="<?=$m->id?>"><?=$m->title?></option>
    <?endforeach?>
    </select>
   Есть в наличии <input type="radio" name="nalichi" value="Есть в наличии" />
        Нет в наличии<input type="radio" name="nalichi" value="Нет в наличии" />
		</td>
	</tr>

	<tr><td>Название: <br><input class="g-8" type="text"  name="title" value="<?=$data['title'];?>"></td></tr>
	<tr><td>Артикул: <br><input type="text"  name="code" value="<?=$data['code'];?>"></td></tr>
	<tr><td>Описание: <br><textarea class="g-8" id="elm1" name="description"><?=$data['description'];?></textarea></td></tr>
	<tr><td>Цена: <br><input type="text" name="price" value="<?=$data['price'];?>"></td></tr>
	<tr><td>Описание страницы <br><input class="g-8" type="text" name="meta_description"></td></li>
	<tr><td>Ключевые слова <br><input class="g-8" type="text" name="meta_keywords"></td></li>
	<tr><td>Загрузить изображения: <br><input type="file" id="multi" name="images[]"></td></tr>
	<tr><td colspan="2">Статус: <input type="checkbox" name="status" value="1" checked="checked"></td></tr>
	<tr><td colspan="2"><input class="f-bu" type="submit" name="submit" value=" Сохранить "></td></tr>
</table>

	<!-- Some integration calls -->
		<a href="javascript:;" onclick="tinyMCE.get('elm1').show();return false;">[Show]</a>
		<a href="javascript:;" onclick="tinyMCE.get('elm1').hide();return false;">[Hide]</a>
		<br />
</form>