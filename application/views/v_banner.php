<div style="border:1px solid lightgray">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
	<?foreach($banners as $b):?>
	<a href="<?=$b->banner_url?>"><img  src="/media/banners/<?=$b->banner_image?>" data-thumb="/media/banners/<?=$b->banner_image?>"  alt="<?=$b->banner_title?>" /></a>
	<?endforeach;?>
		</div>
	</div>
</div>

