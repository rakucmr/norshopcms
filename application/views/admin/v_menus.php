
<p align="right">
<img src="/themes/images/add.png" alt="Добавить" />
<a href="<?=$url?>/menus/add">Добавить</a>
</p>
<br>
<table class="border">
<tr><th>Название меню</th><th>Тип меню</th><th>Ссылка</th><td colspan="2"></td>
<?foreach($menus as $m):?>
<tr>
<td><?=$m->menu_title?></td><td><?=$m->menu_type?></td><td><?=$m->menu_alias?></td>
<td><a href="<?=$url?>/menus/edit/<?=$m->menu_id?>"><img src="/themes/images/edit.png" alt="Редактировать" /></a></td>
<td><a href="<?=$url?>/menus/delete/<?=$m->menu_id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a></td>
</tr>
<?endforeach?>
</table>