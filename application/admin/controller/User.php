<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class User extends Controller
{       
    /*超级管理员列表*/
    public function index(){
        $res = Db::table('shop_admin')->where('type',1)->select();

        return $this->fetch('index',['res'=>$res]);
    }
    /*普通操作员列表*/
    public function adindex(){
        $res = Db::table('shop_admin')->where('type',0)->select();
        return $this->fetch('index',['res'=>$res]);
    }

    /*添加加管理员页面*/
    public function user(){

        return $this->fetch('user_add');
    }
    /*添加操作*/
    public function user_add(){
        $time = time();
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_admin')->where(['name'=>input('post.name')])->count();
            if($name >=1){
                return json(["info"=>"该用户名已被占用!","status"=>0]);
            }
            $res = Db::table('shop_admin')->
            insert([
                    'name'=>input('post.name'),
                    'phone'=>input('post.phone'),
                    'type'=>input('post.type'),
                    'password'=>md5(input('post.pass')),
                    'sex'=>input('post.sex'),
                    'time'=> $time
                    ]);
            if($res){
                return json(["info"=>"添加成功！","status"=>1,"url"=>url('user/index')]);
            }else{
                return json(["info"=>"注册失败!","status"=>5]);
            }
        }
    }        
}