<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<div id="id02" class="modal">
  
  <div class="modal-content animate" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="https://th.bing.com/th/id/OIP.NHIFqwS7wDOH83DMRrZf1wHaHZ?pid=ImgDet&rs=1" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="pwd" required>
        
      <button class="btt" onclick='loginsubmit();' >Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"> <a href="#">Forgot password?</a></span>
    </div>
</div>
</div>

<script>

  function loginsubmit(e) {
    
    $.post("/Competitive-programming-platform/Authentication/login.php", {
                        username: $("#uname").val(),
                        password : $("#pwd").val()
                    }).then(e => {
                      console.log(e);
                      let data = JSON.parse(e)
                       if(data.status === "success") {
                         sessionStorage.setItem("uid" ,data.id);
                         document.getElementById('id02').style.display='none';
                         authHandle(true);
                       }
                       else{
                         alert(data.status);
                       }
                    })
  }
// Get the modal
var modal2 = document.getElementById('id02');
var modal1 = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>




</body>
</html>
