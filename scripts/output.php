<?php
    session_start();
    if(isset($_SESSION['output'])){
    require "{$_SESSION['output']}";
    }
    else
    {
        require "out_rand50.php";
    }
?>