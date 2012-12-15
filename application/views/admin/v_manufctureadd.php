<?
if($errors){
	foreach($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="border">
	<ul>
		<li>Название<br><input class="g-4" type="text" name="title" value="<?=$data['title']?>"></li>
		<li>Алиас <br><input class="g-4" type="text" name="alias" value="<?=$data['alias']?>"></li>
		<li>Ссылка <br><input class="g-4" type="text" name="url" value="<?=$data['url']?>"></li>
		<li><br>Изображение <input type="file" name="image"></li>
		<li><br><input class="f-bu" type="submit" name="submit" value=" Сохранить "></li>
	</ul>
</div>
</form>