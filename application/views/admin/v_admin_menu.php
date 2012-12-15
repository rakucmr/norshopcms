<?$url = URL::site('admin') ?>
<ul id="menu">
	<li><a href="<?=$url?>">Меню сайта</a></li>
	<li><a href="<?=$url?>/category">Каталог</a>
		<ul>
		<li><a href="<?=$url?>/products">Товары</a></li>
		<li><a href="<?=$url?>/manufactures">Производительи</a></li>
		</ul>
	</li>
	<li><a href="<?=$url?>/orders">Заказы</a></li>
	<li><a href="<?=$url?>/pages">Страницы</a></li>
    <li><a href="<?=$url?>/articles">Статии</a></li>
	<li><a href="<?=$url?>/banners">Ваннеры</a></li>
	<li><a href="<?=$url?>/system">Система</a>
		<ul>
			<li><a href="<?=$url?>/users">Пользовательи</a></li>
			<li><a href="<?=$url?>/system/settings">Настройки</a></li>
			<li>
			<a href="#">Локализация</a>
			<ul>
			<li><a href="<?=$url?>/countries">Страны и Регионы</a></li>
			<li><a href="#">Валюта</a></li>
			</ul>
			</li>
		</ul>
	</li>
</ul>