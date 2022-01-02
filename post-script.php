<?php 
$conn = mysqli_connect("localhost","root","","bookworm's orchestra");
 
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$user_post = $_POST['post'];
$sql = "INSERT INTO post(Post) VALUES('$user_post')";
if(mysqli_query($conn, $sql))
 {
     echo "Information Added";
 }
 else
 {
     echo "There is an error:" . mysqli_error($db);
 }
?>
 
