<!doctype html>
<html lang="en">

<?php
include("../commons/header.php");
include("../commons/db_connection.php");
?>

<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="leaderboard.css">
</head>

<body class="container">

<?php
$contest_id = htmlspecialchars($_GET["id"]);

$sql = "SELECT * FROM CONTEST_DETAILS WHERE CONTEST_ID = $contest_id";
$result = $conn->query($sql);

$contest_details = $result->fetch_assoc();
?>

<!--Hero Section-->
<div class="hero mx-3 px-3 py-3 my-2 text-center">
    <h1 class="display-5 fw-bold">
        <?php echo $contest_details["contest_name"] ?>
    </h1>
</div>

<?php
$users_query = "SELECT ID, USERNAME FROM USER_DATABASE ORDER BY ID";
$users_conn = $conn->query($users_query);
$array = array();

while ($row = $users_conn->fetch_assoc()) {
    $array[] = $row;
}

//echo print_r($array);
//echo $array[0]['USERNAME'];

?>

<?php
$sql = "select uid as uid, count(uid) as score 
        from user_records
        where cid = $contest_id
        group by uid
        order by score desc";

$result = $conn->query($sql);
?>

<div id="leaderboard">
    <table
            class="table table-striped table-hover text-center table-bordered"
            style="width: 80%;"
    >
        <thead>
        <tr>
            <th scope="col">
                Rank
            </th>
            <th scope="col">
                User ID
            </th>
            <th scope="col">
                Score
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rank = 0;
        while ($row = $result->fetch_assoc()) {
            $rank++;

            echo '
                    <tr>
                        <th scope="row">
                                ' . $rank . '
                        </th>
                        <td>
                            ' . $array[$row["uid"] - 1]['USERNAME'] . '
                        </td>
                        <td>
                            ' . $row["score"] . '
                        </td>
                    </tr>
                    ';

        }
        ?>

        </tbody>
    </table>
</div>

</body>
</html>