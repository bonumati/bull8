<?php  
	 $emailerr = "";
     $dispNameErr = '';
	require("connection.php");
	session_start();
	$errors = array();
    //  echo 'Part 0';
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        // echo 'Part 12345';
		if(empty($_POST['email']) && empty($_POST['password']))  
      {  
            
      }  
      	else{
		   $name = $_POST['name'];
    	   $number   = $_POST['phone'];
    	   $email      = $_POST['email'];
		   $pass = $_POST['password'];
           $password = md5($pass);
		   $displayName    = $_POST['displayName'];
    	   
            // echo 'Part 1';
    	    $user_check_query = "SELECT * FROM users WHERE  email ='$email' ";

    	    $result = mysqli_query($conn, $user_check_query);
 			 $user = mysqli_fetch_array($result);
			    if ($user['email'] == $email) {
			    	$emailerr = "Email Already Exists";
                    // echo '<script>alert("Email Already Exists")</script>';
			      	array_push($errors, "Email");
			    }
                // echo 'Part 2';
            $user_check_query2 = "SELECT * FROM users WHERE  displayName ='$displayName' ";
                 $result2 = mysqli_query($conn, $user_check_query2);
 			 $user2 = mysqli_fetch_array($result2);
			    if ($user2['displayName'] == $displayName) {
			    	$dispNameErr = "Display Name Already Exists";
                    // echo '<script>alert("DisplayName Already Exists")</script>';
			      	array_push($errors, "DisplayName");
			    }
			    	   if (count($errors) == 0) {
			  

			  	$query = "INSERT INTO users (name, number, email, password, displayName ) VALUES('$name','$number', '$email', '$password','$displayName')";
			  mysqli_query($conn, $query);

			  $sql = "SELECT * FROM users WHERE  email ='$email'";
			   $run = mysqli_query($conn, $sql);
			  $rows = mysqli_num_rows($run);

    		    if( $rows > 0){
		
		 	while ($row = $run->fetch_assoc()) {
  			  $_SESSION['id'] =$row['id'];
              $_SESSION['displayName'] =$row['displayName'];

		header("location: index.php");
			  }
			}

			  }


			  }

			}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signUp.css">
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
        <div class="container">
            <h1 class="h-primary">CREATE YOUR ACCOUNT</h1>
            <form action=" " method="POST" class="myForm">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="displayName" id="displayName" placeholder="Enter Your Display Name"required>
                </div>
                <span style="word-wrap: normal; width: auto;background: red; padding: auto;margin-left:10px;"><?php echo $dispNameErr; ?></span>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
                </div>
                <span style="word-wrap: normal; width: auto;background: red; padding: auto;margin-left:10px;"><?php echo $emailerr; ?></span>
                <div class="form-group">
                    <input type="phone" name="phone" id="phone" maxlength="10" placeholder="Enter Your Mobile Number" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password1" placeholder="Enter Your Password" required>
                </div>
                <button type="submit" class="btn">Sign up</button>
            </form>

            <p>Already have an account?<a href="login.php">Login Here</a></p>
        </div>
    </div>
    <footer>
        <p text-footer>&copy; Copyright 2021 esports.com</p>
    </footer>
</body>

</html>