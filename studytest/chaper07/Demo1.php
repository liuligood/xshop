<?php
    $num1 = 10;
    $num2 = 20;
    suilu($num1,80);
    echo "<br>";
    echo "使用&引用传递前：".$sum = $num1+$num2."<br>";
    jisuanqi($num1, $num2);
    echo "<br>";
    echo "使用&引用传递后：".$sum = $num1+$num2."<br>";
    
function jisuanqi(&$num1,&$num2){
        $num1 = 15;
        $num2 = 80;
        $sum = $num1 + $num2;
        echo $sum;
}
function suilu($num1,$value = 0.25){
    echo "税后的工资为：".$sum=$num1+($num1*$value);
}
?>