<div id="manufactures" style="padding:5px;">
<ul>
<?
if(!empty($manufacture['image'])){
print '<li><a href="/manufactures/manufacture/'.$manufacture['id'].'"><img src="/media/manufactures/'.$manufacture['image'].'"></a></li>';
}
print '<li><a href="/manufactures/manufacture/'.$manufacture['id'].'">'.$manufacture['title'].'</a></li>';
print '<li><br>Сайт производителя <a href="http://'.$manufacture['url'].'">'.$manufacture['url'].'</a></li>';
?>
</ul>
</div>
