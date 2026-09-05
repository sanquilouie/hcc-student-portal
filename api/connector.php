<?php
// define('DBHOST', 'localhost');
define('DBHOST', getenv('DB_HOST'));
define('DBUSER', getenv('DB_USER'));
define('DBPASS', getenv('DB_PASSWORD'));
define('DBNAME', getenv('DB_NAME'));
define('SECRET_KEY', getenv('SECRET_KEY'));
function noDB()
{
    $mysqli = new mysqli(DBHOST, DBUSER, DBPASS);
    return $mysqli;
}

function DB()
{
    $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    return $mysqli;
}