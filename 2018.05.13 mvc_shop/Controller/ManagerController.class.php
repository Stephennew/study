<?php


namespace Controller;
use Tools\Util;

class ManagerController extends PlatformController
{
    private $manager;
    public function __construct()
    {   parent:: __construct();
        $this->manager = new \Model\ManagerModel();
    }

    public function index(){
        //接收数据
        //处理数据
        $res = $this->manager->getList();
        //Util::dump($res);
        //显示页面
        require './View/Manager/list.html';
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $re = $this->manager->insert($_POST);
            if($re === false){
                Util::my_jump('添加失败!'.$this->manager->getError(),2,'index.php?c=Manager&a=add');
            }
            Util::my_jump('添加成功!',1,'index.php?c=Manager&a=index');

        }
        require './View/Manager/add.html';
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $re = $this->manager->update($_POST);
            if ($re === false) {

               /* echo '更新失败!' . $this->manager->getError();
                die;*/
                Util::my_jump('更新失败!'.$this->manager->getError(), 1, "index.php?c=Manager&a=edit&id={$_POST['id']}");
            }
            Util::my_jump('更新成功!', 1, 'index.php?c=Manager&a=index');
        }
        $re = $this->manager->getOne($_GET);
        require './View/Manager/edit.html';

    }

    public function del(){
        //var_dump($_GET);
        $this->manager->del($_GET);
        Util::my_jump('删除成功!',1,'index.php?c=Manager&a=index');
    }


}