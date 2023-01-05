<?php
    $num1 = 100;
    $num2 = 80; 
    sum();
    for($i = 1;$i <= 10;$i++){
        zdy();
    }
    echo "<br>";
    for($i = 1;$i <= 10;$i++){
        zdy1();
    }
    
function sum(){                                     //加了global就可以声明使用全局变量
    global $num2;
    global $num1;    
    echo $sum = $num1+$num2;
}

function zdy(){
    static $messgae = 0;
    $messgae = $messgae + 1;
    echo $messgae." ";
}
function zdy1(){
    $messgae = 0;
    $messgae  = $message +1;
    echo $messgae." ";
}
?>