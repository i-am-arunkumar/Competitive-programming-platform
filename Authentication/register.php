<?php 

include("../commons/db_connection.php");
 $email = $_POST["email"];
 $name  = $_POST["name"];
 $username  = $_POST["username"];
 $password = $_POST["password"];

 //generating id
 $result = $conn->query('SELECT COUNT(*) as size from user_database;');
 $row = $result->fetch_assoc();
 $id = $row["size"]+1;

 $sql = 'INSERT INTO user_database VALUES("'.$email.'",'.$id.',"'.$name.'","'.$username.'","'.$password.'")';
 $conn->query($sql);

 //checking for unique username
 $result = $conn->query('SELECT COUNT(*) as size from user_database;');
 $row = $result->fetch_assoc();
 $id2 = $row["size"]+1;

if($id2==$id){
    echo 'Username already exist! ';
}

 echo $email.','.$id.','.$name.','.$username.','.$password.');' ;

?>