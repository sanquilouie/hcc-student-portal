<?php

$server = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
  die("<script>alert('Connection Failed.')</script>");
}

?>
