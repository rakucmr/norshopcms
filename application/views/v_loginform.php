<?if($errors):?>
	<?foreach ($errors as $error):?>
	<div class="error_msg"><?=$error?></div>
	<?endforeach?>
<?endif?>
<h2><br>Войти в Личный Кабинет</h2>
<div id="formlogin">
<form action="/login" method="post">
<ul>
<li><h2>Авторизаия</h2></li>
<li><label for=name">Логин</label>: &nbsp; <input type="text" name="username" /></li>
<li><label for="password">Пароль</label>: <input type="password" name="password" /></li>
<li><input type="checkbox" name="remember" />Запомнить<br/></li>
<li><input class="f-bu" type="submit" name="submit" value=" Войти " /> <a href="passwordforgot">Забыли пароль?</a> <a href="/register">Регистрация</a></li>
</form>
</div>
<br><br>