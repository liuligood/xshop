<?php
/*
 * if else的使用,判断语句
 */
     $day_51 = false;
     if($day_51 == true){
         echo "今天是五一假期哦~";
     }else {
         echo "nonono你在欺骗我";
     }
     echo "<br>";
     $core = 45;
     if ($core >=90){
         echo "小明的成绩为优秀,具体成绩是：".$core;
     }elseif ($core<=90 && $core>=60){
         echo "小明的成绩为良好,具体成绩是：".$core;
     }else{
         echo "小明的成绩为不及格,具体成绩是：".$core;
     }
     echo "<br>";
     
/*
 * 使用if语句判断指定的年份是否为闰年
 */
     $year = 2021;
     if($year %4 == 0 && $year %100 != 0 || $year %400 ==0){
         echo $year."是一个闰年哦";
     }else {
         echo $year."只是一个平年呢";
     }
     
?>