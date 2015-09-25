<?php 

include("../includes/class_database.php"); 
$db = new DB();

/**
 * SELECT statement based on the Haversine formula.
 * The Haversine formula is used generally for computing great-circle 
 * distances between two pairs of coordinates on a sphere.
 * radius of earth is 6371 km
 * set example of current latitude and longitude: lat=60.18634081, lng=24.926130192
 */

// Get parameters from user location (device)
$user_lat = $_GET["lat"];
$user_lng = $_GET["lng"];
$range = $_GET["range"]; // 

$sql = "SELECT id, name, lat, lng, 6371 * DEGREES(ACOS(COS(RADIANS(60.18634081))
 										* COS(RADIANS(lat))
 										* COS(RADIANS(lng) - RADIANS(24.926130192))
 										+ SIN(RADIANS(60.18634081))
 										* SIN(RADIANS(lat))))
 		AS distance_in_km FROM ark_table1en HAVING distance_in_km < 75 ORDER BY distance_in_km ASC LIMIT 0,5";
$result = $db->query($sql);
$row = $db->fetch_array($result);
// var_dump($result);
// var_dump($row);

// Start XML file, create parent node
// $dom = new DOMDocument("1.0");
// $node = $dom->createElement("poi");
// $parnode = $dom->appendChild($node);

// header("Content-type: text/xml");

// // Iterate through the rows, adding XML nodes for each
// while ($row){
//   $node = $dom->createElement("marker");
//   $newnode = $parnode->appendChild($node);
//   $newnode->setAttribute("name", $row[0]['name']);
//   $newnode->setAttribute("lat", $row['lat']);
//   $newnode->setAttribute("lng", $row['lng']);
//   $newnode->setAttribute("distance_in_km", $row['distance_in_km']);
// }

// echo $dom->saveXML();
?>