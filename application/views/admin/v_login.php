<html>
<head>
<title><?=$title?></title>
<style type="text/css">
li{list-style: none; padding:7px; }
form{margin:0;padding:0;}


.error_msg{
    width:200px;
	padding: 10px;
	margin:0 auto;
	margin-bottom: 10px;
	background: #FFDFE0;
	border: 1px solid #FF9999;
	font-size: 12px;
	font-family: Arial, Tahoma, Verdana, sans-serif, Geneva;
	text-align: center;
}

.title{
padding:7px;
text-align: center;
}


#login_form{
font-family: Verdana, Arial, Helvetica, sans-serif ;
width:300px;
margin:0 auto;
-webkit-border-radius:5px;
-moz-border-radius:5px;
border-radius:5px;
border:1px #666 solid;
-moz-box-shadow:0px 0px 5px #333;-webkit-box-shadow:0px 0px 5px #333;box-shadow:0px 0px 5px #333;
}

table
{
border-collapse:collapse;
border-spacing: 0;
border: 1px solid gray;
}

td
{
padding:3px;
padding-left:20px;
padding-right:20px;
vertical-align:top;
border: 0px solid gray;
}

th{
padding:7px;
}

</style>
</head>
<body>

<?
if(isset($errors)){
	foreach ($errors as $error){
	print '<div class="error_msg">'.$error.'</div>';
	}
}
?>	
<h3 align="center"><?=$title?></h3>
<div  id="login_form">
<div class="title"><b><?=$page_title?></b></div>
<form action="" method="post" >
<Ul>
<li><label for="username">Логин</label>: &nbsp; <input type="text" name="username"  /></li>
<li><label for="password">Пароль</label>:&nbsp;<input type="password" name="password"  /></li>
<li><input type="checkbox" name="remember" /> Запомнить </li>
<li><input type="submit" name="submit" value="Войти" /> </li>
</Ul>
</div>
</form>
 </body>
</html>