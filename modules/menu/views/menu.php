<ul>
<?php
	foreach ($menu['items'] as &$item):
		$classes = '';
		if (isset($item['classes']))
			$classes = ' class="'.join(' ', $item['classes']).'"';
?>
	<li<?php echo $classes; ?>>
	<?php
		echo HTML::anchor($item['url'], $item['title']);
		if (isset($item['items']))
		{
			$items = array('items' => &$item['items']);
			echo View::factory('menu')->bind('menu', $items)->render();
		}
	?>
	</li>
<?php endforeach; ?>
</ul>