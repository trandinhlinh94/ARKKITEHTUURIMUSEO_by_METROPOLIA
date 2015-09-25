<?php 

$fileName = 'poi.json';
$data = file_get_contents($fileName);
$poi_data = json_decode($data, true);
// var_dump($poi_data);
// var_dump ($poi_data[0]);
$data = "";
for ( $i=0; $i < count($poi_data); $i++ ) {
	$data = "{<br />";
	$data .= '"name" => "' .$poi_data[$i]["name"] . '" <br /> ';
	$data .= '"lat" => "' .$poi_data[$i]["lat"] . '" <br /> ';
	$data .= '"lng" => "' .$poi_data[$i]["lng"] . '" <br /> ';
	$data .= "}, <br />";
	// echo $data;
	echo json_encode($data, JSON_UNESCAPED_SLASHES);
}
?>