<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class Staff extends Controller
{
    /*店长列表*/
    public function index(){
        $res = Db::table('shop_user')
            ->alias('u')
            ->join('shop_structure s','u.sid = s.type')
            ->where('type',1)
            ->select();
        return $this->fetch('index',['res'=>$res]);
    }
    /*收银员列表*/
    public function money(){

        $res = Db::table('shop_user')
            ->alias('u')
            ->join('shop_structure s','u.sid = s.type')
            ->where('type',2)
            ->select();
        return $this->fetch('index',['res'=>$res]);
    }    
    /*添加页面*/
    public function staff_add(){

        $res = Db::table('shop_structure')->select();   
 
        return $this->fetch('staff_add',['res'=>$res]);
    }
    /*添加操作*/   
    public function staff_adds(){
        $time = time();
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_user')->where(['name'=>input('post.name')])->count();
            if($name >=1){
                return json(["info"=>"该用户名已被占用!","status"=>0]);
            }
            $res = Db::table('shop_user')->
            insert([
                    'name'=>input('post.name'),
                    'phone'=>input('post.phone'),
                    'sid'=>input('post.type'),
                    'sex'=>input('post.sex'),
                    'time'=> $time
                    ]);
            if($res){
                return json(["info"=>"添加成功！","status"=>1,"url"=>url('staff/index')]);
            }else{
                return json(["info"=>"注册失败!","status"=>5]);
            }
        }
    }
}
