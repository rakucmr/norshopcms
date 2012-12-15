<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru" xml:lang="ru">
<head>
<title>Панель управления</title>
<?foreach ($styles as $file_style):?>
<?=html::style($file_style)?>
<?endforeach?>
<?foreach ($scripts as $file_script):?>
<?=html::script($file_script)?>
<?endforeach?>

<script type="text/javascript"><!--
$(document).ready(function() {
	$('#menu > ul').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('#menu > ul').css('display', 'block');
});
 
//--></script> 
</head>
<body>
<div id="wrapper">
<div id="header">
<a href="/" target="_blank">Магазин</a> <a href="/admin/users/edit/<?=$admin_info?>"><?=$admin_info->first_name;?></a> ( <a href="/admin/auth/logout">Выход</a> )
</div>

	<div id="container">
		<div id="menu">
		<ul class="left" style="display: none;">
		  <li ><a href="/admin" class="top">Панель управления</a></li>
		  <li id="/admin/catalog"><a class="top">Каталог</a>
			<ul>
			  <li><a href="/admin/category">Категории</a></li>
			  <li><a href="/admin/products">Товары</a></li>
			  <li><a href="/admin/manufactures">Производители</a></li>
			</ul>
		  </li>
		  <li id="extension"><a href="/admin/pages" class="top">Страницы</a></li>
		   <li id="extension"><a href="/admin/articles" class="top">Статьи</a></li>
		  <li id="system"><a  class="top">Система</a>
			<ul>
			<li><a href="/admin/system">Настройки</a></li>
			<li><a href="/admin/users">Пользовательи</a></li>
			<li><a href="/admin/banners">Баннеры</a></li>
		   </li>

			  <li><a class="parent">Локализация</a>
				<ul>

				  <li><a href="/admin/countries">Страны</a></li>
				  <li><a href="">Регионы</a></li>
				</ul>
			  </li>
			</ul>
		  </li>
		</ul>
		</div>
		<div id="content">
			<h2><?=$page_title ?></h2>
			<?=$block_center ?>
		</div>
	</div>
</div>
</body></html>