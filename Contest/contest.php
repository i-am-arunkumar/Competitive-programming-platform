<!DOCTYPE html>
<html lang="en">

<?php
include("../commons/header.php");
include("../commons/db_connection.php");
?>

<link rel="stylesheet" href="contest.css">

<body>

<?php
$contest_id = htmlspecialchars($_GET["id"]);

$sql = "SELECT * FROM CONTEST_DETAILS WHERE CONTEST_ID = $contest_id";
$result = $conn->query($sql);

$contest_details = $result->fetch_assoc();
?>

<!--Hero Section-->
<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">
        <?php echo $contest_details["contest_name"] ?>
    </h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
            <?php echo $contest_details["contest_date"] ?>
        </p>
        <!--        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">-->
        <!--            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">-->
        <!--                Primary button-->
        <!--            </button>-->
        <!--            <button type="button" class="btn btn-outline-secondary btn-lg px-4">-->
        <!--                Secondary-->
        <!--            </button>-->
        <!--        </div>-->
    </div>
</div>

<?php
$sql = "SELECT * FROM CONTEST_QUESTIONS WHERE CONTEST_ID = $contest_id";
$result = $conn->query($sql);
?>

<!--Questions Table-->
<div class="table">
    <table class="table table-striped table-hover text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question Name</th>
            <th scope="col">Solved?</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr>
                <th scope="row">' . $row["question_id"] . '</th>
                <td>' . $row["question_name"] . '</td>
                <td>-</td>
            </tr>
            ';
        }
        ?>
        </tbody>
    </table>
</div>

</body>

</html>
