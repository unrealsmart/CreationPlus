<?php

namespace app\books\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch(':guide');
    }

    public function main()
    {
        return $this->fetch('main');
    }


    public function clause()
    {
        return $this->fetch('clause');
    }

    public function author()
    {
        return $this->fetch('author');
    }

    public function activity()
    {
        return $this->fetch('activity');
    }

    // 书籍详情
    public function detail()
    {

    }
}