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

$sql = "SELECT * FROM CONTEST_DETAILS";
$result = $conn->query($sql);

$contest_details = $result->fetch_assoc();
?>

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


<!--<div class="table">-->
<!--    <table class="table table-striped table-hover">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th scope="col">#</th>-->
<!--            <th scope="col">Question Name</th>-->
<!--            <th scope="col">Solved?</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <th scope="row">1</th>-->
<!--            <td>Linear keyboard</td>-->
<!--            <td>Yes</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <th scope="row">2</th>-->
<!--            <td>Odd Grasshopper</td>-->
<!--            <td>No</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <th scope="row">3</th>-->
<!--            <td>Minimum Extraction</td>-->
<!--            <td>No</td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->

</body>

</html>
