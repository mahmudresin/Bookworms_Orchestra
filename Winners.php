<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="Main-Style.css"/>
		<title>Challenges</title>
	</head>

    <body>

	<div div class="header">
		<div class="container">
			<div id="menu">
			<ul class="nav">
                            <li><a href="Main-Page.html">Welcome</a></li>
							<li><a href="Search.php">Search</a></li>
							<li><a href="Reviews.php">Review</a></li>
							<li><a href="Register.php">Register</a></li>
							<li><a href="Login.php">My Account</a></li>
							<li><a href="Challenges.php">Challenges</a></li>
			</ul>
			</div>
		</div>
	</div>
	
	<div class="backgroundfix4">
		<div class="container">  
			<div class="main">
				<h1 style="background-color:rgb(82, 74, 74);">Winners</h1>
			</div>
		</div>
	</div>


    <?php
    require('DatabaseConnect.php');
		
	
    if(empty($_SESSION)) 
    {
        session_start();
    }


echo "<h1>The winner of weekly challenges.<h1>". "<br>";

$sql = "SELECT c.username, c.NumberOfBooks FROM Challenges c join userstable u ON (c.username = u.username) AND c.Weekly = 'YES' ORDER BY c.NumberOfBooks DESC";
$result = $Connection->query($sql);

if ($result->num_rows > 0) {
  
 while($row = $result->fetch_assoc()) {
    echo "<br>";
    echo "<h3>Username:  " . $row["username"]. " Number Of Books: " . $row["NumberOfBooks"]. "</h3><br>";
     
  }
} 

echo "<h1>The winner of Monthly challenges.<h1>". "<br>";

$sql1 = "SELECT c.username, c.NumberOfBooks FROM Challenges c join userstable u ON (c.username = u.username) AND c.Monthly = 'YES' ORDER BY c.NumberOfBooks DESC";
$result1 = $Connection->query($sql1);

if ($result1->num_rows > 0) {
  
 while($row = $result1->fetch_assoc()) {
    echo "<br>";
    echo "<h3>Username:  " . $row["username"]. "<br> Number Of Books: " . $row["NumberOfBooks"]. "</h3><br>";
     
    goto includeFooter;
  }
} 
    else {
  echo "Try again later";
}
        SkipBackToForm:


?>

    <?php includeFooter: ?>
	<div class="clearfix"></div>
	<div  class="footer">
		<div class="container">
                        <p>Copyright. 2021 Yeamin Mahmud. All rights reserved.</p>
						<p>Contact with us if you find any difficulties.</p>
						<p>Email: yeaminmahmudres@gmail.com </p>
						<p>Email: syedaramimarafsana@gmail.com </p>
		</div>
	</div>
</body>

</html>
