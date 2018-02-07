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
namespace app\books\controller;

use app\books\model\BooksTagModel;
use cmf\controller\AdminBaseController;
use think\Db;

/**
 * Class AdminTagController 标签管理控制器
 * @package app\books\controller
 */
class AdminTagController extends AdminBaseController
{
    /**
     * 文章标签管理
     * @adminMenu(
     *     'name'   => '文章标签',
     *     'parent' => 'books/AdminIndex/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '文章标签',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $booksTagModel  = new BooksTagModel();
        $tags           = $booksTagModel->paginate();

        $this->assign("arrStatus", $booksTagModel::$STATUS);
        $this->assign("tags", $tags);
        $this->assign('page', $tags->render());
        return $this->fetch();
    }

    /**
     * 添加文章标签
     * @adminMenu(
     *     'name'   => '添加文章标签',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加文章标签',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        $booksTagModel = new BooksTagModel();
        $this->assign("arrStatus", $booksTagModel::$STATUS);
        return $this->fetch();
    }

    /**
     * 添加文章标签提交
     * @adminMenu(
     *     'name'   => '添加文章标签提交',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加文章标签提交',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {

        $arrData = $this->request->param();

        $booksTagModel = new BooksTagModel();
        $booksTagModel->isUpdate(false)->allowField(true)->save($arrData);

        $this->success(lang("SAVE_SUCCESS"));

    }

    /**
     * 书籍标签选择对话框
     * @adminMenu(
     *     'name'   => '书籍标签选择对话框',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '书籍标签选择对话框',
     *     'param'  => ''
     * )
     */
    public function select()
    {
        $ids                 = $this->request->param('ids');
        $selectedIds         = explode(',', $ids);
        $booksTagModel = new BooksTagModel();

        $tagTree = $booksTagModel->adminTagTableTree();

        $where      = ['status' => 1];
        $tags = $booksTagModel->where($where)->select();

        $this->assign('tags', $tags);
        $this->assign('selectedIds', $selectedIds);
        return $this->fetch();
    }

    /**
     * 更新文章标签状态
     * @adminMenu(
     *     'name'   => '更新标签状态',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '更新标签状态',
     *     'param'  => ''
     * )
     */
    public function upStatus()
    {
        $intId     = $this->request->param("id");
        $intStatus = $this->request->param("status");
        $intStatus = $intStatus ? 1 : 0;
        if (empty($intId)) {
            $this->error(lang("NO_ID"));
        }

        $booksTagModel = new BooksTagModel();
        $booksTagModel->isUpdate(true)->save(["status" => $intStatus], ["id" => $intId]);

        $this->success(lang("SAVE_SUCCESS"));

    }

    /**
     * 删除文章标签
     * @adminMenu(
     *     'name'   => '删除文章标签',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除文章标签',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $intId = $this->request->param("id", 0, 'intval');

        if (empty($intId)) {
            $this->error(lang("NO_ID"));
        }
        $booksTagModel = new BooksTagModel();

        $booksTagModel->where(['id' => $intId])->delete();
        Db::name('books_tag_post')->where('tag_id', $intId)->delete();
        $this->success(lang("DELETE_SUCCESS"));
    }
}
