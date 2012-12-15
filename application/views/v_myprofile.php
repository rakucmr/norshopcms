<?
if($errors){
	foreach($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>

<form method="post" action="">
<table class="profile border">
<?
$str = '<tr>
          <td><span class="required">*</span> Имя, Отчество:</td>
          <td><input type="text" name="first_name" value="'.$user->first_name.'">
            </td>
        </tr>
		<tr>
          <td><span class="required">*</span> E-Mail:</td>
          <td><input type="text" name="email" value="'.$user->email.'">
            </td>
        </tr>
		<tr>
          <td><span class="required">*</span> Телефон:</td>
          <td><input type="text" name="phone" value="'.$user->phone.'"></td>
		 </tr> 
		<tr>
		<tr><td>Адрес </td><td><input type="text" name="address" value="'.$user->address.'"></td></tr>
		  <td colspan="2"><input type="submit" name="submit" value=" Сохранить "></td>
       </tr>';
		
print $str;		

?>
</table>
</form>