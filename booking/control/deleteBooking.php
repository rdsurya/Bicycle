<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['id']) );

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
   $id = $_POST['id'];
    
    $query = "Delete from booking where booking_no='$id' ;";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Booking information is deleted.";
        
        $status = $_POST['status'];
        
        if(strcasecmp($status, "Taken")==0 ){
            $bikeStat =  "Available";
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

