<?php 

include("../commons/db_connection.php");
 $username  = $_POST["username"];
 $password = $_POST["password"];

 $sql = 'SELECT * FROM user_database WHERE username="' . $username . '"' ;
 $result = $conn->query($sql);

if($result->num_rows == 0){

    
$response =   array(
    "status"=>"please register",)   ;
echo json_encode($response);
}
else{
    $row= $result->fetch_assoc();
if($row["password"] == $password){
    $response =  array(
        "status"=>"success",
        "id"=>$row['id'])    ;
echo json_encode($response);
}
else{
    $response =  array(
        "status"=>"invalid password")   ;
    echo json_encode($response);
}
 
}


?>