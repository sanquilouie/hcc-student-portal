<?php

$server = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
  die("<script>alert('Connection Failed.')</script>");
}

?>
