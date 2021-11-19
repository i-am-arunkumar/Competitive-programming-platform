<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contest</title>

    <link rel="stylesheet" href="index.css">
</head>

<body class="container">

    <?php

    include("../commons/header.php");
    include("./commons/db_connection.php");


    $contest_id = htmlspecialchars($_GET["id"]);

    $database = mysqli_connect("localhost", "qmaxrun", "linux 1051", "CP_SITE");


    $sql = "SELECT * FROM contest_details WHERE contest_id = $contest_id";

    $contest_details = mysqli_fetch_assoc(mysqli_query($database, $sql));

    ?>
    <script>
        if (!sessionStorage.getItem("uid")) {
            window.location.href = "/Competitive-programming-platform"
        }

        function durationToMili(duration) {
            var time = duration.split(":");
            return parseInt(time[0]) * 60 * 60 * 1000 + parseInt(time[1]) * 60 * 1000 +
                parseInt(time[2]) * 1000;
        }

        var startTime = <?php echo strtotime($contest_details["contest_date"]) * 1000 ?>;
        var duration = durationToMili("<?php echo $contest_details["contest_duration"] ?>");
        var endTime = startTime + duration //- 16200000;

        // console.log(endTime, Date.now())
        var x = setInterval(function() {

            var now = Date.now();

            var distance = endTime - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "CONTEST OVER";
            }
        }, 1000);
    </script>

    <!--Hero Section-->
    <div class="hero px-3 py-4 my-3 text-center">
        <h1 class="display-5 fw-bold">
            <?php echo $contest_details["contest_name"] ?>
        </h1>
        <div class="col-lg-6 mx-auto">
            <p id="timer" class="lead mb-4">
                <!--timer goes here-->
            </p>
        </div>
    </div>

    <?php
    //include("uid.php");

    $user_id = $_COOKIE['uid'];
    $solved_count = 0;
    $total_count = 0;

    $sql = "
    SELECT * FROM questions
    LEFT JOIN
    user_records
    ON questions.id = user_records.qid AND
    questions.contest_id = $contest_id AND
    user_records.uid=$user_id";

    $result = mysqli_query($database, $sql);
    //echo json_encode($result->fetch_assoc());
    ?>

    <div class="qs">

        <!--Questions Table-->
        <div class="tables">
            <table class="table table-striped table-hover text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Question Name
                        </th>
                        <th scope="col">
                            Solved?
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['contest_id'] == $contest_id) {
                            echo '
                    <tr>
                        <th scope="row">
                            ' . $row["id"] . '
                        </th>
                        <td>
                            <a 
                                class="link"
                                style="text-decoration: none;" 
                                href="http://localhost/Competitive-programming-platform/Question?id=' . $row["id"] . '">
                                ' . $row["title"] . '
                            </a>
                        </td>
                        <td>
                            ' . (($row["qid"] == "") ? "No" : "Yes") . '
                        </td>
                    </tr>
                    ';

                            $total_count++;
                            if ($row["qid"])
                                $solved_count++;
                        }
                    }

                    if ($total_count == 0) {
                        echo '
                 <tr>
                    <td colspan="3">
                        No Questions so far.
                    </td>
                 </tr>
                ';
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <!--Profile Card-->
        <div class="board">
            <div class="card text-center" style="height: 150px;">
                <div class="card-header fw-bold">
                    Score
                </div>
                <div class="card-body inner-board">
                    <h5 class="card-title">
                        Solved: <?php echo $solved_count . ' / ' . $total_count; ?>
                    </h5>
                    <a class="btn btn-primary" href="http://localhost/Competitive-programming-platform/Contest/leaderboard.php?id=<?php echo $contest_id ?>" style="width: 80%; border-radius: 20px;">
                        Leaderboard
                    </a>
                </div>
                <!--            <div class="progress" style="">-->
                <!--                <div-->
                <!--                        class="progress-bar w"-->
                <!--                        role="progressbar"-->
                <!--                        aria-valuenow="--><?php //echo $solved_count 
                                                                ?>
                <!--"-->
                <!--                        aria-valuemin="0"-->
                <!--                        aria-valuemax="--><?php //echo $total_count 
                                                                ?>
                <!--">-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
        </div>

    </div>

</body>

</html>