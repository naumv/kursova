<?php
   session_start();
   $_SESSION['registration'] = FALSE;
   unset($_SESSION['error']);
   exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
?>