<br/>

<p align="right">
<img src="/themes/images/add.png" alt="Добавить" />
<a href="pages/add">Добавить</a>
</p>
<table width="100%"   class="border">
    <thead>
        <tr height="30">
            <th>Название</th><th>Алиас</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($pages as  $page):?>
<tr>
    <td><a href="pages/edit/<?=$page->page_id?>"><?=$page->page_title?></a></td>
	<td><?=$page->page_alias ?></td>
    <td width="100" align="center">
    <a href="pages/edit/<?=$page->page_id?>"><img src="/themes/images/edit.png" alt="Редактировать" /></a>
    <a href="pages/delete/<?=$page->page_id?>"><img src="/themes/images/delete.png" alt="Удалить" /></a>
    </td>
</tr>
<? endforeach?>

</table>