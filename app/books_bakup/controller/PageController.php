<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\books\controller;

use app\books\service\PostService;
use cmf\controller\HomeBaseController;

class PageController extends HomeBaseController
{
    public function index()
    {
        $postService = new PostService();
        $pageId      = $this->request->param('id', 0, 'intval');
        $page        = $postService->publishedPage($pageId);

        if (empty($page)) {
            abort(404, ' 页面不存在!');
        }

        $this->assign('page', $page);

        $more = $page['more'];

        $tplName = empty($more['template']) ? 'page' : $more['template'];

        return $this->fetch("/$tplName");
    }

}
