<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" lang="ru"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" lang="ru"><![endif]-->
<!--[if IE 8]><html class="lt-ie9" lang="ru"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ru"><!--<![endif]-->
<head>
<title><?=$title; ?> <?=$page_title; ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$keywords?>" />
<meta name="description" content="<?=$description; ?>" />
<base href="http://norshopcms/">

<?foreach ($styles as $file_style):?>
<?=html::style($file_style)?>
<?endforeach?>
<?foreach ($scripts as $file_script):?>
<?=html::script($file_script)?>
<?endforeach?>

<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
 $("#mylogin").click(function () {
      $("#formlogin").toggle('normal').addClass("frms");
   });
   
  $("#showcart").click(function () {
      $("#minicart").toggle('normal').addClass("show_minicart");
   });  

});
</script>	
</head>
<body>
<div class="container_12">
<div class="grid_9"><h1>norshopcms</h1></div>
<div class="grid_3">
		<a id="showcart" href="#">Ваша корзина</a>
				<?=$block_top;?>
</div>
<div class="clear"></div>

<div class="grid_9"><?=$search_form?></div>
<div class="grid_3"><?=$userarea?></div>			
<div class="clear"></div>

<div class="grid_12"><?=$top_menu?></div><div class="clear"></div>

	  <div class="grid_3 alpha">
		<?
		foreach($block_left as $lblock){
			print $lblock;
		}
		?> 
	 </div>
	  <div class="grid_6">
		<?
		foreach($block_center as $bcenter){
			print $bcenter;
		}
		?>
	  </div> 
	  <div class="grid_3 omega">
	 <h3>Новости</h3>
	 </div>
	 <div class="clear"></div>
	 
	  <div class="grid_12" id="footer">
	copyright &copy;
	 </div>
	  <div class="clear"></div>
	</div>
</body>
</html>
