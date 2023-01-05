<?php
/*
 * 自定义常量的使用
 */
    define("name","这是一个自定义常量");
    echo name;
    echo constant("name");
    echo "<br>";
    echo "判断常量是否被定义:".defined("name");
    echo "<br>";
    //案例使用
    define("MESSAGE", "能看到一次"); //因为Case_sensitive没ture,所以大小写敏感
    echo MESSAGE;
    echo Message;
    echo "<br>";
    define("COUNT","能看到多次",true);
    echo COUNT;
    echo Count;
    echo "<br>";
    /*
     * 预定义常量的使用
     */
    echo "PHP程序的完整路径和文件名:".__FILE__."<br>";
    echo "PHP的行数为：".__LINE__."<br>";
    echo "PHP的程序版本：".PHP_VERSION."<br>";
    echo "执行PHP解析器的操作名称:".PHP_OS."<br>";
    
?>