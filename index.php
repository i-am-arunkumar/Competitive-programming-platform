<!DOCTYPE html>
<html lang="en">

<!--Head-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Signin/signin.css" rel="stylesheet">

    <title>Home</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
</head>

<style>
    .card {
        margin-top: 16px;
    }

    .logout {
        display: none;
    }

    .header-light{
        font-weight: 400;
        font-style: normal;
        font-size: 16px;
    }


</style>

<body id="root">



    <?php

    include("commons/header.php");
    ?>




    <div class="list" style="padding-top:72px">

        <?php
        include("commons/db_connection.php");

        $sql = "SELECT contest_id, contest_name, contest_date, contest_duration,contest_author,contest_description FROM contest_details";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                echo  '
            <div class="card" >
                <h3 class="card-header" style="line-height:120%">  <a class="cname" href="javascript:entercontest(' . $row["contest_id"] . ');" style="color:blue;text-decoration:none">' . $row["contest_name"] . '</a> 
                
                <p style="float:right;font-size:20px;"> <span class="header-light" > Date : </span>' . date_format(date_create($row["contest_date"]), "d - m - Y") . '<br><span class="header-light"> Time : </span> ' .
                    date_format(date_create($row["contest_date"]), "h:i a") . ' </p>
                                 
                <br>
                
                <p class="cauthor" style="float:left;font-size:20px;color:rgba(139, 136, 136, 0.979)">prepared by ' . $row["contest_author"] . '</p>


                </h3>
                <div class="card-body">
                    <h5 class="card-title" style="color:rgb(0, 0, 0);"> Duration: ' . date_format(date_create($row["contest_duration"]), "g") . 'hr ' . date_format(date_create($row["contest_duration"]), "i") . 'min </h5>
                    <p class="card-text">' . $row["contest_description"] . '</p>
                    <a onclick="entercontest(' . $row["contest_id"] . ');" class="btn btn-'.'primary">Enter contest</a>
                </div>
            </div>
            ';
            }
        } else {
            echo 'nol';
        }

        $conn->close();
        ?>



        <script>
            var options = {
                valueNames: ['cname','cauthor']
            };

            var userList = new List('root', options);




            function entercontest(cid,timestamp) {
                if (sessionStorage.getItem("uid")) {

                    if (Date.now() < timestamp) {
                        window.location.href = "/competitive-programming-platform/Contest/contest.php?id=" + cid;
                    }else{
                        alert("Contest was over! better luck next time :(");
                    }

                } else {
                    alert("Please log in participate in contest");
                }
            }
        </script>
</body>

</html>