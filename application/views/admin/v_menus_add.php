<script>
/*
$(document).ready(function(){
 
 	$("#menu_type").change(function() {
		
	if($("#menu_type").val()=='url'){
		  $('<li></li>')
           .append('<label>Ссылка <input type="text" name="menu_url" /></label>')
           .appendTo('#forms');
			}
			
	
	if($("#menu_type").val()=='pages'){
		  $('<li></li>')
           .append('<a href="/admin/pages/add" target="newpage">Саздать страницу</a>')
           .appendTo('#forms');
			}

	
	});

 });
 */
</script>

<form  method="post" action="">
<ul id="forms">
<li><label>Название: <input class="g-4" type="text" name="menu_title" /></label></li> 
<li><label>Алиас или ссылка: <input class="g-4"  type="text" name="menu_alias" /></label> &nbsp; (ссылка на Личный кабинет login, Ссылка на cтатей articles)</li> 
<li>
<label>Тип меню
<select id="menu_type" name="menu_type">
  <option value="pages/page">Страница</option>
  <option value="url">Cсылка</option>
 </select> &nbsp; (Для добавление страницы надо создать страницу таким же алиасом)
 </label>
</li>
</ul>
<input class="f-bu" type="submit" name="submit" value="  Сохранить  ">
</form>
