<?php

namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Common extends Controller
{
    public function _initialize(){  

        $name=session('name');
        if(!isset($name)){
        $this->redirect("login/index");          
        }
    }
    public  function asd(){

       echo "123";
    }

    public function index(){
        $res = db::table('shop_order')->count();
        var_dump($res);

       return $this->fetch('index');
    }


    public function unicode(){

       return $this->fetch('unicode');
    }
         
}