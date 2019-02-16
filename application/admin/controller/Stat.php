<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class Stat extends Controller
{
    public function index(){

       return $this->fetch('index');
    }
    public function index2(){
        
       return $this->fetch('index2');
    }
    public function index3(){
        
       return $this->fetch('index3');
    }     
}