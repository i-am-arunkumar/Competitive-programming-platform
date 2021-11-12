<!DOCTYPE html>
<html lang="en">

<?php
include("commons/header.php");
?>

<style>
    .card {
        margin-top: 16px;
    }
</style>

<body>




    <div style="padding-top:72px">


        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cp_site";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            //  echo 'k';
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT contest_name, contest_date, contest_duration,contest_author,contest_description FROM contest_details";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                echo '<div class="card">
    <h5 class="card-header">' . $row["contest_name"] . ' <p style="float:right">prepared by ' . $row["contest_author"] . ' at ' . date('M/d/Y',strtotime($row["contest_date"]))  . '</p></h5>
    <div class="card-body">
        <h5 class="card-title">' . $row["contest_author"] . '</h5>
        <p class="card-text">' . $row["contest_description"] . '</p>
        <a href="/competitive-programming-platform/Contest" class="btn btn-primary">Enter</a>
    </div>
</div> ';
            }
        } else {
            echo 'nol';
        }

        $conn->close();
        ?>




</body>

</html>