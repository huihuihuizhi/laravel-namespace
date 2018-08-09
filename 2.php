<?php
namespace one\two;
//命名空间的使用

//方式一：绝对路径（完全限定名称）
// 2.php文件中使用 1-1.php文件中的类 2.php 文件没有命名空间，使用绝对路径实例化对象
//第一步：引入类文件
include '1-1.php';
//第二步：实例化对象(要在类名前加上空间名，否则找不到Obj这个类)
$obj = new \one\Obj;//第一个\代表根空间
var_dump($obj);

//方式二：直接使用 （非限定名称）
//当前 文件的命名空间和 要引入 的文件的命名空间相同，不用再类明前加上空间名，直接实例化即可。
//2.php文件中使用1-2.php 文件中的类
include '1-2.php';
$obj1 = new Obj;//直接实例化
var_dump($obj1);

//方式三：相对路径 （限定名称）
//当前文件的命名空间是 one\two, 1-3.php文件的命名空间是one\two\three,
//所以在当前文件下有一个 three的Obj类，可以直接使用相对路径
include '1-3.php';
$obj2 = new three\Obj;
var_dump($obj2);

//系统类

//若当前文件没写命名空间，则使用的PDO类也不用写空间名（会自动找根空间，而系统类正好在跟空间下）
//若当前文件写了命名空间，则会在当前文件的命名空间下找系统类，但是系统类在根空间下，所以会报错。应该在系统类前手动写上空间名（根空间）
//$pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8','root','root');//当前文件没写命名空间
$pdo = new \PDO('mysql:host=localhost;dbname=user;charset=utf8','root','root');//当前文件有命名空间
var_dump($pdo);

//变量类
/*
若当前文件没有命名空间，则声明的字符串直接写
若当前文件有命名空间，字符串前面加上该文件的命名空间，否则找不到该类
注意：此时声明字符串时，最好使用单引号，避免转义（若空间名是two，使用双引号 \two中\t就被转义）
*/
class Man{

}
//$str = 'Man';//当前文件没有写命名空间
$str = '\one\two\Man';//当前文件写了命名空间
$man = new $str;
var_dump($man);

//导入
/*
 若在当前空间使用别的类，而且使用频率很高，就用到导入
 例如当前文件多次用到1-1.php中的类
 步骤：
1、导入文件
2、导入类
导入类的好处：在当前文件中可以直接使用类名的方式做实例化,不用每次使用的时候都写绝对路径。
还可以给导入的类起一个别名
*/

//导入文件
include '1-1.php';
//导入类 使用关键字 use
use \one\Obj;
$obj3 = new Obj;
var_dump($obj3);

/*
 //给导入的类起一个别名 aaa
use one\Obj as aaa;
$obj4 = new aaa;
var_dump($obj4);
*/





