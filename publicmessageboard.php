<?php
include("header.php");
?>
<style type="text/css">
body {
    background-color: #E0E0E0;
}
</style>


<h2>Public Message Forum</h2>
<a href="newmessage.php">Post a message</a>
<hr>

<?Php
$stmt = $conn->prepare("SELECT * FROM publicmessages ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) echo('There are no public messages!');
while($row = $result->fetch_assoc()) {
    echo "<b>" . $row['author'] . "</b>'s message <small>(" . $row['date'] . ")</small><br>";
    echo "" . $row['text'] . "<hr>";
}
$stmt->close();
?>