<?php
    session_start();
    if(isset($_SESSION['msg']))
    {
        echo "<p> {$_SESSION['msg']} </p>";
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION['output'])){
    include "{$_SESSION['output']}";
    }
    else
    {
        require "out_rand50.php";
    }
?>