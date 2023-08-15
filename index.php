<style type="text/css">
body {
    background-color: #E0E0E0;
}
</style>
<?php
include("header.php");
?>
<?php
if(!isset($_SESSION['myspace'])) {
    echo "<h2>Welcome to Christonspace V2, Visitor!, move slow and see things. Updates, you can customize your profile all you want!</h2>";
    echo "You can meet some pretty cool people here, like ";
    $stmt = $conn->prepare("SELECT * FROM users ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('user dosent exist');
    while($row = $result->fetch_assoc()) {
        echo $row['username'] . "<br>";
    }

    echo "<br>Members Already On Christonspace!";
} else if(isset($_SESSION['myspace'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['myspace']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('user dosent exist');
    while($row = $result->fetch_assoc()) {
        echo "<style>" . $row['css'] . "</style>";
        echo "<div class='extended'><h3><span class=''>" . $row['username'] . "</span> is on christonspace!</h3></div>";
        echo "<div class='topLeft'><h1>" . $row['username'] . "</h1>";
        echo "<img src='profilepictures/" . $row['profilepic'] . "'><br><br>";
        echo "<div class='userinfo'><b>Gender: </b>" . $row['gender'] . "<br>";
        echo "<b>Age: </b>" . $row['age'] . "<br>";
        echo "<b>Location: </b>" . $row['location'] . "</div><br>";
        echo "<div class='url'><div><b>Christonspace URL:</b></div><div><a style=':#000;text-decoration:none;' href='profile.php?id=" . $row['id'] .  "'>christonspace.xyz/profile=" . $row['id'] .  "</a></div></div></div>";
        echo "<div class='topRight'>
        <fieldset>
            <legend>Manage</legend>
            <a href='settings.php'>Settings</a>
        </fieldset>
        <div class='userbanner'><h3><b>About Me: </b></h3></div>" . $row['description'] . "<br><br><b>Date Joined:</b> " . $row['date'] . "<br>"; 
        echo "<div class='userbanner'><h3><b>Friends: </b></h3></div>";
        $stmt = $conn->prepare("SELECT * FROM friends WHERE reciever = ? AND status = ?");
        $stmt->bind_param("ss", $row['username'], $status);
        $status = "accepted";
        $stmt->execute();
        $result = $stmt->get_result();
        while($friendsrow = $result->fetch_assoc()) {
            echo "" . $friendsrow['sender'] . "<br>";
        }   

        $stmt = $conn->prepare("SELECT * FROM friends WHERE sender = ? AND status = ?");
        $stmt->bind_param("ss", $row['username'], $status);
        $status = "accepted";
        $stmt->execute();
        $result = $stmt->get_result();
        while($friendsrow = $result->fetch_assoc()) {
            echo "" . $friendsrow['reciever'] . "<br>";
        }   
        echo "<br><br>";
        echo "<b><div class='music'>" . $row['username'] . "'s Favorite Music:</b><br><br><audio controls='' autoplay='' src='music/" . $row['musicurl'] . "'></audio><br><br></div><hr>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

echo "<div class='users'>";

while($row = $result->fetch_assoc()) {
    echo "<li><a href='profile.php?id=" . $row['id'] . "'>" . $row['username'] . "</a><br></li>";
}

echo "</div>";
?>
