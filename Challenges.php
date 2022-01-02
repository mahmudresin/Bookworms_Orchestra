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
				<h1 style="background-color:rgb(82, 74, 74);">Weekly Challenges and Monthly Challenges</h1>
				<p style="background-color:rgb(82, 74, 74);"  class="btn-primary">Log in to take part on this journey</p>
			</div>
		</div>
	</div>

    <?php
	
		require('DatabaseConnect.php');
		
	
		if(empty($_SESSION)) 
		{
			session_start();
		}
			
		

        if(isset($_REQUEST['Username']))
		{
			$Username = mysqli_real_escape_string($Connection,$_REQUEST["Username"]);
						
		
			$Password = mysqli_real_escape_string($Connection,$_REQUEST["Password"]);
			
	
			$RePassword = mysqli_real_escape_string($Connection,$_REQUEST["RePassword"]);

			
			$NumberOfBooks = mysqli_real_escape_string($Connection,$_REQUEST["NumberOfBooks"]);
			

			$Weekly = mysqli_real_escape_string($Connection,$_REQUEST["Weekly"]);


			$Monthly = mysqli_real_escape_string($Connection,$_REQUEST["Monthly"]);
			
			
			if ($Password != $RePassword) 
			{
				echo "<div class='Form'><h3>The passwords don't match. Try Again</h3><br/></div>";
			 
				goto SkipBackToForm;
			
			}

            if (!$Weekly=="NO" || !$Weekly == "YES" ) 
			{
				echo "<div class='Form'><h3>Your weekly input doesn't match. Try Again</h3><br/></div>";
			 
				goto SkipBackToForm;
			
			}

            if (!$Monthly=="NO" || !$Monthly == "YES" ) 
			{
				echo "<div class='Form'><h3>Your monthly input doesn't match. Try Again</h3><br/></div>";
			 
				goto SkipBackToForm;
			
			}
			
		
			if (!is_numeric($NumberOfBooks) )
			{
				echo "<div class='Form'><h3>This must be numeric, it must only contain valid numbers.</h3><br/></div>";
				
				goto SkipBackToForm;
			}
			
			
			
	        $Query = "INSERT INTO Challenges (Username, Password, NumberOfBooks, Weekly, Monthly) 
					   VALUES ('$Username', '$Password','$NumberOfBooks', '$Weekly','$Monthly')";
		
		
	        $Result = mysqli_query($Connection,$Query);
	        if($Result)
			{
				echo "<br>";
				
	            echo "<div class='Form'><h3>Challenges Recorded.</h3><br/>Click here to <a href='Main-Page.html'>Main Page</a></div>";
	
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
						<p>Contact with us if you find any difficulties.</p>
						<p>Email: yeaminmahmudres@gmail.com </p>
						<p>Email: syedaramimarafsana@gmail.com </p>
		</div>
	</div>
</body>

</html>
