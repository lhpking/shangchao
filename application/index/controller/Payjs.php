<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
class Payjs extends Controller
{
    /*payjs支付页面*/
    public function index(){
        $shop_id_time =  session('shop_id_time');
        $data = Db::table('shop_order')->where('order_time',$shop_id_time)->count();
        if(!$data >=1){
            echo "<center><h1>请先生成订单！</h1></center>";die;
        }

        $res = Db::table('shop_order')->where('order_time',$shop_id_time)->select();
        $money = $res[0]['shop_monepay'];
//        var_dump($res);
        return $this->fetch('index',['money'=>$money]);

    }
    public function del(){

        $del=Db::table('shop_pay')->where("id",">","0")->delete();
    }

}
