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

    }
}