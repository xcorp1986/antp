<?php

namespace Admin\Controller;

use Common\Util\DBUtil;
use Common\Util\Tool;
use Think\Controller\RestController;

class UserController extends RestController
{

    private $userModel;
    protected $allowMethod = ['get', 'post', 'put', 'delete'];    // REST允许的请求类型列表
    protected $allowType = ['html', 'xml', 'json', 'rss'];        // REST允许请求的资源类型列表

    public function __construct()
    {
        parent::__construct();
        //设置当前请求的资源类型，便于浏览器调试，生产环境上需注释掉该代码
        //$this->_type = 'html';
        $this->userModel = D('User');
    }

    //访问的方法如果不存在，统一由_empty处理
    public function _empty()
    {
        //跳转到默认页
        $this->redirect('/');
    }

    //查询用户列表或单条记录
    public function user_get()
    {
        $id = I('id');
        $result = [];
        if ($id) {
            $where = ['user_id' => $id];
            $users = DBUtil::queryRow($this->userModel, $where);
            $result = $users;
        } else {
            $currentPage = I('currentPage');
            $pageSize = I('pageSize');
            $users = DBUtil::queryList($this->userModel, null, false, '', '', $pageSize, $currentPage);
            $count = DBUtil::count($this->userModel);
            $result['user'] = $users;
            $result['total'] = $count;
        }
        $this->response($result, 'json');
    }

    //新增用户
    public function user_post()
    {
        $user_id = DBUtil::getMaxKey($this->userModel, 'user_id');
        //angular默认post过来的数据类型为Content-Type:application/json; charset=utf-8
        $userData = json_decode(file_get_contents('php://input'), true);
        $userData['user_id'] = $user_id;
        $result = DBUtil::add($this->userModel, $userData);
        $this->response(['status' => $result], 'json');
    }

    //修改用户
    public function user_put()
    {
        $user_id = $_REQUEST['id'];
        //angular默认post过来的数据类型为Content-Type:application/json; charset=utf-8
        $userData = json_decode(file_get_contents('php://input'), true);
        $result = DBUtil::save($this->userModel, ['user_id' => $user_id], $userData);
        if ($result !== false) {
            $result = true;
        }
        $this->response(['status' => $result], 'json');
    }

    //删除用户
    public function user_delete()
    {
        $user_id = $_REQUEST['id'];
        $result = DBUtil::delete($this->userModel, ['user_id' => $user_id]);
        $this->response(['status' => $result], 'json');
    }

    public function upload()
    {
        $result = ['status' => false, 'img' => ''];
        $file = Tool::uploadFile(C('UPLOAD_DIR'));
        if ($file['file']) {
            $result['status'] = true;
            $result['img'] = C('UPLOAD_DIR').$file['file']['savename'];
        }
        $this->response($result, 'json');
    }
}