<div id="manufactures">
<ul>
<?
foreach($manufactures as $m){
print '<li ><a href="/manufactures/manufacture/'.$m->id.'"><img width="100" height="50" src="/media/manufactures/'.$m->image.'"></a></li>';
}
?>
</ul>
</div>
