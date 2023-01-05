<form name="from1" method="post" action="">
用户名：<input name="user" type="text"><br>
密码：<input name="pwd" type="password"><br>
<input name="submit" type="submit" value="提交">
</form>
<?php 
    if(isset($_POST['submit']) && $_POST['submit']=="提交"){
        echo "您的用户名为：".$_POST['user'];
        echo "<br>";
        echo "您的密码为：".$_POST['pwd'];
    }
?>
