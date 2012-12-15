<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Категории товаров
 */
class Controller_Admin_Category extends Controller_Admin_Index {

    public function before() {
        parent::before();
    }

    public function action_index() {
        $categories = ORM::factory('category');
  
        $categories = $categories->fulltree()->as_array();
        
        $content = View::factory('admin/v_category',array('url'=>$this->url))
                ->bind('categories', $categories)
                ->bind('errors', $errors);

        // Вывод в шаблон
        $this->template->page_title = 'Категории';
        $this->template->block_center = $content;
    }
	
	
	public function action_add(){
	   $categories = ORM::factory('category');
	   $cat = Arr::extract($_POST, array('category_title', 'cat_id'));
	   if (isset($_POST['submit']))
        {
		$categories->category_title = $cat['category_title'];
 		  
           try
            {
                if (!$cat['cat_id'])
                {
                    $categories->make_root();
                }
                else
                {
                    $categories->insert_as_last_child($cat['cat_id']);
                }

                $this->request->redirect('admin/category');
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors('validation');
            }
			
        }
	        // Вывод в шаблон
		$categories = $categories->fulltree()->as_array();
		$content = View::factory('/admin/v_categoryadd')
					->bind('categories', $categories)
					->bind('errors', $errors);
        $this->template->page_title = 'Категории';
        $this->template->block_center = $content;
	}

    public function action_edit(){
		$id = (int) $this->request->param('id');
        $category = ORM::factory('category',$id);
		$data = $category->as_array();

        if(!$category->loaded()) {
            $this->request->redirect('admin/category');
        }

		$categories = ORM::factory('category');
        $categories = $categories->fulltree()->as_array();

		$content = View::factory('admin/v_categoryedit')
                ->bind('id', $id)
                ->bind('categories', $categories)
                ->bind('data', $data)
                ->bind('errors', $errors);


		// Редактирование
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('category_title', 'category_description', 'template'));
            $category->values($data);

            try {
                $category->save();

            $this->request->redirect('admin/category');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }



        // Вывод в шаблон
        $this->template->page_title = 'Категории';
        $this->template->block_center = $content;
	}


	
	public function action_delete(){
	    $id = (int) $this->request->param('id');
        $data = ORM::factory('category', $id);

        if(!$data->loaded()) {
            $this->request->redirect('admin/category');
        }

        $data->delete();
        $this->request->redirect('admin/category');
	
	}

    
}