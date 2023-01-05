<?php
/*
 * 数字索引数组跟关联数组的关系
 */
    $arr_int = array(0=>"今天",1=>"很是",2=>"开心");  //数字索引数组是下标以数字为主的
//     foreach ($arr_int as $arr_int)
//         echo $arr_int;
        print_r($arr_int);
        echo "<br>";
    $arr_string = array(1=>"这个","b"=>"是","c"=>"关联数组"); //只要一个键名不是数字,这种就是关联数组
//     foreach ($arr_string as $arr_string)    
//         echo $arr_string;
        print_r($arr_string);
        echo "<br>";

?>