<?php
 $a = 3;
 $b = 10;
 $c = 8;
 if ($a>$b && $a>$c){
     echo '最大数为:'.$a;
 }elseif ($b>$a && $b>$c){
     echo '最大数为:'.$b;
 }elseif ($c>$a && $c>$b){
     echo '最大数为:'.$c;
 }
?>