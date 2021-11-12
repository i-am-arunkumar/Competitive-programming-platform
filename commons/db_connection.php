<?php
$servername = "localhost";

$username = "root";

$password = "";

$db = "cp_site";


$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    echo "Connection Failed!";
//    die()
}

//echo "Working";
