<?php


namespace Controller;
use \Model\UsersModel;
use \Tools\Util;

class UsersController extends PlatformController
{
    private $users;
    public function __construct()
    {
        parent::__construct();
        $this->users = new UsersModel();
    }

    public function index(){
        //接收数据
        //处理数据
            //需要调用模型上面的获取数据的方法,帮我查询会员的所有信息
            $rows = $this->users->getList();
        //显示页面
        require './View/Users/list.html';
    }
    public function add(){

        //判断是那种请请求方法传输的数据
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //接收数据

            //处理数据
            //需要调用模型上面的插入数据的方法,帮我插入数据
            $re = $this->users->insert($_POST);
            if($re === false){
                Util::my_jump('添加失败'.$this->users->getError(),1,'index.php?c=Users&a=add');
            }
            Util::my_jump('添加成功!',1,'index.php?c=Users&a=index');
        }
        //显示页面
       require'./View/Users/add.html';
    }
    public function edit(){
        //判断是那种请求方式传输的数据
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //接收数据

            //处理数据
            //需要调用模型上面的更新方法,更新到数据库
            $re = $this->users->update($_POST);
            if($re === false){
                Util::my_jump('修改失败!'.$this->users->getError(),1,"index.php?c=Users&a=edit&id={$_POST['id']}?");
            }
            Util::my_jump('修改成功!',1,'index.php?c=Users&a=index');
        }
            //显示页面
        //期望模型上面有一个根据ID获取一条数据的方法
        $re = $this->users->getOne($_GET);
        require './View/Users/edit.html';
    }
    public function del(){
        //接收数据
        //处理数据
        $this->users->del($_GET);
        //显示页面
        Util::my_jump('删除成功!',1,'index.php?c=Users&a=index');

    }

}