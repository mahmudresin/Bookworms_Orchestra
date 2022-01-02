

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	   
		<link type="text/css" rel="stylesheet" href="Main-Style.css"/>
		<title>Register</title>
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
				<li><a href="Challenges.php">Challenges</a></li>
			</ul>
			</div>
		</div>
	</div>
	
	<div class="backgroundfix3">
		<div class="container">  
			<div class="main">
			<h1 style="background-color:rgb(82, 74, 74);">Registration</h1>
				<p style="background-color:rgb(82, 74, 74);",  class="btn-primary">Sign up as a BOOKWORM and Have a wonderful journey </p>
			</div>
		</div>
	</div>
	


	<?php
		
		
		require('DatabaseConnect.php');
		
		session_start();
		
		
		if(isset($_SESSION['Username'])) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>You're already logged in, log out if you wish to make a new account.</h2></div>";
			echo "<br>";
			echo "<div class='Form'><h3><a href='Login.php'>View your account</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='LoggedOut.php'>Want to log out?</a> <br></h3></div>";
			echo "<br><br>";
			
		
			goto includeFooter;
		}
		
	
	    if(isset($_REQUEST['Username']))
		{
			$Username = mysqli_real_escape_string($Connection,$_REQUEST["Username"]);
						
		
			$Password = mysqli_real_escape_string($Connection,$_REQUEST["Password"]);
			
	
			$RePassword = mysqli_real_escape_string($Connection,$_REQUEST["RePassword"]);

			
			$Email = mysqli_real_escape_string($Connection,$_REQUEST["Email"]);
			

			$FirstName = mysqli_real_escape_string($Connection,$_REQUEST["FirstName"]);


			$Surname = mysqli_real_escape_string($Connection,$_REQUEST["Surname"]);
			

			$AddressLine1 = mysqli_real_escape_string($Connection,$_REQUEST["AddressLine1"]);
			
			
			$City = mysqli_real_escape_string($Connection,$_REQUEST["City"]);
			
	
			$Mobile = mysqli_real_escape_string($Connection,$_REQUEST["Mobile"]);
			
			if ($Password != $RePassword) 
			{
				echo "<div class='Form'><h3>The passwords don't match. Try Again</h3><br/></div>";
			 
				goto SkipBackToForm;
			
			}
			
		
			if (!is_numeric($Mobile) )
			{
				echo "<div class='Form'><h3>Your Mobile must be numeric, it must only contain valid numbers.</h3><br/></div>";
				
				goto SkipBackToForm;
			}
			
			
			
	        $Query = "INSERT INTO UsersTable (Username, Password, Email, FirstName, SurName,  Addressline1,  City,  Mobile) 
					   VALUES ('$Username', '$Password','$Email', '$FirstName','$Surname', 
							   '$AddressLine1', '$City',  '$Mobile')";
		
		
	        $Result = mysqli_query($Connection,$Query);
	        if($Result)
			{
				echo "<br>";
				
	            echo "<div class='Form'><h3>You have registered, please log in.</h3><br/>Click here to <a href='Login.php'>Login</a></div>";
	
				echo "<br><br>";
				
				
				goto includeFooter;
	        }
	
		
			else
			{
				echo "<div class='Form'><h3> please try again with another username and password.</h3><br/></div>";
			}
		}
		

		SkipBackToForm:
			
	?>
		<div class="Form">
		<h1>Fill in the form below</h1>
			<form name="Registration" action="" method="post">
				<input type="text" name="Username" placeholder="Username" required />
				<input type="password" name="Password" placeholder="Password" required />
				<input type="password" name="RePassword" placeholder="Confirm Your Password" required />
				<input type="text" name="Email" placeholder="Email" required />
				<input type="text" name="FirstName" placeholder="First Name" required />
				<input type="text" name="Surname" placeholder="Surname" required />
				<input type="text" name="AddressLine1" placeholder="Address Line 1" required />
				<input type="text" name="City" placeholder="City" required />
				<input type="text" name="Mobile" placeholder="Mobile" required />
				<input type="submit" name="Submit" value="Register" />
			</form>
		</div>
		  
    <!--Start of footer-->
	<?php includeFooter: ?>
	<div class="clearfix"></div>
	<div  class="footer">
		<div class="container">
			<p>Copyright. 2016 All rights reserved.</p>
		</div>
	</div>
</body>

</html>