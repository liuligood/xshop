<?php
/*
 * while语句的使用
 */
    //实现10以内偶数的输出。从1-10判断是否为偶数,如果是,则输出,否则继续循环.
    $a = 0;
    $print = "10以内的偶数为：";
    echo $print;
    while ($a<=10){
        if ($a % 2 == 0){
            echo ",".$a; 
        }
        $a++;
    }
    echo "<br>";
/*
 * while语句跟do while语句的区别
 */
    $a = 1;
    while ($a>1){
        echo "这儿还会输出吗";       //不会
    }
    do{
        echo "输出了吗~~~";
    }while ($a>1);
?>