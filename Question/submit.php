<?php

$userId = $_POST["uid"];
$questionId = $_POST['qid'];
$cid = $_POST['cid'];

$database = mysqli_connect("localhost", "root", "", "cp_site");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

$question_query = "INSERT INTO user_records (uid,cid,qid) VALUES ($userId,$cid,$questionId);";

if (mysqli_query($database, $question_query)) {
    echo "success";
} else {
    echo "failed";
}
