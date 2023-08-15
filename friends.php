<style type="text/css">
body {
    background-color: #E0E0E0;
}
</style>
<?php
include("header.php");

echo "<h2>Pending Friend Requests (dont deny, theres gonna be a error, its nice to have friends.)</h2>";

//get pending friend requests
$stmt = $conn->prepare("SELECT * FROM friends WHERE reciever = ? AND status = ?");
$stmt->bind_param("ss", $_SESSION['myspace'], $pending);
$pending = "pending";
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) echo('No incoming friend requests.');
while($row = $result->fetch_assoc()) {
    echo "Friend request from <b>" . $row['sender'] . "</b> | <a href='accept.php?id=" . $row['id'] . "'>Accept</a> or <a href='deny.php?id=" . $row['id'] . "'>Deny</a><br>";
}
$stmt->close();

echo "<h2>Friends</h2>";

//friends
$stmt = $conn->prepare("SELECT * FROM friends WHERE reciever = ? AND status = ?");
$stmt->bind_param("ss", $_SESSION['myspace'], $accepted);
$accepted = "accepted";
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) echo('No friends.');
while($row = $result->fetch_assoc()) {
    echo "" . $row['sender'] . "<br>";
}
$stmt->close();
?>