<?php 
  include("post.php");
 
   $Book_title = $_POST["book_title"];
 
   $sql = "SELECT * FROM book WHERE book_title LIKE '$Book_title%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td>".$row['book_id']."</td><td>".$row['book_title']."</td><td>".$row['copyright_year']."</td></tr>";
   }
    echo $data;
 ?>