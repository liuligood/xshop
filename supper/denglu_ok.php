<?php
    include_once 'conn/conn.php';
    if (!$_POST['user']){
        echo "<script>alert('用户名不能为空');window.location.href='denglu.php'</script>";
    }
    if (!$_POST['pwd']){
        echo "<script>alert('密码不能为空');window.location.href='denglu.php'</script>";
    }
    $sqlstr = "select * from tb_user where name= '".$_POST['user']."'";
    $result = mysqli_query($conn, $sqlstr);
    $info = mysqli_fetch_array($result);
    if ($info == false){
        echo "<script>alert('用户名或者密码不正确');window.location.href='denglu.php'</script>";
        exit;
    }
    if ($info['pwd']==$_POST['pwd']){
        session_start();
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pwd'] = $_POST['pwd'];
        $_SESSION['time'] = time();
        echo "<script>alert('欢迎登录,为您前往订单查询');window.location.href='index.php'</script>";
        exit;
    }else {
        echo "<script>alert('用户名或密码错误');window.location.href='denglu.php'</script>";
        exit;
    }
        
        
?>