<?php
 
include("backend-search.php")
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
  <h6 className="text-center text-success mt-5"><b>Search Books</b></h6>
    <div class="input-group mb-4 mt-3">
     <div class="form-outline">
        <input type="text" id="getBookName"/>
    </div>
  </div>                   
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Book ID</th>
        <th>Book Title</th>
        <th>Publish Year</th>
        <th>Book Cover</th>
      </tr>
    </thead>
    <tbody id="showSingleBook">
      <?php  
            $sql = "SELECT * FROM book";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query))
            {
              echo"<tr>";
               echo"<td><h6>".$row['book_id']."</h6></td>";
               echo"<td><h6>".$row['book_title']."</h6></td>";
               echo"<td>".$row['copyright_year']."</td>";
            //    echo"<td><img src='images/".$row['image_path']."' style='height:30px;' ></td>";  
              echo"</tr>";   
            }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>
<script>
  $(document).ready(function(){
   $('#getBookName').on("keyup", function(){
     var getBookName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchBook.php',
       data:{book_title:getBookName},
       success:function(response)
       {
            $("#showSingleBook").html(response);
       } 
     });
   });
  });
</script>