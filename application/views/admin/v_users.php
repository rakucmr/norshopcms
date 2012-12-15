<br/>
<p align="right">
<img src="/themes/images/add.png" alt="Добавить" />
<a href="users/add">Добавить</a>
</p>

<table class="border">
<th>N</th><th>Ползователь</th><th>Имя фамилия</th><th>Email</th><th>Роль</th><th>Статус</th><th>функцыи</th>
<?
$i=0;
foreach($users as $user){
$i++;
	print '<tr>
		<td>'.$i.'</td>
		<td>'.$user->username.'</td>
		<td>'.$user->first_name.'</td>
		<td>'.$user->email.'</td><td>';

		foreach($user->roles->find_all() as $role){
        print $role->description;
        }
	print	'</td>
		<td>'.$user->status.'</td>
		<td>
        <a href="users/edit/'.$user->id.'"><img src="/themes/images/edit.png" alt="" /></a>
        <a href="users/delete/'.$user->id.'"><img src="/themes/images/delete.png" alt="" /></a>
    </td>
	</tr>';
}
?>
</table>



