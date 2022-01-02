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
				<li><a href="Reviews.php">Reviews</a></li>
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
			<h1 style="background-color:rgb(82, 74, 74);">Reviews</h1>
				<p style="background-color:rgb(82, 74, 74);",  class="btn-primary"> AWAKEN YOUR INNER SELF </p>
			</div>
		</div>
	</div>

	<?php
		
		
		require('DatabaseConnect.php');
		
		session_start();
		
	
	    if(isset($_REQUEST['Username']))
		{
			$Username = mysqli_real_escape_string($Connection,$_REQUEST['Username']);
			
			$Book = mysqli_real_escape_string($Connection,$_REQUEST["Book"]);
						
		
			$Author = mysqli_real_escape_string($Connection,$_REQUEST["Author"]);
			
	
			$Review = mysqli_real_escape_string($Connection,$_REQUEST["Review"]);

			
			$Stars = mysqli_real_escape_string($Connection,$_REQUEST["Stars"]);
			
			
			if (strlen($Stars) > 10) 
			{
				echo "<div class='Form'><h3>Grading is not valid. Try Again</h3><br/></div>";
			 
				goto SkipBackToForm;
			
			}
			
		
			if (!is_numeric($Stars) )
			{
				echo "<div class='Form'><h3>Your Grading must be numeric, it must only contain valid numbers.</h3><br/></div>";
				
				goto SkipBackToForm;
			}
			
			
			
	        $Query = "INSERT INTO Reviews (Username,Book, Author, Review, Stars) 
					   VALUES ('$Username', '$Book','$Author', '$Review','$Stars')";
		
		
	        $Result = mysqli_query($Connection,$Query);
	        if($Result)
			{
				echo "<br>";
				
	            echo "<div class='Form'><h3>Review Posted.</h3><br/>Click here to <a href='Main-Page.html'>Main Page</a></div>";
	
				echo "<br><br>";
				
				
				goto includeFooter;
	        }
	
		
			else
			{
				echo "<div class='Form'><h3> please try again.</h3><br/></div>";
			}
		}
		

		SkipBackToForm:
	
			
	?>
		<div class="Form">
		<h1>Fill in the form below</h1>
			<form name="Reviews" action="" method="post">
				<input type="text" name="Username" placeholder="Username" required />
				<input type="text" name="Book" placeholder="Book" required />
				<input type="text" name="Author" placeholder="Author" required />
				<input type="text" name="Review"  rows="10" cols="30" placeholder= "Review" required />
				<input type="text" name="Stars" placeholder="Stars" required />
				<input type="submit" name="Submit" value="Post" />
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