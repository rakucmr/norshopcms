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
		<option>Выберите каталог товаров</option>
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
	<tr><td>Название: <br><input class="g-8" type="text" size="30" name="title" value="<?=htmlspecialchars($data['title']);?>"></td></tr>
	<tr><td>Артикул: <br><input type="text"  name="code" value="<?=$data['code'];?>"></td></tr>
	<tr><td>Описание: <br><textarea class="g-8" name="description"><?=htmlspecialchars($data['description']);?></textarea></td></tr>
	<tr><td>Цена: <input type="text" name="price" value="<?=$data['price'];?>"></td></tr>
	<tr><td>Описание страницы <br><input class="g-8" type="text" name="meta_description" value="<?=htmlspecialchars($data['meta_description']);?>" /></td></tr>
	<tr><td>Ключевые слова <br><input class="g-8" type="text" name="meta_keywords"  value="<?=htmlspecialchars($data['meta_keywords']);?>" /></td></tr>
	<tr><td>Загрузить изображения: <input type="file" id="multi" name="images[]"></td></tr>
	<tr><td>Статус: <input type="checkbox" name="status" value="1" checked="checked"></td></tr>
	<tr><td><input class="f-bu" type="submit" name="submit" value=" Сохранить "></td></tr>
</table>

 <?if (!empty($data['images'])):?>
<a name="img"></a>
            <table width="100%" cellspacing="20">
                <tr>
                <?foreach($data['images'] as $i =>  $image):?>
                    <td align="center"><?=html::anchor('media/products/'. $image->name, html::image('media/products/small_' . $image->name), array('target' => '_blank'))?>
                        <br><?=html::anchor('admin/products/delimg/' . $image->id, 'Удалить')?> | 
                        <?if ($image->id != $data['image_id'] ):?>
                        <?=html::anchor('admin/products/mainimg/' . $image->id, 'Главная')?>
                        <?else:?>
                        Главная
                        <?endif?>
                    </td>
                    <?if ($i % 2):?>
                        </tr><tr>
                    <?endif?>
                <?endforeach?>
                </tr>
            </table>

            <?else:?>
            <div class="empty">Нет изображений</div>
            <?endif?>
</form>