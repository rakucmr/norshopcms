<p align="right">
<img src="/themes/images/add.png" alt="Добавить" />
<a href="<?=$url?>/menus/addgroup">Добавить</a>
</p>
<table class="border">
<?foreach($menus as $mg):?>
<tr><td><a href="<?=$url?>/menus/menu/<?=$mg->menu_group_id?>"><?=$mg->menu_group_title?></a></td><td><a href="<?=$url?>/menus/editgroup/<?=$mg->menu_group_id?>"><img src="/themes/images/edit.png" alt="Редактировать" /></a></td><td><a href="<?=$url?>/menus/deletegroup/<?=$mg->menu_group_id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a></td></tr>
<?endforeach?>
</table>