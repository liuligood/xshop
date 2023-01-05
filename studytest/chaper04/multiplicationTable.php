<?php
/*
 * 用for循环做一个99乘法表
 */
    for ($i = 1;$i<=9;$i ++){
        echo "<br>";
        for ($j = 1;$j <= $i;$j++){
            echo "&nbsp&nbsp&nbsp";
            echo "$i * $j = ".($i * $j);
        }
    }
?>