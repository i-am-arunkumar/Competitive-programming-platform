<?php

$userId = $_POST["uid"];
$questionId = $_POST['qid'];

$database = mysqli_connect("localhost", "qmaxrun", "linux 1051", "CP_SITE");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

$question_query = "INSERT INTO user_records (uid,qid,score) VALUES ('$userId','$questionId',10);";

if (mysqli_query($database, $question_query)) {
    echo "success";
} else {
    echo "failed";
}
