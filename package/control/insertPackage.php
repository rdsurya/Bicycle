<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['pack_cd']) && isset($_POST['pack_name']) && isset($_POST['pack_price']) && isset($_POST['status']) );

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invalid input";

if($isComplete){
    
    $name = mysqli_real_escape_string($con,$_POST['pack_name'] );
    $code = mysqli_real_escape_string($con,$_POST['pack_cd'] );
    $price = $_POST['pack_price'];
    $status = $_POST['status'];
    $days = $_POST['days'];
       
    $query = "Insert into package(pack_cd, name, price, status, days) "
            . "Values('$code', '$name', '$price', '$status', '$days');";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Success adding new package";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>

