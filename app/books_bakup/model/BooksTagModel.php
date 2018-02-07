<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:kane < chengjin005@163.com>
// +----------------------------------------------------------------------
namespace app\books\model;

use think\Model;

class BooksTagModel extends Model
{
    public static   $STATUS = array(
        0=>"未启用",
        1=>"已启用",
    );

    /**
     * @param int|array $currentIds
     * @param string $tpl
     * @return string
     */
    public function adminTagTableTree()
    {
        $where = ['status' => 1];
        return  $this->order("name ASC")->where($where)->select()->toArray();
    }
}