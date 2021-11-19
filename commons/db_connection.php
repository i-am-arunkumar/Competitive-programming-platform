<?php
$servername = "localhost";

$username = "qmaxrun";

$password = "linux 1051";

$db = "CP_SITE";


$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    echo "Connection Failed!";
    //    die()
}
