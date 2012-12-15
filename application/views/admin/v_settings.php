<div id="settings">
<form action="" method="post">
<ul>
	<?foreach($settings as $s):?>
	<li><b>Адрес сайта</b><br><input class="g-8" type="text" name="url" value="<?=$s->url?>"/>
	<li><b>Название сайта</b><br><input class="g-8" type="text" name="title" value="<?=$s->title?>"/>
	<li><b>Описание сайта</b><br><input class="g-8" type="text" name="meta_description" value="<?=$s->meta_description?>"/>
	<li><b>Ключевые слова</b><br><textarea class="g-8" name="meta_keywords" value="<?=$s->meta_keywords?>"/></textarea>
	<?endforeach?>
	<li><br><input class="f-bu" type="submit" name="submit" value=" Сахранить " />
</ul>
</form>
</div>