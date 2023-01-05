<?php
    require 'PostDemo.php';         //require与include的区别在于,如果调用文件没找到,require语句
    //require语句会输出错误信息，并立即终止脚本的处理。include在没有找到文件会输出警告,但不会终止
    //require语句只要程序一执行,就会立刻调用,而include语句只有程序执行到该语句时,才会调用外部语句
?>