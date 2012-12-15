<br/>
<p align="right">
<a href="manufactures/add"><img src="/themes/images/add.png" />Добавить</a>
</p>

<table width="100%" class="border">
<tr><th>Название</th><th>Сайт</th><th>Алиас</th><th>Изображение</th><th></th></tr>
<?
foreach($data as $d){

print '<tr><td>'.$d->title.'</td><td>'.$d->url.'</td><td>'.$d->alias.'</td><td>
<a href="/media/manufactures/'.$d->image.'"><img width="100" src="/media/manufactures/'.$d->image.'"></a></td>
<td><a href="manufactures/edit/'.$d->id.'"><img src="/themes/images/edit.png" alt="Редактировать" /></a>
 <a href="manufactures/delete/'. $d->id.'"><img src="/themes/images/delete.png" alt="Удалить" /></a>
 </td></tr>';
}

?>
</table>