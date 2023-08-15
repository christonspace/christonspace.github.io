<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = mysqli_connect("localhost", "christon", "Jakari374", "christonspace");
?>

<style>
.top {
    color: white;
    background-color: #BC3641;
}
.top a {
    color: white; 
}
.lowertop a{
    color: white;
}
.lowertop {
    color: white;
    background-color: #B7636A;
}
.topLeft {
    float: left;
    width: calc( 40% - 20px );
    padding: 10px;
}
.topRight {
    float: right;
    width: calc( 60% - 20px );
    padding: 10px;
}
.extended {
    border: 1px solid #000;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 15px;
}
.url {
    border: solid 2px #69c;
    padding: 2px;
}
body {
	width: 800px;
	margin-left: auto;
	margin-right: auto;
    font-family: Tahoma, Verdana, Arial, sans-serif;
}
img {
    max-width: 240px;
}
.userinfo {
    border: 1px solid black;
    background-color: lightgray;
}
.music {
    border: 1px solid black;
    background-color: lightgray;
    width: 100%;
    text-align: center;
    padding: 10px 0px 0px 5px;
}
.userbanner {
    background-color: #fc9;
    color: #cc6633;
}
</style>
<div class="header">
    <div class="top" style=""><big><b>christonspace.xyz</b></big> <span style="float:right;margin-right: 5px;margin-top: 3px;font-size: small;"><a href="register.php">Sign Up</a> &bull; <a href="login.php">Login</a> &bull; <a href='https://discord.gg/FVudT5ut23'>Discord</a></span></div>
    <div class="lowertop" style=""><small><a href="index.php">Your Profile</a> &bull; <a href="viewgroups.php">Groups</a> &bull; <a href="friends.php">Manage Friends</a> &bull;  <a href="publicmessageboard.php">Public Message Board</a> &bull; <a href="blog.php">Blogs</a> <?php if(isset($_SESSION['myspace'])){ echo " &bull; <a href='settings.php'>Settings</a>"; }?></small>
</div>
<br>