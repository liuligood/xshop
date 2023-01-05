<?php
    $a = 100;    //直接赋值
    $b = "开摆！";
    echo  "$a"."<br>";
    $a = $b;    //传值赋值 
    echo "$a"."<br>";
    $str = "从零开始的PHP之旅"."<br>";
    $str2 = &$str;       //使用&符号表示引用赋值,随着&后面变量的改变而改变
    echo "$str2";
    $str = "欸~,我发生了改变"."<br>";
    echo "$str2";
    
    //可变变量
    $change_name = "php";
    $php = "这是一门秃头语言";
    echo "$change_name"."<br>";
    echo $$change_name."<br>";
    echo $_SERVER['SCRIPT_FILENAME']; //绝对路径
?>