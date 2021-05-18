<?php
session_start();
require("connection.php");

if(isset($_SESSION['id']))
{
	$uid=  $_SESSION['id'];
    $displayName = $_SESSION['displayName'];
    $buttons = '<a style="color:white;font-size: 15pt;margin-top: 10px;">'.$displayName.'</a>';
    $logout = '<li><a href="logout.php">Log Out</a></li>';
    
    $query = "SELECT characterName, clanName, gameType, dateOfGame From events WHERE (userID='$uid')";
    $run = mysqli_query($conn, $query);
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
    <title>My Events</title>
    <link rel="stylesheet" href="myevent.css">
</head>
<body>
    <div class="main">
        <nav class="navbar h-nav-resp">
            <ul class="nav-list v-class-resp">
                <div class="logo"><a href="index.php"><img src="img/logo2.jpg" alt="logo"></a></div>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="myevent.php">My Events</a></li>
                 <?php 
                echo $logout;
                ?>
            </ul>   
             <div class="rightNav v-class-resp">
                <a><img src="img/user.svg" class="user" alt="user"></a>
                <?php 
                echo $buttons;
                ?>
            </div>
        </nav>
        
        <div class="container background">
            <h1>MY EVENTS</h1>
            <table class="styled-table">
                <tr class="tr">
                <th>Character Name</th>
                <th>Clan Name</th>
                <th>Date</th>
                <th>Game</th>
                </tr>
                       <?php
        while($row = mysqli_fetch_array($run)) {    
        ?>
        <tr>
            <td><?php echo $row['characterName']; ?></td>
            <td><?php echo $row['clanName']; ?></td>
            <td><?php echo $row['dateOfGame']; ?></td>
            <td><?php echo $row['gameType']; ?></td>
        </tr>
            <?php 
            }
            ?>
            </table>
        </div>
        <footer id="footer">
            <p text-footer>&copy; Copyright 2021 esports.com</p>
        </footer>
    </div>

</body>
</html>