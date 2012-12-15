<?
if($errors){
	foreach($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div style="width:300px; height:200px; padding:10px; border:1px solid lightgray;">
	<ul style="float:right">
		<li>Название <input type="text" name="title" value="<?=$data['title']?>"></li>
		<li>Алиас <input type="text" name="alias" value="<?=$data['alias']?>"></li>
		<li>Ссылка <input type="text" name="url" value="<?=$data['url']?>"></li>
		<li>Изображение <input type="file" name="image"></li>
		<li><input type="submit" name="submit" value=" Сохранить "></li>
	</ul>
</div>
</form>