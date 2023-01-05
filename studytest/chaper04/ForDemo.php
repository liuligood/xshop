<?php
/*
 * for语句的使用
 */
    //使用for循环来计算2-100之间所有偶数的和
    $num = 0;
    for($a = 2;$a<=100;$a+=2){
        $num += $a;
    }
    echo "所有偶数的和为：".$num;   //以上为最容易解法
    echo "<br>";
    $num = 0;
    for($a = 1;$a<=100;$a++){
        if($a %2 == 0){
            $num += $a;
        }
    }
    echo "第二种解法所有偶数的和：".$num;
    echo "<br>";
    
   //使用for循环来计算1-100之间所有奇数的和。在for循环中,当循环遇到偶数时,使用continue实现跳转
   $num = 0;
   for($i = 1;$i <= 100;$i ++){
       if ($i %2== 0){
           continue;       //跳出循环
       }
       $num += $i;
   }
   echo "1-100所有奇数的和为：".$num;   
   echo "<br>";
?>



<?php 
//使用for循环输出三个图片。当变量等于3时跳出循环
    for($i = 1;$i <= 4;$i ++){
        if ($i==4){
            break;
        }     
    ?>
    <input type="radio" name="head" value="<?php echo ("images/imge".$i.".jpg");?>"/>
    <img src="<?php echo ("images/imge".$i.".jpg");?>" width="100" height="100">
    <?php 
    }   
    ?>
<?php 
/*
 * exit语句的使用
 */
    $names = array("张开达","冼汶杰","李东键");
    foreach ($names as $cnm){
        echo "<br>";
        echo $cnm;
    }
    exit();
    foreach ($names as $cnm){
        echo "<br>";
        echo $cnm;
    }


?>  