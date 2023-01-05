<?php
    session_start();
    $names = array("谢羽佳","崔艺华","李东键");
    $_SESSION['name'] = $names;
    foreach ($_SESSION['name'] as $key=> $values){       
        echo $values.",";
    }
    session_unset();
?>