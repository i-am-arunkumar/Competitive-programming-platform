<?php

$userId = $_POST["uid"];
$questionId = $_POST['qid'];
$cid = $_POST['cid'];

$database = mysqli_connect("localhost", "qmaxrun", "linux 1051", "CP_SITE");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

$question_query = "INSERT INTO user_records (uid,cid,qid,score) VALUES ('$userId','$cid',$questionId',10);";

if (mysqli_query($database, $question_query)) {
    echo "success";
} else {
    echo "failed";
}
