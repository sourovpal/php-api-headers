<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$limit = isset($_GET['show'])?$_GET['show']:0;

$con = mysqli_connect('localhost', 'root', '', 'api');

$stmt = mysqli_query($con, "SELECT * FROM tbl_users LIMIT $limit");


$data = [];
$last_id = 0;

while ($row = mysqli_fetch_assoc($stmt))
{
	$data[] = $row;
	$last_id = $row['id'];
}

echo json_encode([
	'output' => $data,
	'limit' => $limit,
	'last_id' => $last_id,
]);