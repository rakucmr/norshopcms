<table class="border">
<?
foreach($payments as $p){
	print '<tr><td>'.$p->payment_id.'</td><td>'.$p->payment_title.'</td></tr>';
}

?>
</table>