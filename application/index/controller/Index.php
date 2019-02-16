<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    public function index()
    {

        $res = Db::table('shop_type')->select();
        $arr = Db::table('shop_store')->field('id,shop_name')->select();
        $data = input('get.number');

       return $this->fetch('index',['res'=>$res,'data'=>$data,'arr'=>$arr]);
    }
    
    public function order(){  //添加订单
        $time = time();
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_goods')->where(['name'=>input('post.name')])->count();
            if($name >=1){
                return json(["info"=>"该商品已被占用!","status"=>0]);
            }
            $res = Db::table('shop_goods')->
            insert([
                    'orderid'=>input('post.orderid'),
                    'uid'=>input('post.uid'),
                    'tid'=>input('post.tid'),
                    'name'=>input('post.name'),
                    'money'=>input('post.money'),
                    'stock'=>input('post.stock'),
                    'remarks'=>input('post.remarks'),
                    'shop_time'=>$time
                    ]);
            if($res){
                return json(["info"=>"添加成功！","status"=>1,"url"=>url('index/index')]);
            }else{
                return json(["info"=>"添加失败!","status"=>5]);
            }
        }     
    	
    }
}