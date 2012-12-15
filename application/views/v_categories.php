<div id="category" >
<p style="display:block;padding:5px; margin:0px"><b>Категории</b></p>
<ul >
<?php foreach($categories as $ct): ?>
   <?php if($ct->parent_id==0):?>
   <li ><a href="/products/cat/<?php echo $ct->id ?>"><?php echo $ct->category_title ?></a>
		<UL>
   		  <?php foreach($ct->children as $l): ?>
          <li ><a href="/products/cat/<?php echo $l->id ?>"><?php echo $l->category_title ?></a></li>
		 <?php endforeach; ?>
		 </UL>
   </li>
 	
	<?php endif;?>
<?php endforeach; ?>
 </ul>
</div>