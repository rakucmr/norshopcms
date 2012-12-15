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

<form action="" method="post">
	<div class="border">
	<ul >
	<li>Название странийы <br><span class="requird">*</span> <input class="g-8" type="text" name="page_title" value="<?=$data['page_title']?>"></li>
	<li>Алиас <br><span class="requird">*</span> <input class="g-8" type="text" name="page_alias" value="<?=$data['page_alias']?>"><br><br></li>
	<li>
	<textarea class="g-8" name="page_text" ><?=$data['page_text']?></textarea>
	</li>
	<li>Описание страницы <br><input type="text" class="g-8" name="page_description" value="<?=$data['page_description']?>"></li>
	<li>Ключевые слова <br><input type="text" class="g-8" name="page_keywords" value="<?=$data['page_keywords']?>"></li>
	<li>Статус <span class="requird">*</span> <input type="checkbox" checked="checked" name="page_status"></li>
	<li><br><input class="f-bu" type="submit" name="submit" value=" Сахранить "></li>
	</ul>
	</div>
</form>