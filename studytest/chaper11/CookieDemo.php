<?php
    date_default_timezone_set("Asia/Hong_kong");
    if (!isset($_COOKIE['vist_time'])){
        setcookie("vist_time",date("Y-m-d H:i:s"),time()+60);
        echo "欢迎您第一次访问网站";
    }else {
        setcookie("vist_time",date("Y-m-d H:i:s"),time()+60);
        echo "您的上次访问时间为：".$_COOKIE['vist_time'];
    }
?>