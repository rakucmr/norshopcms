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


<style type="text/css">
#change_password{
width:400px; height:160px; border:1px solid lightgray;text-align:left;
}

#change_password ul li{
float:right; padding:5px;
}

</style>

<div id="change_password">
<form action="" method="post">
<ul>
<li>Старый пароль * <input type="password" name="newpassword"></li>
<li>Новый пароль * <input type="password" name="password"></li>
<li>Павторить пароль *  <input type="password" name="password_confirm"></li>
<li><input type="submit" name="submit" value=" Сахранить "></li>
</ul>
</form>
</div>