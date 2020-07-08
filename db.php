<?php

$servername="localhost";
$username="stefan";
$password="qwer1234";
$database="company"; // Company will be the database that we are goin to create it in mysql
global $link;
$link=new mysqli($servername,$username,$password,$database) or die("Failed to connect to mysql");

// if (mysqli_connect_errno())
// {
//         echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// ?>
