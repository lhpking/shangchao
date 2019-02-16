<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Shoporder extends Common
{
    public function index()
    {

        $res = Db::table('shop_order')
            ->alias('o')
            ->join('shop_store s','o.shop_id = s.id')
            ->select();
//        var_dump($res);
        if(empty($res)){
            echo "<center><h1>此店暂无订单！</h1></center>";die;
        }

        return $this->fetch('index',['res'=>$res]);
    }


}