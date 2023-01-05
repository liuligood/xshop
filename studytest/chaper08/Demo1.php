<?php
    $number = 1234567890;
    $num = number_format($number);
    echo $num;
    echo "<br>";
    
    $string = "asdfghjkl";
    $string = strrev($string);
    echo $string;
    echo "<br>";
    
    $name = "这是一个小婳婳";
    echo mb_substr($name,0,5,"UTF-8");
    echo "<br>";
    
    $string = "asd,fgh,jkl,lkj";
    $nums = explode(",", $string);
    print_r($nums);
    echo "<br>";
    $a = implode("*", $nums);
    print_r($a);
    
?>