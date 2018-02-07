<?php

namespace app\books\model;

use think\Model;

class BooksModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'sim_books';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    public function adminBookLists()
    {
        $this->paginate(10);
    }
}