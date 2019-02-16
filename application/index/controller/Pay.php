<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class Pay extends Controller
{
    /*结算首页*/
    public function index(){

        $name = input('get.name');
        $pass = input('get.pass');
        $time = time();
        $user = Db::table('shop_store')->where('username',$name)->where('password',$pass)->count();
        if(!$user >=1){
            echo "<center><h1>账号或密码错误！</h1></center>";die;
        }
        $usertype = Db::table('shop_store')->where('username',$name)->where('password',$pass)->select();
        $shop_name = $usertype[0]['id'];//店铺ID
        $shop = Db::table('shop_store')->where('username',$name)->select();
        session('shopidtime',$time);
        session('shopid',$shopid = $shop[0]['id']);
        session('shop_name',$shopid = $shop[0]['shop_name']);
        $info = Db::table('shop_pay')->select();
        $number = Db::table('shop_pay')->count();
        $data = input('get.payid');
        $res = Db::table('shop_goods')
            ->alias('g')
            ->join('shop_type t','g.uid = t.id')
            ->where('orderid',$data)
            ->select();

//        var_dump($res);
        if(empty($res)){
            echo "<center><h1>此商品未入库！</h1></center>";die;
        }
        $orderid = $res[0]['orderid'];//商品条形码
        $shopname = $res[0]['name']; //商品名称
        $payid = $res[0]['id'];//商品ID     
        $paymoney = $res[0]['money'];//商品价钱
        $typename = $res[0]['typename'];//商品类型

//        var_dump(Session::get());
       return $this->fetch('index',[
        'res'=>$res,
        'info'=>$info,
        'shopname'=>$shopname,
        'payid'=>$payid,
        'paymoney'=>$paymoney,
        'orderid'=>$orderid,
        'typename'=>$typename
        ]);

    }
    /*删除待结算订单*/
    public function delorder(){
        if(Request::instance()->isPost()){
            $res=Db::table('shop_pay')->where('id',input('post.id'))->delete();
            if($res==1){
                return json(["info"=>"删除成功!","status"=>1]);
            }else{
                return json(["info"=>"删除失败!","status"=>2]);
            } 
        }else{
            return alert_error('非法访问');
        }
    }

    public function payorder(){
        $pay_shop_id = session('shopid');
        $pay_typename = session('shop_name');
        $time = time();
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_pay')->where(['pay_name'=>input('post.shopname')])->count();
            if($name >=1){
                return json(["info"=>"此商品已添加待结算!","status"=>0]);
            }
            $res = Db::table('shop_pay')->
            insert([
                    'pay_name'=>input('post.shopname'),
                    'pay_typename'=>input('post.typename'),
                    'pay_order_id'=>input('post.payid'),
                    'pay_money'=>input('post.paymoney'),
                    'orderid'=>input('post.orderid'),
                    'pay_shop_id'=>$pay_shop_id,
                    'pay_typename'=>$pay_typename,
                    'pay_time'=> $time
                    ]);
            if($res){
                return json(["info"=>"添加待结算成功！","status"=>1,"url"=>url('index/index')]);
            }else{
                return json(["info"=>"添加待结算失败!","status"=>5]);
            }
        }      
    }
    /*结算支付*/
    public function paymoney(){
        $shop_id = session('shopid');
        $shop_id_time = time();
        session('shop_id_time',$shop_id_time);        
        if(Request::instance()->isAjax()){
            $name=Db::table('shop_order')->where(['number'=>input('post.totalpriceshow')])->count();
            if($name >=1){
                return json(["info"=>"此商品已添加待结算!","status"=>0]);
            }
            $res = Db::table('shop_order')->
            insert([
                    'shop_monepay'=>input('post.totalpriceshow'),
                    'number'=>input('post.totalcountshow'),
                    'orderid'=>input('post.orderid'),
                    'shop_id'=>$shop_id,
                    'order_time'=> $shop_id_time
                    ]);
            if($res){
                return json(["info"=>"订单创建成功","0status"=>1,"url"=>url()]);
            }else{
                return json(["info"=>"添加待结算失败!","status"=>5]);
            }
        } 

    }

}