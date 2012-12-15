<table class="border">
<?
foreach($delivery as $d){
	print '<tr><td>'.$d->delivery_id.'</td><td>'.$d->delivery_title.'</td></tr>';
}

?>
</table>