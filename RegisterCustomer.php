<?php
require "connect2.php";
$name = isset($_POST['name'])? $_POST['name']: "";
$matric = isset($_POST['matric'])? $_POST['matric']: "";
$address = isset($_POST['address'])? $_POST['address']: "";
$phone = isset($_POST['phone'])? $_POST['phone']: "";
$email = isset($_POST['email'])? $_POST['email']: "";

$response = new stdClass();
$response->status = false;
$response->msg = "";


$sql="Insert into customer(name, matric, address, phone, email) ".
	"values('$name', '$matric', '$address', '$phone', '$email')";
$result = mysqli_query($con, $sql);

if($result){
	$response->status=true;
	$response->msg="Customer is registered.";
	
}
else{
	$response->status=false;
	$response->msg="Error running query: ".mysqli_error($con);
}

mysqli_close($con);

echo json_encode($response);
?>