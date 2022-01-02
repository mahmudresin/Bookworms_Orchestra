<!DOCTYPE html>

<html>
    <head>
        <title>
            Profile
</title>
</head>

<body>

<h2> Mind</h2>
<?php
$conn = mysqli_connect("localhost", "root","", "bookworm's orchestra");

if(!$conn)
{
    die("Connection error: " . mysqli_connect_error());
}
else
{
    echo "Connection Success" . "<br>";
}
$sql = "SELECT Post From post";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    while($user_post = mysqli_fetch_assoc($result))
    {
        ?>
        <p> <?php echo $user_post['post']; ?> </p>
            
       
    <?php

        
    }
}
    ?>
    </body>
    </html>