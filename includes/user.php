<?php 

include("database.php");

// Our database object
$db = new DB;    
$db->connect();
$con = $db->connection;
// mysqli_query($db->connection,"INSERT INTO admin (username, password) VALUES ('Glenn', '112')");
$SQLquery = "SELECT * FROM admin where userID = 1 "; 
$result = $db->query($SQLquery);
print_r($result);
?>