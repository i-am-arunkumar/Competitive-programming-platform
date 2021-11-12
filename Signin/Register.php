<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./signin.css" rel="stylesheet">
    <style>

    </style>

</head>

<body>


    <div id="id01" class="modal">

        <div class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">

                <label for="mailid"><b> Email address</b></label>
                <input type="text" placeholder="Enter Email address" name="mailid_r" id="mailid_r" required>

                <label for="name"><b>name</b></label>
                <input type="text" placeholder="Enter name" name="name_r" id="name_r" required>
                
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname_r" id="uname_r" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw_r" id="psw_r" required>
                
                <button class="bttt" onclick='registersubmit();'>Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"> <a href="#">Forgot password?</a></span>
            </div>
        </div>
    </div>


    <script>
        function registersubmit(e) {

            $.post("/Competitive-programming-platform/Authentication/register.php", {
                email: $("#mailid_r").val(),
                name: $("#name_r").val(),
                username: $("#uname_r").val(),
                password: $("#psw_r").val(),
               
            }).then(e => {
                console.log(e);
            })
        }
    </script>

</body>

</html>