<br/>
<p align="right">
<a href="<?=$url?>/category/add"><img src="/themes/images/add.png">Добавить</a> <a href="<?=$url?>/category/delete">Удалить</a>
</p>

<table class="border">
	<tr><th> Название категории </th><th width="60"> Функцыи </th></tr>
		<?foreach ($categories as $cat):?>
  	<tr><td>     
            <input type="checkbox" name="cat_id" value="<?=$cat->id?>"><?=str_repeat('&nbsp;', 2 * $cat->lvl)?><a href="<?=$url?>/category/edit/<?=$cat->id?>"><?=$cat->category_title ?></a></td>
		<td><a href="<?=$url?>/category/delete/<?=$cat->id?>">Удалить</a></td>
	</tr>  
		<?endforeach?>
</table>


		  

