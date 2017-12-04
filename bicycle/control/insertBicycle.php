<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['bicycleID']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['status']));

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invalid input";

if($isComplete){
    
    $bicycleID = mysqli_real_escape_string($con,$_POST['bicycleID'] );
    $type = mysqli_real_escape_string($con,$_POST['type'] );
    $model = mysqli_real_escape_string($con,$_POST['model'] );
    $stat = $_POST['status'];
           
    $query = "Insert into bicycle(bicycleID, type, model, status) "
            . "Values('$bicycleID', '$type', '$model', '$stat');";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Success adding new bicycle";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>

