<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Goodstype extends Controller
{
    /*商品分类首页*/
    public function index()
    {
        $res = Db::table('shop_type')->select();

        return $this->fetch('goodstype',['res'=>$res]);
    }
    /*商品添加页面*/
    public function type_add(){


    }
    /*商品列表*/
    public function goods(){
    $res = Db::table('shop_goods')
        ->alias('g')
        ->join('shop_store s','g.tid = s.id')
        ->join('shop_type t','g.uid = t.typeid')
//        ->limit(1)
        ->select();
//    var_dump($res);
    return $this->fetch('index',['res'=>$res]);
    }

}


