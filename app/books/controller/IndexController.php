<?php

namespace app\books\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch(':index');
    }

    public function main()
    {
        return $this->fetch(':main');
    }
}