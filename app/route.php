<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------

if (file_exists(CMF_ROOT . "data/conf/route.php")) {
    $runtimeRoutes = include CMF_ROOT . "data/conf/route.php";
} else {
    $runtimeRoutes = [];
}

$runtimeRoutes['main'] = 'books/index/main';
$runtimeRoutes['author'] = 'books/index/author';
$runtimeRoutes['activity'] = 'books/index/activity';

// create controller
$runtimeRoutes['create'] = 'books/create/index';

// books controller
$customRouter = [
    '/books/:id' => 'books/books/index',
];

// runtime + custom
$runtimeRoutes = array_merge($runtimeRoutes, $customRouter);

return $runtimeRoutes;