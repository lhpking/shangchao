<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Common
{
    public function index()
    {
    
        return $this->fetch('index');      
    }


}
