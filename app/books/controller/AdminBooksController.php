<?php

namespace app\books\controller;

use app\admin\model\ThemeModel;
use app\books\model\BooksModel;
use cmf\controller\AdminBaseController;

class AdminBooksController extends AdminBaseController
{
    public function index()
    {
        $categoryId = input('post.category/d');

        $booksModel = new BooksModel();
        $data = $booksModel->adminBookLists();

        $this->assign('books', $data);
        return $this->fetch();
    }

    public function add()
    {
        $themeModel        = new ThemeModel();
        $booksThemeFiles = $themeModel->getActionThemeFiles('books/Books/index');
        $this->assign('books_theme_files', $booksThemeFiles);
        return $this->fetch();
    }
}