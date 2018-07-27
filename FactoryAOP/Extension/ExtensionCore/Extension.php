<?php
/**
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 下午 3:19
 * 此接口为扩展类统一实现的接口
 */

namespace FactoryAOP\Extension\ExtensionCore;

interface Extension
{
    //方法执行前调用方法（这里的参数也可以）
    public function before($newLWord);

    //方法执行后调用方法
    public function after($newLWord);
}