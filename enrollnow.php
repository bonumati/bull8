<?php
session_start();
if(isset($_SESSION['id']))
{
	$uid=  $_SESSION['id'];
    $displayName = $_SESSION['displayName'];
    $buttons = '<a style="color:white;font-size: 15pt;margin-top: 20px;">'.$displayName.'</a>';
    $logout = '<li><a href="logout.php">Log Out</a></li>';
}
else
{
  header("location: login.php");
  $buttons='<a href="login.php"><button class="btn btn-big">Login</button></a>';
  $logout = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Now</title>
    <link rel="stylesheet" href="enrollnow.css">
</head>

<body>
    <div class="main">
        <nav class="navbar h-nav-resp">
            <ul class="nav-list v-class-resp">
                <div class="logo"><a href="index.php"><img src="img/logo2.jpg" alt="logo"></a></div>
                <li><a href="index.php">Home</a></li>
                <!-- <li><a href="aboutUs.php">About Us</a></li> -->
                <li><a href="myevent.php">My Events</a></li>
            </ul>
            <div class="rightNav v-class-resp">
                <a><img src="img/user.svg" class="user" alt="user"></a>
                <?php 
                echo $buttons;
                ?>
            </div>
        </nav>
        <form action="" method="POST" class="myForm">
        <div class="container">
            <h1 class="h-primary">ENROLL NOW</h1>
                <div class="form-group">
                    <input type="text" name="characterName" id="name" placeholder="Enter Your Character Name Of Game" required>
                </div>
                <div class="form-group">
                    <input type="type" name="clanName" id="email" placeholder="Enter Your Clan Name" required>
                </div>
                <div class="form-group select">
                    <label for="games">Choose a game:</label>
                    <select name="games" id="games" style="border-radius: 5px;  background: transparent;" required>
                        <option value="PUBG">PUBG</option>
                        <option value="COD">COD</option>
                        <option value="APEX LEGEND">APEX LEGEND</option>
                        <option value="DOTA2">DOTO2</option>
                    </select>
                </div>
                <div class="date">
                    <label for="date">Date :</label>
                    <input type="date" name="date" id="date" required>
                </div>
            
            <button type="submit" class="btn">Submit</button>
        </div>
        </form>
        <footer id="footer">
            <p text-footer>&copy; Copyright 2021 esports.com</p>
        </footer>
    </div>
</body>

</html>

<?php 
	require("connection.php");
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		   $userId = $uid;
    	   $characterName   = $_POST['characterName'];
		   $clanName   = $_POST['clanName'];
		   $gameType   = $_POST['games'];
		   $dateOfGame    = $_POST['date'];
		   
		   $query = "INSERT INTO events (userId, characterName, clanName, gameType, dateOfGame) VALUES('$userId','$characterName', '$clanName', '$gameType','$dateOfGame')";
			$run = mysqli_query($conn, $query);
			if ($run == TRUE) {
				?>
				<script>   
				  alert("You have Successfully Participated");
				  window.open('myevent.php','_self');
				</script>
				<?php  
			  }else{
				 ?>
				<script>   
				  alert("Failed To Enroll In Event");
				</script>
				<?php  
			  }
	}
?>