<?php
    session_start();
    include_once 'conn/conn.php';
    $name = $_POST['user'];
    $pwd = $_POST['pwd'];
    if (!$name){
        echo "<script>alert('用户名不能为空！');window.location.href='Login.php'</script>";
    }
    if (!$pwd){
        echo "<script>alert('密码不能为空！');window.location.href='Login.php'</script>";
    }
    $sqlstr1 = "select * from tb_user where name='".$name."'and password='".$pwd."'";
    $result = mysqli_query($conn, $sqlstr1);
    if(mysqli_num_rows($result)>0){
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        echo "<script>alert('登录成功！');window.location.href='CookieDemo.php'</script>";
    }else {
        echo "<script>alert('登录失败！,账户名或密码错误');window.location.href='Login.php'</script>";
    }
    
    
?>
