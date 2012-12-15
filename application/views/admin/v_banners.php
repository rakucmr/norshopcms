<br/>

<p align="right">
<img src="/themes/images/add.png" alt="Довавить" />
<a href="banners/add">Добавить</a>
</p>
<table width="100%"   class="border">
    <thead>
        <tr height="30">
            <th>Название</th><th>Ссылка</th><th>Изображение</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($banners as  $b):?>
<tr>
    <td><a href="banners/edit/<?=$b->banner_id?>"><?=$b->banner_title?></a></td>
	<td><?=$b->banner_url?></td>
	<td><?=$b->banner_image?></td>
    <td width="100" align="center">
    <a href="banners/edit/<?=$b->banner_id?>"><img src="/themes/images/edit.png " alt="Редактировать" /></a>
    <a href="banners/delete/<?=$b->banner_id?>"><img src="/themes/images/delete.png " alt="Удалить" /></a>

    </td>
</tr>
<? endforeach?>

</table>