<!DOCTYPE html>
<html lang="en">

<link href="Signin/signin.css" rel="stylesheet">


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
        include("commons/db_connection.php");

        $sql = "SELECT contest_name, contest_date, contest_duration,contest_author,contest_description FROM contest_details";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                echo  '
            <div class="card" >
                <h3 class="card-header" style="line-height:120%">  <a href="/competitive-programming-platform/Contest" style="color:blue;text-decoration:none">' . $row["contest_name"] . '</a> 
                
                <p style="float:right;font-size:20px;"> ' . date_format(date_create($row["contest_date"]), "M / d / Y") . '<br>Time: ' .
                    date_format(date_create($row["contest_date"]), "h:i:s a") . ' </p>
                                 
                <br>
                
                <p style="float:left;font-size:20px;color:rgba(139, 136, 136, 0.979)">prepared by ' . $row["contest_author"] . '</p>


                </h3>
                <div class="card-body">
                    <h5 class="card-title" style="color:rgb(0, 0, 0);"> Duration: ' . date_format(date_create($row["contest_duration"]), "g") . 'hr ' . date_format(date_create($row["contest_duration"]), "i") . 'min </h5>
                    <p class="card-text">' . $row["contest_description"] . '</p>
                    <a href="/competitive-programming-platform/Contest" class="btn btn-primary">Enter</a>
                </div>
            </div>
            ';
            }
        } else {
            echo 'nol';
        }

        $conn->close();
        ?>




</body>

</html>