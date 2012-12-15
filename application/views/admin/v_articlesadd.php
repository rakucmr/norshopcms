<!-- TinyMCE -->
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tinymce_config.js" ></script>
<!-- TinyMCE -->

<?
if($errors){
	foreach($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>

<form action="" method="post">
	<div class="border">
	<ul>
	<li>Название странийы <br><input class="g-8" type="text" name="article_title" value="<?=$data['article_title']?>"></li>
	<li>Алиас <br><input class="g-8" type="text" name="article_alias" value="<?=$data['article_alias']?>"><br><br></li>
	<li>
	<textarea class="g-8" id="elm1" name="article_text" value="<?=$data['article_text']?>"></textarea>
	</li>
	<li>Описание страницы <br><input class="g-8" type="text" name="article_description"></li>
	<li>Ключевые слова <br><input class="g-8" type="text" name="article_keywords"></li>
    <li><br>Опубликовн <input type="checkbox" name="article_status"  checked="checked" value="1" /></li>
	<li><br><input class="f-bu" type="submit" name="submit" value=" Сахранить "></li>
	</ul>
	</div>
</form>