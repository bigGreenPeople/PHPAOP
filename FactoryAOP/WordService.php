<?php
/**
 * 业务逻辑代码
 * 测试访问页面
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 下午 3:47
 */



use FactoryAOP\Extension\ExtensionCore\ExtensionFactory;

//手动引入文件
require __DIR__."/Extension/ExtensionCore/Extension.php";
require __DIR__."/Extension/ExtensionCore/ExtensionFactory.php";
require __DIR__."/Extension/ExtensionCore/ExtensionFamily.php";
require __DIR__."/ExtensionImpl/AddScoreExtension.php";
require __DIR__."/ExtensionImpl/CheckPowerExtension.php";

class WordService
{

    //执行一个添加方法
    public function add($word,$name){

        $ext = ExtensionFactory::createExtension();
        //逻辑代码执行前
        $ext->before($word);

        echo "添加.....................<br>";

        //逻辑代码执行后
        $ext->after($word);
    }

}


//测试
$wordService = new WordService();
$wordService->add("test","fujie");
/**
* 结果:
*   检测是否登录开始
    添加分数开始
    添加.....................
    检测是否登录结束
    添加分数结束
*
 * 说明:
 *  该方法利用工厂获得了扩展的数组在依次调用了数组
*   此方法有了很大的改进 使前置方法后置方法与逻辑代码切割开来 避免了继承所导致的类的暴增
 *  也实现了可以在配置文件中动态的添加
 *
 *  通知方法里的参数写死 不容易获取导致方法复用性比较差
 *
*/
