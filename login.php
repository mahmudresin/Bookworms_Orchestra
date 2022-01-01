<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="Main-Style.css"/>
		<title>Log In</title>
	</head>
	
<body>

	<div div class="header">
		<div class="container">
			<div id="menu">
			<ul class="nav">
				<li><a href="Main-Page.html">Welcome</a></li>
				<li><a href="Search.php">Search</a></li>
				<li><a href="Review.php">Review</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="Login.php">My Account</a></li>
			</ul>
			</div>
		</div>
	</div>
	
	<div class="backgroundfix4">
		<div class="container">  
			<div class="main">
				<h1 style="background-color:rgb(82, 74, 74);">Log In</h1>
				<p style="background-color:rgb(82, 74, 74);"  class="btn-primary">Log in to access your account, view books and search for books.</p>
			</div>
		</div>
	</div>
					

	<?php
	

		//Connection to database.
		require('DatabaseConnect.php');
		
	
		if(empty($_SESSION)) 
		{
			session_start();
		}
		
	
		if(isset($_POST['Username']) and isset($_POST['Password']))
		{
		
			$Username = $_POST['Username'];
			$Password = $_POST['Password'];
			
	
			$Query = "SELECT * FROM userstable WHERE Username = '$Username' and Password = '$Password'";
			 
			$Result = mysqli_query($Connection, $Query) or die(mysqli_error($Connection));
			$Count = mysqli_num_rows($Result);
			
		
			if ($Count == 1)
			{
				$_SESSION['Username'] = $Username;
			}
		
			else
			{
				echo "<div class='Form'><h3>Username/Password entered is invalid, try again.</h3></div>";
			}
		}
		

		if(isset($_SESSION['Username']))
		{
			$Username = $_SESSION['Username'];
			echo "<br><br>";
			echo "<div class='Form'><h1>Hello " . $Username . "<br></h1></div>";
			echo "<div class='Form'><h2>You have successfully logged in. <br></h2></div>";
			echo "<div class='Form'><h2>What would you like to do? <br></h2></div>";
			echo "<div class='Form'><h3><a href='Search.php'>Search For Books</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='Main-Page.html'>Go To Main Page</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='LoggedOut.php'>Not you? Logout.</a> <br></h3></div>";
			echo "<br><br>";
			
			$Query = $Connection->Query(sprintf("SELECT BookTable.ISBN, BookTable.BookTitle 
											FROM BookReserve 
											INNER JOIN BookTable 
											ON BookReserve.ISBN=BookTable.ISBN 
											WHERE BookReserve.Username = '%s'", $_SESSION['Username']));
			
			if ($Query->num_rows == 0) 
			{
				echo "<div class='Form2'><h2>No books have been reserved.</h2></div>"; 
			}
			
			
		
			while($Row = mysqli_fetch_array($Query))
			{
				echo "<table border=\"2\"align=\"center\"width=\"600\">";
				echo("</td><td>");
				echo "<div class=\"Form2\">";
				echo '<br /> ISBN:       ' .$Row['ISBN'];  
				echo '<br /> Book Title: ' .$Row['BookTitle'];  
				echo '<br /> <br />';
				echo("</tr>\n");
				echo "</div>";
				echo "<br>";
			}
			echo "</table>\n";
			
			echo "</select><br><br>";
			
			echo "<div class=\"Form2\">";
			echo "<form action=\"Unreserve.php\" method=\"POST\">";
			echo "ISBN Of The Book:<br>";
			echo "<input type=\"text\" name=\"ISBN\" placeholder=\"434-343-23\" required ><br>";
			echo "<input type=\"submit\" value=\"Submit\">";
			echo "</form>";
			echo "</div>";
		}
		else
		{		
	?>
	
	<div class="Form">
	<h1 class="loginheader">Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="Username" placeholder="Username" required />
			<input type="password" name="Password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		
	<p>Not registered yet? <a href='Register.php'>Register Here</a></p>

	</div>
	
	<?php } ?>
		
    <!-- Start of footer -->
	<div class="clearfix"></div>
	<div  class="footer">
		<div class="container">
			<p>Copyright. 2016 All rights reserved.</p>
		</div>
	</div>
	
</body>
</html>
