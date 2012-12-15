<br/>
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
<h2>Регистрация новога пользователя</h2>

<form  action="" method="POST">
<table align="center"  class="border">
  <tr>
    <td>Логин: <span class="required">*</span></td>
    <td><input class="g-3" type="text" name="username" placeholder="Логин" value="<?=$data['username']?>" /></td>
  </tr>
  <tr>
    <td>Пароль: <span class="required">*</span></td>
    <td><input class="g-3" type="password"  placeholder="Пароль" name="password" value="<?=$data['password']?>" /></td>
  </tr>
  <tr>
    <td>Повтарите пароль: <span class="required">*</span></td>
    <td><input class="g-3" type="password" name="password_confirm" placeholder="Повторите пароль" value="<?=$data['password_confirm']?>" /></td>
  </tr>
 <tr>
     <td>Компания: </td>
     <td><input class="g-3" type="text" name="company" /></td>
 </tr>

  <tr>
    <td>ИФО: <span class="required">*</span></td>
    <td><input class="g-3" type="text" name="first_name" placeholder="ИФО" value=" <?=$data['first_name']?>" /></td>
  </tr>
  <tr>
    <td>Email: <span class="required">*</span></td>
    <td><input class="g-3" type="text" name="email" placeholder="Ваш email" value="<?=$data['email']?>" /></td>
  </tr>
  <tr>
    <td>Номер телефона: <span class="required">*</span></td>
    <td><input class="g-3" type="text" name="phone" placeholder="Номер телефона" value="<?=$data['phone']?>" /></td>
  </tr>
  <tr>
    <td>Адрес: <span class="required">*</span></td>

    <td><input class="g-3" type="text" name="address" placeholder="Ваш реальный адрес" value="<?=$data['address']?>" /></td>
  </tr>
  <tr>
    <td>Страна: <span class="required">*</span></td>
    <td><select name="country_id">
               <option value=""> --- выберите регион --- </option>
			  <?
			  foreach($country as $c){
			  if($c->country_id == 176){

				print '<option selected="selected" value="'.$c->country_id.'">'.$c->country_name.'</option>';
				}
				else  {print '<option value="'.$c->country_id.'">'.$c->country_name.'</option>';}
			  }
			  ?>
			</select>
    </td>
  </tr>

  <tr>
    <td>Регион: <span class="required">*</span></td>
     <td>
 		  <select name="zone_id">
              <option value="">-- Выберите регион-- </option>
			  <?
 			  foreach($zones as $z){
			  print '<option value="'.$z->zone_id.'">'.$z->name.'</option>';
			  }
			  ?>
			</select>
             </td>
  </tr>
        <tr>
	  <td>
      Введите код указанный на рисунке:
	  </td>
      <td><?=$captcha_image?><br /><input type="text" name="captcha" /></td>
      </tr>
  <tr>
        <td colspan="2" align="center">
		Я прочитал <a  href="" alt="Политика Безопасности"><b>Политика Безопасности</b></a> и согласен с условиями  <input type="checkbox" name="agree" value="1" />

		</td>
    </tr>


   <tr>
    <td></td>
    <td><input class="f-bu" type="submit" id="submit" name="submit" value=" Регистрация " /></td>
  </tr>
</table>
</form>