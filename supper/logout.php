<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('注销成功');window.location.href='denglu.php'</script>";
?>
