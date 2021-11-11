<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <style>
        .card {
            margin-top: 16px;
        }
    </style>

</head>

<body>
    <?php
    include("commons/header.php");
    ?>



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