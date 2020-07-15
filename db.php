<?php

require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

global $link;
$link=new mysqli($_ENV["Server"],$_ENV["DB_Username"],$_ENV["DB_Password"],$_ENV["DB"]) or die("Failed to connect to mysql");
if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
