<?php
/**
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 下午 3:22
 * 扩展的家族类
 * 此类实现Extension接口是为了上面代码调用与调用一个扩展类相同
 */

namespace FactoryAOP\Extension\ExtensionCore;


class ExtensionFamily implements Extension
{

    //定义扩展的数组
    private $_extensionArray = array();

    //添加要执行的扩展
    public function addExtension(Extension $extension){
        $this->_extensionArray []= $extension;
    }

    //方法执行前调用方法
    public function before($newLWord){
        foreach ($this->_extensionArray as $extension) {
            $extension->before($newLWord);
        }
    }

    //方法执行后调用方法
    public function after($newLWord){
        foreach ($this->_extensionArray as $extension) {
            $extension->after($newLWord);
        }
    }
}