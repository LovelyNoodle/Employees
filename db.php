<?php

$servername="localhost";
$username="stefan";
$password="qwer1234";
$database="Company"; // Company will be the database that we are goin to create it in mysql
$connect=new mysqli($servername,$username,$password,$database);

if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
