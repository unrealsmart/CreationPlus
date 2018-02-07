<?php

namespace app\books\controller;

use app\admin\model\ThemeModel;
use app\books\model\CategoryModel;
use cmf\controller\AdminBaseController;

class AdminCategoryController extends AdminBaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categoryTree = $categoryModel->adminCategoryTableTree();

         $this->assign('category_tree', $categoryTree);
         return $this->fetch();
    }

    public function add()
    {
        $themeModel        = new ThemeModel();
        $listThemeFiles    = $themeModel->getActionThemeFiles('books/List/index');
        $booksThemeFiles = $themeModel->getActionThemeFiles('books/Books/index');

        $this->assign('list_theme_files', $listThemeFiles);
        $this->assign('books_theme_files', $booksThemeFiles);
        return $this->fetch();
    }

    public function addPost()
    {
        dump(input());
        $categoryModel = new CategoryModel();
        $categoryModel->adminCategoryInsert();
    }

    public function select()
    {

    }
}