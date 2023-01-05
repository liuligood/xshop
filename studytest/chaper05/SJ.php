<?php
/*
 * 使用array_push()函数向数组添加元素,并循环输出添加元素后的数组
 */
    $names = array("今天","婳婳","是");
    echo "这个是添加之前的数组：";
    foreach ($names as $value)
        echo $value;
    array_push($names, "憨憨");
    echo "<br>";
    echo "这个是添加之后的数组：";
    foreach ($names as $value)
        echo $value;
    
    //习题
    echo "<br>";
    $a = array(8,2,7,5,1);
    sort($a);
    print_r($a);
?>