<?php
session_start();
if(isset($_SESSION['id']))
{
	$uid=  $_SESSION['id'];
    $displayName = $_SESSION['displayName'];
    $buttons = '<a style="color:white;font-size: 15pt;margin-top: 10px;">'.$displayName.'</a>';
    $logout = '<li><a href="logout.php">Log Out</a></li>';
}
else
{
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
    <title>Esports tournament</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
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
    </header>
    <main>
        <section class="background firstSection">
            <div class="box-main box-main2">
                <div class="firstHalf">
                    <p class="text-small font">Battlegrounds is a player versus player shooter game in which up to one
                        hundred players fight in a battle royale, a type of large-scale last man standing deathmatch
                        where
                        players fight to remain the last alive. Players can choose to enter the match solo, duo, or with
                        a
                        small team of up to four people. The last person or team alive wins the match</p>
                    <a href="enrollnow.php">
                        <button class="btnEve"> ENROLL NOW</button></a>
                </div>

            </div>
        </section>

        <section class="section">
            <div class="paras">
                <p class="sectionTag text-big">CALL OF DUTY</p>
                <p class="sectionSubTag text-small font">Call of Duty is a first-person shooter video game franchise published by Activision. Starting out in 2003, it first focused on games set in World War II. Over time, the series has seen games set in the midst of the Cold War, futuristic worlds, and outer space </p>
                <a href='enrollnow.php'>
                    <button class="btnEve">ENROLL NOW</button>
                </a>

            </div>
            <div class="thumbnail">
                <img src="img/cod.jpg" alt="laptop image" class="imgFluid">
            </div>
        </section>


        <section class="section section-left" id="about">
            <div class="paras">
                <p class="sectionTag text-big font">APEX LEGENDS</p>
                <p class="sectionSubTag text-small">Apex Legends is a free-to-play hero battle royale game developed by Respawn Entertainment and published by Electronic Arts. It was released for Microsoft Windows, PlayStation 4, and Xbox One in February 2019, and for Nintendo Switch in March 2021. 
                </p>
                <a href='enrollnow.php'>
                    <button class="btnEve">ENROLL NOW</button>
                </a>
            </div>
            <div class="thumbnail">
                <img src="img/apex.jpg" alt="laptop image" class="imgFluid">
            </div>
        </section>
        <section class="section" id="services">
            <div class="paras">
                <p class="sectionTag text-big font">DOTA 2</p>
                <p class="sectionSubTag text-small">Dota 2 is a multiplayer online battle arena video game developed and published by Valve. The game is a sequel to Defense of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III: Reign of Chaos!!
                </p>
                <a href='enrollnow.php'>
                    <button class="btnEve">ENROLL NOW</button>
                </a>
            </div>
            <div class="thumbnail">
                <img src="img/dota.jpg" alt="laptop image" class="imgFluid">
            </div>
        </section>
    </main>
    <footer>
        <p text-footer>&copy; Copyright 2021 esports.com</p>
    </footer>
</body>

</html>