<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['id']) );

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
   $id = $_POST['id'];
    
    $query = "Delete from package where pack_cd='$id' ;";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Package information is deleted.";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>

