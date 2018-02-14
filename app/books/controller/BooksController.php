<?php

namespace app\books\controller;

use cmf\controller\HomeBaseController;

class BooksController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch();
    }
}