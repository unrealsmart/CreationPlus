<?php

namespace app\books\controller;

use cmf\controller\HomeBaseController;

class CreateController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch('index');
    }

}