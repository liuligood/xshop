<?php

    //算数运算符是使用
    $a = 10;
    $b = 70;
    $c = -100;
    echo "\$a + \$b = ".($a+$b)."<br>";    
    echo "\$a - \$b = ".($a-$b)."<br>"; 
    echo "\$a * \$b = ".($a+$b)."<br>"; 
    echo "\$a % \$c = ".($a%$c)."<br>"; 
    
    //字符运算符的使用
    $str1 = "11111这是一本php书";        //+号两边如果有字符类型则会自动转换为整型,如果为字母
    $str2 = "333谢谢你观看他.";          //则值为0,如果以数字开头的字符串,则会截取前面的数字进行运算
    $str3 = $str1 + $str2;
    $str4 = $str1 . $str2;
    echo $str3."<br>";
    echo $str4."<br>";
    
    //赋值运算符的使用
    $a = 100;                          
    echo ($a += $b)."<br>";                   //实质为$a=$a+$b
    echo ($b -= $c)."<br>";                   //实质为$b=$b-$c
    echo ($b *= $c)."<br>";                   //实质为$b=$b*$c
    echo ($a /= $b)."<br>";                   //实质为$a=$a/$b
    echo ($c %= $b)."<br>";                   //实质为$c=$c%$b
    echo ($str1 .= $str2)."<br>";              //实质为$str1 = $str1.$str2 
    
   //为运算符的使用
   $a = 9;
   $b = 8;
   $ab = $a & $b;            //做与操作后转换为十进制
   echo $ab."<br>";
   $ab = $a | $b;           //做或操作后转换为十进制
   echo $ab."<br>";
   $ab = $a ^ $b;              //做异或操作后转换为十进制
   echo $ab."<br>";
   $ab = ~$b;           //做非操作后转换为十进制
   echo $b."<br>";
   
   //递增递减运算符
   $a++;                    //先返回$a的值,$a在加一
   echo $a."<br>";         
   ++$a;                    //$a的值先加一,在返回$a的值
   echo $a."<br>";          
   --$a;                    //$a的值先减一,在返回$a的值
   echo $a."<br>";  
   $a--;                    //先返回$a的值,$a在减一
   echo $a."<br>";  
   
   //逻辑运算符
   $a = true;
   $b = true;
   $c = false;
   if ($a and $b or $c){        //先判断$a跟$b是否为真,在判断跟$c是否为真
       echo "true";
   }else {
       echo "false";
   }
   
   //比较运算符
    $a = 10;
    $b = 20;
    if ($a<=$b){
        echo  "1";
    }else {
        echo "0";
    }
    if ($a != $b ){
        echo "1";
    }else {
        echo "0";
    }
    
    //条件运算符
    $a = 1; 
    $b = 2;
    echo ($a>$b) ? "大小对比正确" : "大小对比错误";
    
    
    //settype()函数的使用
    $a = "abc123.123";
    settype($a, "string");
    echo $a;
?>