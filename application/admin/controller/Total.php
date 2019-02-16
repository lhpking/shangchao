<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Total extends Controller
{
    public function index()
    {
        


        return $this->fetch('index');
    }


}
