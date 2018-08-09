<?php
//一个PHP文件中有多个同名类，虽然报错但是可以运行。
namespace one;
class Obj
{

}
namespace one\two;
class Obj{

}
namespace one\two\three;
class Obj
{

}

//echo "11111";








?>