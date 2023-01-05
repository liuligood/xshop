<?php
/*
 * 二位数组的创建
 */
    $names = array(                                             //通过array()函数创建一个二维数组
        "books" => array("这是","一个","二维数组"),
        "strings" => array("a","b","c")
    );
    print_r($names);
    echo "<br>";
    //foreach遍历一个二维数组
    foreach ($names as $keys => $value){
        echo "<br>";
        foreach ($value as $keys => $values){
            echo $values;
        }
    }
    echo "<br>";
    var_dump($names);           //var_dump函数可以输出数组(或对象)
    
    //用list()和each()遍历数组
    $peoples = array(1 => "小明",2 => "小蓝",3 => "小紫");
    while (list($name,$value)=each($peoples)){
        echo "$name = $value"."\n";
    }
    
?>