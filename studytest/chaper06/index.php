<?php 
    if(isset($_POST['submit']) && $_POST['submit']=="提交"){
        echo "您的用户名为：".$_POST['user'];
        echo "<br>";
        echo "您的密码为：".$_POST['pwd'];
    }
?>