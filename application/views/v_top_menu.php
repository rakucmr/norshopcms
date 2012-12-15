<div class="f-nav-bar">
	<div class="f-nav-bar-body">

<ul class="f-nav">
<?foreach($menus as $m):?>
<? if($m->menu_type=='url'):?>
<li><a href="/<?=$m->menu_alias?>"><?=$m->menu_title?></a></li>
<?else:?>
	<li><a href="/<?=$m->menu_type?>/<?=$m->menu_alias?>"><?=$m->menu_title?></a></li>
<?endif?>	
<?endforeach?>
</ul><!-- f-nav -->

</div><!-- f-nav-bar-body -->
</div><!-- f-nav-bar -->