<?php
namespace app\books\controller;

use cmf\controller\AdminBaseController as AdminBaseController;

class AdminBooksController extends AdminBaseController
{
    public function index()
    {
        $this->assign('articles', []);
        return $this->fetch();
    }

    public function add()
    {
        $this->assign('article_theme_files', []);
        return $this->fetch();
    }
}