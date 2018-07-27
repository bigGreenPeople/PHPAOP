<?php
/**
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 下午 3:29
 */
namespace FactoryAOP\ExtensionImpl;

use FactoryAOP\Extension\ExtensionCore\Extension;

class CheckPowerExtension implements Extension
{
    //方法执行前调用方法
    public function before($newLWord){
        echo "检测是否登录开始<br>";
    }

    //方法执行后调用方法
    public function after($newLWord){
        echo "检测是否登录结束<br>";
    }
}