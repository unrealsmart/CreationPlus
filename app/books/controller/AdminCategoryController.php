<?php
namespace app\books\controller;

use cmf\controller\AdminBaseController as AdminBaseController;

class AdminCategoryController extends AdminBaseController
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        $this->assign('categories_tree', '');
        $this->assign('list_theme_files', []);
        $this->assign('article_theme_files', []);
        return $this->fetch();
    }
}