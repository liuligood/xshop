<?php
/*
 * 各种数组函数的运用
 */
    $names = range(1, 8);               //**
    print_r($names)."<br>";
    foreach ($names as $names){
        echo $names;
    }
    echo "<br>";
    
    $names = array("PHP","java","js");
    $monkeys = array("10","30","60");
    $values = array_combine($names, $monkeys);  //**
    print_r($values);
    echo "<br>";
    
    $names = array("今天","小婳婳","是");     
    $values = array_pad($names, 4, "憨批");            //**
    print_r($values);
    echo "<br>";
    
    $str = "abcaxcaolapl";
    $str_arr = explode("a",$str);       //**
    print_r($str_arr);
    echo "<br>";
    
    $values = count($names);                    //**
    echo "统计的数为：";
    print_r($values);
    echo "<br>";
    
    $num = array(1,6,8,3,9);
    $max = max($num);           //**
    $min = min($num);           //**
    $sum = array_sum($num);     //**
    echo "\$num数组最大的值为：";
    print_r($max);
    echo "<br>";
    echo "\$num数组最小的值为：";
    print_r($min);
    echo "<br>";
    echo "\$num数组所有值的和为：";
    echo $sum;
    echo "<br>";
    
    $names = array("今天","小婳婳","是","憨憨");
    $values = key($names);          //**    key是键名
    print_r($values);
    $values = current($names);      //**    这个是第一个元素值
    print_r($values);
    echo "<br>";
    $values = next($names);         //**
    print_r($values);
    echo "<br>";
    $values = end($names);         //**
    print_r($values);
    echo "<br>";
    $values = prev($names);         //**
    print_r($values);
    echo "<br>";
    $values = reset($names);         //**
    print_r($values);
    echo "<br>";
    
    $books = array("a"=>"PHP","b"=>"java","c"=>"js");
    extract($books);            //**
    echo $a."<br>";
    echo $c."<br>";
    
    $a = 80;
    $b = 70;
    $c = "有点累";
    $values = compact("a","b","c");         //**
    print_r($values);
    echo "<br>";
    $reslut = array_keys($values);          //**
    print_r($reslut);
    echo "<br>";
    $names = array("a"=>"php","asd","php","aa","a"=>"wc");
    $reslut = array_keys($names,"php");     //**
    print_r($reslut);
    echo "<br>";
    $reslut = in_array("php", $names);      //**
    echo $reslut;
    echo "<br>";
    if(in_array("200", $names)) {      //**   不一致则返回空
         echo "只有一直才能输出";
    }
    echo "<br>";
    $reslut = array_search("aa", $names);   //**
    echo $reslut;
    echo "<br>";
    if (array_key_exists("3", $names)){         //**
        echo "只有键名有在里面才会输出的";
    }
    echo "<br>";
    $reslut = array_unique($names);
    print_r($reslut);                       //**
    echo "<br>";
    
?>