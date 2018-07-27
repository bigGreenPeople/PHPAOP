<?php
/**
 * Created by PhpStorm.
 * User: fujie
 * Date: 2018/7/27 0027
 * Time: 上午 10:56
 */

namespace CallAop;

/**
 * 日志类
 */
class Log
{
    /**
     * 当News调用不存在的方法的时候就会调用该函数
     * @param $method 调用的方法名
     * @param $args 调用的参数
     */
    function __call($method, $args)
    {
        //在调用方法名前加上_
        $method = "_$method";
        //这里可以写日志调用的方法
        $this->beforeLog();

        //此处调用真实要调用的方法
        $return = call_user_func_array(array($this, $method), $args);

        $this->afterLog();
    }

    //方法执行前调用
    function beforeLog(){
        echo "beforeLog<br>";
    }

    //方法执行后调用
    function afterLog() {
        echo "afterLog<br>";
    }

}


/**
 * 新闻类
 */
class News extends Log
{
    /**
     * 添加处理 方法名本应该为add 我们在前面添加一个_是为了触发_call()
     */
    public function _add(){
        echo "add successful<br>";
    }

}

//测试调用
$news = new News();
$news->add();

/**
 * 结果:
 *   beforeLog
 *   add successful
 *   afterLog
 *
 * 说明:
 *  该方法比较死板
 *  即采用了继承的方式(业务复杂时可能会导致类的暴增)
 *  还使得前置方法写死在代码中(后期更换需要修改代码)
 *  使得IDE的提示也变得不友好
 */
