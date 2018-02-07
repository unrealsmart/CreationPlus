<?php

namespace app\books\model;

use think\Model;

class CategoryModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'sim_category';

    /**
     * 获取分类树
     * @param int $currentId
     */
    public function adminCategoryTableTree($currentId = 0)
    {
        $where['status'] = 1;
        $where['parent_id'] = $currentId;
        $category = $this->where($where)->order('name')->select();

        $newCategory = $category->toArray();
        $tree = [];

        foreach ($newCategory as $item) {
            $tree[] = $item;
            if ($currentId === 0)
                $tree[] = array_merge($this->adminCategoryTableTree($item['id'])[0]);
        }

        return $tree;
    }

    public function adminCategoryInsert()
    {
        dump(input());
    }

}