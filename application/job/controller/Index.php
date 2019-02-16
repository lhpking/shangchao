<?php
namespace app\job\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    public function index()
    {
     
        return $this->fetch('index');
    }


}