<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="Main-Style.css"/>
		<title>SEARCH RESULT</title>
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
							<li><a href="Login.php">Log in</a></li>
							<li><a href="Challenges.php">Challenges</a></li>
			</ul>
			</div>
		</div>
	</div>
	
	<div class="backgroundfix4">
		<div class="container">  
			<div class="main">
				<h1 style="background-color:rgb(82, 74, 74);">SEARCH RESULTS</h1>
			</div>
		</div>
	</div>

    <?php
    require('DatabaseConnect.php');
		
	
    if(empty($_SESSION)) 
    {
        session_start();
    }


$sql = "SELECT b.book_title, b.author  FROM book b join SEARCH s ON (b.book_title = s.book_title)";
$result = $Connection->query($sql);

if ($result->num_rows > 0) {
  
 while($row = $result1->fetch_assoc()) {
    echo "<br>";
    echo "<h3><br>Books: " . $row["Book"]. "<br>Author: " . $row["Author"]."</h3><br>";
    echo "<h4>Your Book is available.</h4>";
  
    } 
}
    else {
  echo "<br><h3>Your desired Book is not available</h3>";
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