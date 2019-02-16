<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Login extends Controller
{
    public function index()
    {

       return $this->fetch('index');
    }
    /*管理员登入*/
    public function login($name,$pass){
        $res = Db::table('shop_admin')->where('name',$name)->find();  
        if(!$res){
            return json(["info"=>"账号错误或账号不存在！","status"=>0]);
        }else if($res['status']==0){
            if($res['password']==md5($pass)){
                session('name',$res['name']);
                return json(["info"=>"登入成功！","status"=>1,"url"=>url('index/index')]);
            }else{
                return json(["info"=>"密码错误!","status"=>2]);
            }
        }else{
            return json(["info"=>"账号已被禁用！","status"=>2]);
        }
    }
    /*退出*/
    public function loginend(){

        session('name',null);
        return $this->success('退出成功！',url('login/index'));

    }

}