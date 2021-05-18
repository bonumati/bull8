<?php
	require("connection.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST"){

			$email = $_POST['email'];
    		$mypassword = $_POST['password'];
            $password = md5($mypassword);
    	
			
    		 $query = "SELECT * FROM users WHERE email = '$email' and password = '$password' ";

    		$run = mysqli_query($conn, $query) or die(mysqli_error());
    		
			$rows = mysqli_num_rows($run);

    		    if( $rows > 0)  
           {  

           	while ($row = $run->fetch_assoc()) {
  			  $_SESSION['id'] =$row['id'];
              $_SESSION['displayName'] =$row['displayName'];
                header("location:index.php");      
  

    }
               
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }


	}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/09afaa9242.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main">
        <nav class="navbar h-nav-resp">
            <ul class="nav-list v-class-resp">
                <div class="logo"><a href="index.php"><img src="img/logo2.jpg" alt="logo"></a></div>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <!-- <li><a href="myevent.html">My Events</a></li> -->
            </ul>
        </nav>
        <form action=" " method="post">
        <div class="container">
            <h1>Log In</h1>
            <div class="box">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
            </div>
            <div class="box">
                <i class="fa fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
            </div>
            <button class="btn">Sign In</button>
            <a href="signUp.php" id="signUp">Don't have a account?</a>
        </div>
        </form>

        <footer id="footer">
            <p text-footer>&copy; Copyright 2021 esports.com</p>
        </footer>
    </div>
</body>

</html>