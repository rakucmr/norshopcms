<p align="right">
<img src="/themes/images/add.png" alt="добавиь" />
<a href="articles/add">Добавить</a>
</p>
<table width="100%"   class="border">
    <thead>
        <tr height="30">
            <th>Название</th><th>Алиас</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($articles as  $article):?>
<tr>
    <td><a href="articles/edit/<?=$article->article_id?>"><?=$article->article_title?></a></td>
	<td><?=$article->article_alias ?></td>
    <td width="100" align="center">
    <a href="articles/edit/<?=$article->article_id?>"><img src="/themes/images/edit.png" alt="Редактировать" /></a>
    <a href="articles/delete/<?=$article->article_id?>"><img src="/themes/images/delete.png" alt="Удалитб" /></a>
    </td>
</tr>
<? endforeach?>

</table>