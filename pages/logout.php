<?php
 session_start();
 session_destroy();
 header('location:sing_in.php');
 ?>