<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Menu
{

	const STR_COMP_MODE_EXACT = 'str_comp_exact';
	const STR_COMP_MODE_CONTAINS = 'str_comp_contains';

	public static $str_comp_mode = self::STR_COMP_MODE_EXACT;

	protected $config;
	protected $menu;
	protected $view;

	/**
	 * @param	string	$config	 see factory()
	 */
	public function __construct($config)
	{
		$this->config = Kohana::$config->load($config);
		$this->view = View::factory($this->config['view']);

                if ($this->config['driver'] == 'database') {
                    $menu = ORM::factory('menu_item');
                    $items = $menu->where('parent_id', '=', 0)->find_all();
                    $this->menu['items'] = $this->get_from_database_orm($items);
                }
                else if ($this->config['driver'] == 'file')
                    $this->menu = array('items' => &$this->config['items']);
	}

	/**
	 * @param	string	$config	the config file that contains the menu array
	 * @return	Menu
	 */
	public static function factory($config = 'default')
	{
		return new Menu('menu/'.$config);
	}

	/**
	 * @return	string	the rendered view
	 */
	public function render()
	{
		return $this->view
			->set('menu', Menu::process_urls($this->menu))
			->render();
	}

        /**
         * @param object $items object ORM that contains main menu items
         * @return array array that contains menu items from database
         */
        private function get_from_database_orm($items) {
            $temp = array();
            
            foreach ($items as $key => $item) {
                $temp[$key]['url'] = $item->url;
                $temp[$key]['title'] = $item->title;
                if ($item->classes) {
                        $temp[$key]['classes'] = array($item->classes);
                }
                $subcategories = $item->subcategories->find_all();
                if ($subcategories->count() > 0)
                    $temp[$key]['items'] = $this->get_from_database_orm($subcategories);
            }
            return $temp;
        }

	/**
	 * @see	render()
	 */
	public function __toString()
	{
		return $this->render();
	}

	/**
	 * Marks an item with a css class as the current item.
	 * The class can be set with the "current_class" config key.
	 *
	 * @param	string	$url	the url of the affected item
	 * @return	Nav $this
	 */
	public function set_current($url = '')
	{
		return $this->add_class($url, $this->config['current_class']);
	}

	/**
	 * @param	string	$url
	 * @param	string	$title	the new title
	 * @return	Nav $this
	 */
	public function set_title($url, $title)
	{
		$item =& Menu::get_item_by_url($url, $this->menu);
		if ( ! empty($item))
			$item['title'] = $title;
		return $this;
	}

	/**
	 * @param	string	$url
	 * @param	string	$new_url	the url will be changed to this value
	 * @return	Nav $this
	 */
	public function set_url($url, $new_url)
	{
		$item =& Menu::get_item_by_url($url, $this->menu);
		if ( ! empty($item))
			$item['url'] = $new_url;
		return $this;
	}

	/**
	 * @param	string	$url
	 * @param	string	$class	the css class to be added
	 * @return	Nav $this
	 */
	public function add_class($url, $class)
	{
		$item =& Menu::get_item_by_url($url, $this->menu);
		if ( ! empty($item))
		{
			if ( ! isset($item['classes']))
				$item['classes'] = array();
			if ( ! in_array($class, $item['classes']))
				$item['classes'][] = $class;
		}
		return $this;
	}

	/**
	 * @param	string	$url
	 * @param	string	$class	the css class to be removed
	 * @return	Nav $this
	 */
	public function remove_class($url, $class)
	{
		$item =& Menu::get_item_by_url($url, $this->menu);
		if ( ! empty($item) AND isset($item['classes']))
		{
			$matching_class_key = array_search($class, $item['classes']);
			if ($matching_class_key !== FALSE)
				unset($item['classes'][$matching_class_key], $matching_class_key);
		}
		return $this;
	}

	/**
	 * Recursively apply URL::site to all internal links.
	 *
	 * @param	array	$menu	menu items
	 * @return	array	the processed menu item
	 */
	protected static function process_urls(array $menu)
	{
		if (isset($menu['url']))
		{
			if (    ! 'http://'  == substr($menu['url'], 0, 7)
				AND ! 'https://' == substr($menu['url'], 0, 8))
			{
				$menu['url'] = URL::site($menu['url']);
			}
		}
		if (isset($menu['items']))
		{
			foreach ($menu['items'] as $key => &$item)
				$menu['items'][$key] = Menu::process_urls($menu['items'][$key]);
		}
		return $menu;
	}

	/**
	 * @param	string	$url	the link url to search for
	 * @param	array	$menu	the whole menu array or a sublevel
	 * @return	array	the first matching item or an empty array
	 */
	protected static function &get_item_by_url($url, array &$menu)
	{
		$null_array = array();
		if ( ! isset($menu['items']))
			return $null_array;
		foreach ($menu['items'] as &$item)
		{
			if (Menu::strings_match($item['url'], $url))
			{
				return $item;
			}
			else
			{
				$result_from_child_items =& Menu::get_item_by_url($url, $item);
				if ( ! empty($result_from_child_items))
					return $result_from_child_items;
			}
		}
		return $null_array;
	}

	protected static function strings_match($a, $b)
	{
		return call_user_func(array('Menu', Menu::$str_comp_mode), $a, $b);
	}

	public static function str_comp_exact($a, $b)
	{
		return $a == $b;
	}

	public static function str_comp_contains($a, $b)
	{
		return (bool) strstr($a, $b);
	}

}