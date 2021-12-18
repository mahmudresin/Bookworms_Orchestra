<?php 

$db = mysqli_connect("localhost","root","","sign_in");

if(!$db){
    die("Connection Error: ".mysqli_connect_error());

}else{
    echo "Connection successful" ."<br>";
}
$sql = "CREATE TABLE student_info(id INT(10) PRIMARY KEY, student_name VARCHAR(30))";

if(mysqli_query($db,$sql)){
   echo "INFORMANTION ADDED";
}else{
    echo "There is an error".mysqli_error($db);
}


?>