<!DOCTYPE html>
<html lang="en">

<?php
include("../commons/header.php");
include("../commons/db_connection.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="./contest.css">

<body class="container">

<?php
$contest_id = htmlspecialchars($_GET["id"]);

$sql = "SELECT * FROM CONTEST_DETAILS WHERE CONTEST_ID = $contest_id";
$result = $conn->query($sql);

$contest_details = $result->fetch_assoc();
?>

<script>
    function durationToMili(duration) {
        var time = duration.split(":");
        return parseInt(time[0]) * 60 * 60 * 1000 + parseInt(time[1]) * 60 * 1000
            + parseInt(time[2]) * 1000;
    }

    // Set the date we're counting down to
    var startTime = <?php echo strtotime($contest_details["contest_date"]) * 1000 ?>;
    var duration = durationToMili("<?php echo $contest_details["contest_duration"] ?>");
    var endTime = startTime + duration;

    console.log(endTime, Date.now())
    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = Date.now();

        // Find the distance between now and the count down date
        var distance = endTime - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("timer").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
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
        </p>
    </div>
</div>

<?php
$user_id = 1;
$solved_count = 0;
$total_count = 0;

$sql = "
    SELECT * FROM QUESTIONS
    INNER JOIN
    USER_RECORDS
    ON QUESTIONS.ID = USER_RECORDS.QID AND
    QUESTIONS.CONTEST_ID = USER_RECORDS.CID AND
    $user_id = USER_RECORDS.UID
";

$result = $conn->query($sql);
//echo json_encode($result->fetch_assoc());
?>

<!--Questions Table-->
<div class="qs row">
    <div class="table col-md-8">
        <table class="table table-striped table-hover text-center">
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
            while ($row = $result->fetch_assoc()) {
                echo '
                    <tr>
                        <th scope="row">
                        ' . $row["qid"] . '
                        </th>
                        <td>
                            <a href="http://localhost/cpSite/Question?id=' . $row["qid"] . '">
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
            ?>
            </tbody>
        </table>
    </div>

    <!--Profile Card-->
    <div class="board card text-center col-md-4">
        <div class="card-header">
            Score
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Questions Solved: <?php echo $solved_count . ' / ' . $total_count; ?>
            </h5>
        </div>
    </div>
</div>

</body>

</html>
