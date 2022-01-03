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
				<h1 style="background-color:rgb(82, 74, 74);">USER REVIEWS</h1>
			</div>
		</div>
	</div>

    <?php
    require('DatabaseConnect.php');
		
	
    if(empty($_SESSION)) 
    {
        session_start();
    }


$sql1 = "SELECT r.username, r.Book, r.Author, r.Review, r.Stars FROM Reviews r join userstable u ON (r.username = u.username) ORDER BY STARS DESC";
$result1 = $Connection->query($sql1);

if ($result1->num_rows > 0) {
  
 while($row = $result1->fetch_assoc()) {
    echo "<br>";
    echo "<h3>Reviewer: " . $row["username"]. "<br>Books: " . $row["Book"]. "<br>Author: " . $row["Author"]. "<br>Review: " . $row["Review"].
     "<br>Stars: " . $row["Stars"]."</h3><br>";
     
    goto includeFooter;
  }
} 
    else {
  echo "Try again later";
}
        SkipBackToForm:


?>



        <div class="Form">
		<h1>To participate on this journey.<br> Fill the voids</h1>
			<form name="Challenges" action="" method="post">
				<input type="text" name="Username" placeholder="Username" required />
				<input type="password" name="Password" placeholder="Password" required />
				<input type="password" name="RePassword" placeholder="Confirm Your Password" required />
				<input type="text" name="NumberOfBooks" placeholder="Number of Books you have read" required />
                <input type="text" name="Weekly" placeholder="WEEKLY: YES/NO" required />
                <input type="text" name="Monthly" placeholder="MONTHLY: YES/NO" required />
				<input type="submit" name="Submit" value="Submit" />
			</form>
		</div>

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