<?php
/**
 * @Author: Marte
 * @Date:   2018-11-12 10:18:33
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-11-15 16:06:35
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class Order extends Controller
{
    /*仓库列表*/
    public function index(){

        $res = Db::table('shop_goods')
            ->alias('g')
            ->join('shop_type t','g.uid = t.id')
            ->select();      
        return $this->fetch('index',['res'=>$res]);
    }
  
}