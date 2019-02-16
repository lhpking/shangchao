<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class Store extends Controller
{
    /*店铺首页*/
    public function index(){

        $res = Db::table('shop_store')->select();

        return $this->fetch('index',['res'=>$res]);
    }
    /*添加店铺页面*/
    public function store_add(){
        /*店长*/
        $res = Db::table('shop_user')
            ->alias('u')
            ->join('shop_structure s','u.sid = s.type')
            ->where('type',1)
            ->field('name')
            ->select();
        /*收银员*/                
        $data = Db::table('shop_user')
            ->alias('u')
            ->join('shop_structure s','u.sid = s.type')
            ->where('type',2)
            ->field('name')
            ->select();
        return $this->fetch('store_add',['data'=>$data,'res'=>$res]);
    }
    /*添加店铺操作*/
    public function store_adds(){
       
        $time = time();
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_store')->where(['shop_name'=>input('post.name')])->count();
            if($name >=1){
                return json(["info"=>"该店铺名已被占用!","status"=>0]);
            }
            $res = Db::table('shop_store')->
            insert([
                    'shop_name'=>input('post.name'), //店铺名称
                    'store_name'=>input('post.username'), //店长
                    'moneyname'=>input('post.username2'),//收银员
                    'username'=>input('post.phone2'),//店铺账号
                    'store_phone'=>input('post.phone'),//店铺号码
                    'password'=>input('post.pass'),//店铺密码
                    'province'=>input('post.province'),//省
                    'city'=>input('post.city'),//市
                    'area'=>input('post.area'),//区
                    'detailed'=>input('post.detailed'),//详细
                    'time'=> $time
                    ]);
            if($res){
                return json(["info"=>"添加店铺成功！","status"=>1,"url"=>url('store/index')]);
            }else{
                return json(["info"=>"添加失败!","status"=>5]);
            }
        }     

    }

}
