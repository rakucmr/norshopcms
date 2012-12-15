<!-- TinyMCE -->
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

	});
</script>
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
	<ul>
	<li><br>Название странийы<br><input class="g-8" type="text" name="article_title" value="<?=$data['article_title']?>"><br></li>
	<li>Алиас <br><input class="g-8" type="text" name="article_alias" value="<?=$data['article_alias']?>"><br><br></li>
	<li>
	<textarea class="g-8" id="elm1" name="article_text"><?=$data['article_text']?></textarea>
	</li>
	<li>Описание страницы <br><input class="g-8" type="text" name="article_description" value="<?=$data['article_description']?>"></li>
	<li>Ключевые слова <br><input class="g-8" type="text" name="article_keywords" value="<?=$data['article_keywords']?>"></li>
	<li><br><input class="f-bu" type="submit" name="submit" value=" Сахранить "></li>
	</ul>
	</div>
</form>