<?php
/**
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 下午 3:17
 *
 * 此类为扩展接口的工厂类
 */

namespace FactoryAOP\Extension\ExtensionCore;

use FactoryAOP\ExtensionImpl\AddScoreExtension;
use FactoryAOP\ExtensionImpl\CheckPowerExtension;

class ExtensionFactory
{
    // 创建扩展
    public static function createExtension() {
        $ef = new ExtensionFamily();
        // 添加扩展
        //TODO 这里应该从配置文件中去读取要添加的扩展
        $ef->addExtension(new CheckPowerExtension());
        $ef->addExtension(new AddScoreExtension());
        //返回的是Extension接口实现的ExtensionFamily
        return $ef;
    }
}