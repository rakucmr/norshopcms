<div id="product">
<h2><?=$product->title?></h2>

        <?if(count($images) > 0):?>
      
          <a href="media/products/<?=$product->main_img->name?>" target="_blank"><img class="image" src="media/products/<?=$product->main_img->name?>"></a>
            <p>Производитель: <?=$product->manufactures->title?></p>
            <p><b>Цена <?=$product->price?> руб. </b></p><p><a  class="f-bu f-bu-default" href="/cart/add/<?=$product->id?>">в корзину</a></p>
            
			<div class="images">
            <?foreach($images as $image):?>
            <? print '<img src="/media/products/'.$image->name.'">';?>
            <?endforeach?>
           </div>
        <?else:?>
        <div id="main_icon">
            <img src="media/img/noimage.jpg" />
        </div>
         <?endif?>
</div>
<div><?=$product->description?></div>