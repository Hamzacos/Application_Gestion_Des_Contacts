<?php
session_start();
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "contacte_db";

try
{
  $db_conn = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
  $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once 'user.php';
$user = new USER($db_conn);

include_once 'crude.php';
$crud = new CRUD($db_conn);

