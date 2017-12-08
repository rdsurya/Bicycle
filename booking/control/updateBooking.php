<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['id']) && isset($_POST['fine']) && isset($_POST['fine_reason']) && isset($_POST['status']));

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
    $reason = mysqli_real_escape_string($con,$_POST['fine_reason'] );
    $fine = $_POST['fine'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    
    $query = "Update booking set fine='$fine', fine_reason='$reason', status='$status' where booking_no='$id' ;";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Booking information is updated.";
        
        if(strcasecmp($status, "Taken")==0 || strcasecmp($status, "Completed")==0 || strcasecmp($status, "Canceled")==0){
            $bikeStat = (strcasecmp($status, "Completed")==0 || strcasecmp($status, "Canceled")==0)? "Available": "Occupied";
            $bikeNo = $_POST['bike'];
            $query = "Update bicycle set status='$bikeStat' where bicycleID='$bikeNo'";
            mysqli_query($con, $query);
        }
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>

