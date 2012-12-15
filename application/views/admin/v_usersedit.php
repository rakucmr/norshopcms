<?
if($errors){
	foreach($errors as $error){
		if(is_array($error)){
		foreach($error as $e){print '<div class="error_msg">'.$e.'</div>';}
		}
		else {print '<div class="error_msg">'.$error.'</div>';}
	}
}
?>
<form method="post" action="">
<?
print '<ul><li>Логин:<input class="g-4" type="text" name="username" value="'.$users->username.'"></li>
<li>Проль <input class="g-4" type="password" name="password" ></li>
<li>Павторить пароль <input class="g-4" type="password" name="password_confirm"></li>
<li>Имя Фамилия <input class="g-4" type="text" name="first_name" value="'.$users->first_name.'"></li>
<li>Email <input class="g-4" type="text" name="email" value="'.$users->email.'"></li>
<li><span class="required">*</span> Телефон:<input class="g-4" type="text" name="phone" value="'.$users->phone.'"></li>
<li>Статус <input type="checkbox" name="status" value="1" ></li>
<li><input class="f-bu" type="submit" name="submit" value=" Сохранить "></li>
</ul>';
?>
</form>