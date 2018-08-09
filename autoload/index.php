<?php
/*
第一步：
     $obj = new Obj;
     var_dump($obj);
    报错——没有Obj这个类
第二步：加载魔术函数
    function __aotuload($classnaem){
        echo $classname;
    }
    $obj= new Obj;
    var_dump($obj);
    报错——没有Obj这个类，但是得到了类名 Obj
第三步：加上命名空间
    function __aotuload($classnaem){
            echo $classname;
        }
        $obj= new \org\Obj;
        var_dump($obj);
     报错——\org\Obj找不到，空间名下的类名找不到，加上了空间路径
报的空间路径很重要。因为如果当前类的空间路径跟文件所处的路径保持一致的话 很容易获取到当前类文件的位置
第四步：创建相应为文件夹和PHP文件，并实例化对象
  例如实例化A对象，正常思路是引入文件，并实例化对象
  但是 A这个类 所在的a.php文件的 空间名和当前文件的路径一致,通过__autoload自动引入需要的文件。
  $a =new \libs\A;
  报错——lib\A这个类找不到
  现在可以通过 lib\A 找 ./libs/A.php

*/


//魔术函数 __autoload
function __autoload($className)  //  Libs\A      =>   ./Libs/A.php
{
    //将反斜线 \  替换成 /
    $class = str_replace('\\','/',$className);  //  Libs/A  =>  ./Libs/A.php
    //拼接文件的路径
    $path = './'.$class.'.php';
    //检测文件是否存在
    if(file_exists($path)) {
        //引入该类文件
        include $path;
    }
}

//如果当前类的空间路径跟文件所处的路径保持一致的话 很容易获取到当前类文件的位置

// $obj = new \org\Obj;

//实例化a对象
// $a = new \libs\A;

//实例化B对象
// $b = new \org\B;

//实例化D对象
$d = new \A\B\C\D\D;//空间名+类名
var_dump($d);


?>