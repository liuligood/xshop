<?php
/*
 * switch语句的使用
 */
    setlocale(LC_TIME, "chs");          //设置本地环境
    $weekday = strftime("%A");           //声明变量$weekday的值
    $today = "星期二";
    switch($today){
        case  "星期一": 
            echo "今天是星期一,好好上班！"; break;
        case  "星期二":
            echo "今天是星期二,好好加班！"; break;
        case  "星期三":
            echo "今天是星期三,好好努力！"; break;
        case  "星期四":
            echo "今天是星期四,好好摆烂！"; break;
        case  "星期五":
            echo "今天是星期五,摆烂了！"; break;
        default: 
            echo "去捏妈妈的";
    }
?>