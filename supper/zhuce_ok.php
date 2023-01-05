<?php
    include_once 'conn/conn.php';
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $pwd1 = $_POST['pwd1'];
    if (!($user and $pwd and $pwd1)){
        echo "<script>alert('任何地方都不能为空');window.location.href='zhuce.php'</script>";
    }
    if ($pwd != $pwd1){
        echo "<script>alert('密码不一致');window.location.href='zhuce.php'</script>";
    }else {
        $sqlstr = "insert into tb_user(`name`,`pwd`) values('$user','$pwd')";
        $result = mysqli_query($conn, $sqlstr);
        mysqli_fetch_array($result);
        if ($result){
            echo "<script>alert('添加成功,点击前往登录页面');window.location.href='denglu.php'</script>";
            
        }else {
            echo "<script>alert('注册失败');window.location.href='zhuce.php'</script>";
        }
    }
    
?>